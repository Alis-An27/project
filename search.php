<div class="container">
    <p>Заголовок: <span id="title"></span></p>
    <p>Контент: <span id="сontent"></span></p>
    <p>Автор: <span id="author"></span></p>
    <p>ID: <span id="id"></span></p>
</div>
<script>
    let title = document.getElementById('title');
    let content = document.getElementById('content');
    let author = document.getElementById('author');
    let id = document.getElementById('id');
    fetch('/getArticleData')
        .then(function (response){return response.json()})
        .then(function (result){
            console.log(result);
            title.innerText = result.title;
            content.innerText = result.content;
            author.innerText = result.author;
            id.innerText = result.id;
        });
</script>