<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create</title>
    <script src="https://kit.fontawesome.com/f2c39f8cba.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        .text{
            background: rgba(0,0,0,0.5); 
            color:beige;
            margin-left: 300px;
            margin-right: 300px;
            text-align: center;
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
            <div class="text">
  <div class="container">
   <form action="/uploadAvatar" enctype="multipart/form-data" method="post">
        <input type="file" name="userfile">
        <input type="submit">
    </form>
    <p>Имя: <span id="name"></span></p>
    <p>Email: <span id="email"></span></p>
    <p>ID: <span id="id"></span></p>
</div>
            </div>

<script>
    let name = document.getElementById('name');
    let email = document.getElementById('email');
    let id = document.getElementById('id');
    fetch('/getUserData')
        .then(function (response){return response.json()})
        .then(function (result){
            console.log(result);
            name.innerText = result.name;
            email.innerText = result.email;
            id.innerText = result.id;
        });
</script>
</body>
</html>