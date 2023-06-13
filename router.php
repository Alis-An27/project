<?php
    session_start();
    $requestURI = $_SERVER['REQUEST_URI']; 
    $method = $_SERVER['REQUEST_METHOD'];
    $path = explode('/', $requestURI);
    require_once('db.php');
    require_once('UserController.php');
    require_once('ArticleController.php');
    require_once('Route.php');
    require_once('simple_html_dom.php');

    Route::get('/', function (){return ArticleController::getArticles();}, "Добро пожаловать");
    Route::get('/saved', function (){return file_get_contents("saved.php");}, "Поиск");
    Route::get('/reg', function (){return file_get_contents("reg.php");}, "Регистрация");
    Route::get('/login', function (){return file_get_contents('login.php');}, "Авторизация");
    Route::get('/article/{id}', function (){return file_get_contents('article.html');});
    Route::get("/getUsers", function (){UserController::getUsers();});
    Route::get('/users', function (){return file_get_contents('users.html');});
    Route::post('/reg', function (){UserController::reg($_POST['name'], $_POST['email'], $_POST['pass']);});
    Route::post('/login', function (){UserController::login($_POST['email'], $_POST['pass']);});
    Route::post('/article/{id}', function ($id){return ArticleController::getArticle($id);});
    Route::post('/search', function (){ArticleController::search($_POST['title']);});
    Route::post('/save', function (){return ArticleController::saveArticles();});
    

    if($_SESSION['id']){
        Route::get('/search.php', function (){return file_get_contents('search.php');});
        Route::get('/profile', function (){return file_get_contents('profile.php');});
        Route::get('/addArticle', function (){return file_get_contents('addArticle.php');});
        Route::get('/deleteArticle', function (){ArticleController::deleteArticle(null);});
        Route::get('/getUserData', function (){UserController::getUserData();});
        Route::get('/getArticleData', function (){ArticleController::getArticleData();});
        Route::get('/updateArticle', function (){return file_get_contents('updateArticle.html');});
        Route::get('/exit', function (){UserController::logout();});
        Route::post('/addArticle', function (){ArticleController::addArticle($_POST['title'], $_POST['content'], $_POST['author']);});
        Route::post('/updateArticle', function (){ArticleController::updateArticle($_POST['id'], $_POST['title'], $_POST['content'], $_POST['author']);});
        Route::post('/uploadAvatar', function (){UserController::uploadAvatar();});
        Route::post('/addComment', function (){echo ArticleController::saveComment();});
    }else{
        header('Location: /login');
    }