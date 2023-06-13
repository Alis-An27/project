<?php
    session_start();
    $userData = [
        'id'=>$_SESSION['id'],
        'name'=>$_SESSION['name'],
        'email'=>$_SESSION['email']
    ];
    $jsonUserData = json_encode($userData);
    exit($jsonUserData);