<?php
session_start();
?>
<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create</title>
    <script src="https://kit.fontawesome.com/f2c39f8cba.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
          .style{
              margin:auto;
              margin-left: 300px;
              margin-right: 300px;
              background: rgba(0,0,0,0.5); 
          }
        .main{
            margin:auto;
            text-align: center;
        }
        .create{
            color:beige;
            background: rgba(0,0,0,0.5);
            text-align: center;
        }
        .wall{
            background-image: url(https://wallpapers.com/images/hd/chainsaw-man-fiend-power-oii2uyxko0989cx4.jpg);
            
        }
        .text{
            background: rgba(0,0,0,0.5); 
            color:beige;
            margin-left: 300px;
            margin-right: 300px;
        }
      </style>
    </head>
    <body>
       <div class="main">
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Меню
                    <i class="fas fa-bars"></i>
                </button>
                <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="btn btn-success me-3" aria-current="page" href="/">Главная</a>
                    </li>
                </ul>
                <a href="/reg" class="btn btn-success me-3">Регистрация</a>
                <a href="/login" class="btn btn-success me-3">Войти</a>
                <a href="/addArticle" class="btn btn-success me-3">Контент</a>
                <a href="/saved" class="btn btn-success me-3">Поиск</a>
            </div>
        </div>
            </div>
        </nav>
        </div>
        <!-- Page Header-->
        <div class="wall">
        <div class="create">
        <header class="masthead" style="background-image: url('https://cdn.bhdw.net/im/chainsaw-man-denji-pochita-wallpaper-79259_w635.webp')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                           <div class="create">
                            <h1>{Create}<br>
                            Выкладывай<br>
                            Сохраняй<br>
                            Комментируй<br>
                            Создавай<br>
                            </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        </div>
        <!-- Footer-->
        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                <a href="#!">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa-regular fa-image fa-2xl"></i>
                                            </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa-regular fa-heart fa-2xl"></i>
                                            </span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#!">
                                            <span class="fa-stack fa-lg">
                                                <i class="fa-regular fa-user fa-2xl"></i>
                                            </span>
                                </a>
                            </li>
                        </ul> 
                    </div>
                </div>
            </div>
            <div class="text">
            <?= $content ?>
            </div>
        </footer>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="/js/scripts.js"></script>
    </body>
</html>