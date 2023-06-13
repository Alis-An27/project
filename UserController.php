<?php
class UserController{
    public static function login($email, $pass){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM `users` WHERE email = '$email'");
        if($result->num_rows){
            $row = $result->fetch_assoc();
            if(password_verify($pass, $row['pass'])){
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                header("Location: /profile.php");
            }else{
                header("Location: /login.php?m=error");
            }
        }else{
            header("Location: /login.php?m=error");
        }
    }

    public static function reg($name, $email, $pass){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM `users` WHERE email = '$email'");
        if($result->num_rows){
            exit("Такой пользователь уже существует");
        }else{
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $mysqli->query("INSERT INTO `users`(`name`, `email`, `pass`) VALUES ('$name','$email','$pass')");
            header("Location: /login");
        }
    }

    public static function getUserData(){
        $userData = [
            'id'=>$_SESSION['id'],
            'name'=>$_SESSION['name'],
            'email'=>$_SESSION['email']
        ];
        $jsonUserData = json_encode($userData);
        exit($jsonUserData);
    }
    public static function getUsers(){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM users");
        $users = [];
        while (($row = $result->fetch_assoc())!=null){
            $users[] = $row; 
        }
        return json_encode($users); 
    }

    public static function logout(){
        session_destroy();
        header("Location: /");
    }
    public static function uploadAvatar(){
        $uploaddir = '/img/'; 
        $uploadfile = $uploaddir.$_FILES['userfile']['name'];
        move_uploaded_file($_FILES['userfile']["tmp_name"], $uploadfile);
        global $mysqli;
        $userId = $_SESSION['id'];
        $mysqli->query("UPDATE `users` SET `img`='$uploadfile' WHERE id='$userId'");
        header('Location: /profile');
    }
}