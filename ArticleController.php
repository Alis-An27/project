<?php
class ArticleController{
    public static function getArticles(){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM articles");
        $articles = "";
        while (($row = $result->fetch_assoc()) != null){
            $content = $row['content'];
            $html = str_get_html($content);
            //$content = $html->plaintext;
            $content = substr($content, 0, 90)."...";
            $articles .= '
                <div class="post-preview">
                        <a href="/article/'.$row['id'].'">
                            <h2 class="post-title">'.$row['title'].'</h2>
                            <h3 class="post-subtitle">'.$content.'</h3>
                        </a>
                        <p class="post-meta">
                            Автор: '.$row['author'].'
                        </p>
                </div>
            ';
        }
        return $articles;
    }

    public static function addArticle($title, $content, $author){
        global $mysqli;
        $html = str_get_html($content);
        $img = $html->find("img", 0);
        $data = explode(",", $img->src);
        $extension =  explode("/", explode(";",$data[0])[0])[1];
        $fileName = "img/".microtime().".".$extension;
        $ifp = fopen($fileName, 'wb');
        fwrite( $ifp, base64_decode( $data[1] ) );
        fclose( $ifp );
        $img->src = "/".$fileName;
        $mysqli->query("INSERT INTO articles (title, content, author) VALUES ('$title', '$html', '$author')");
        $response = json_encode(["result"=>"success"]);
        exit($response);
    }
    public static function getArticle($articleId){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM articles WHERE id = $articleId");
        $row = $result->fetch_assoc();
        return json_encode($row);
    }

    public static function deleteArticle($articleId){
        global $mysqli; 
        $mysqli->query("DELETE FROM articles WHERE id=$articleId"); 
        header('Location: /'); 
    }
    public static function updateArticle($articleId, $title, $content, $author){
        global $mysqli;
        $mysqli->query("UPDATE articles SET title='$title',content='$content',author='$author' WHERE id=$articleId");
        header("Location: /article/$articleId");
    }
    public static function saveComment(){
        global $mysqli;
        $userId = $_POST['userId'];
        $articleId = $_POST['articleId'];
        $comment = $_POST['comment'];
        $mysqli->query("INSERT INTO `comments`(`user_id`, `article_id`, `comment`) VALUES ('$userId', '$articleId', '$comment')");
        return json_encode(["result"=>"success"]);
    }
    public static function getCommentsByArticleId($articleId){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM comments, users WHERE article_id = '$articleId' AND comments.user_id = users.id");
        $comments = [];
        while (($row = $result->fetch_assoc()) != null){
            $comments[] = $row;
        }
        exit(json_encode($comments));
    }
    public static function search($title){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM `articles` WHERE title = '$title'");
        if($result->num_rows){
            $row = $result->fetch_assoc();
                $_SESSION['id'] = $row['id'];
                $_SESSION['title'] = $row['title'];
                $_SESSION['content'] = $row['content'];
                $_SESSION['author'] = $row['author'];
                header("Location: /search.php");
    }
}
     public static function saveArticles(){
        global $mysqli;
        $result = $mysqli->query("SELECT * FROM articles");
        $articles = "";
        while (($row = $result->fetch_assoc()) != null){
            $content = $row['content'];
            $html = str_get_html($content);
            $content = substr($content, 0, 90)."...";
            $articles .= '
                <div class="post-preview">
                        <a href="/profile'.$row['id'].'">
                            <h2 class="post-title">'.$row['title'].'</h2>
                            <h3 class="post-subtitle">'.$content.'</h3>
                        </a>
                        <p class="post-meta">
                            Автор: '.$row['author'].'
                        </p>
                </div>
            ';
        }
        return $articles;
    }
     public static function getArticleData(){
        $userData = [
            'title'=>$_SESSION['Title'],
            'content'=>$_SESSION['content'],
            'author'=>$_SESSION['author'],
            'id'=>$_SESSION['id']
        ];
        $jsonUserData = json_encode($userData);
        exit($jsonUserData);
    }
}