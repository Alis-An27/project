<div class="container" id="userList">

</div>
<script>
    let userList = document.getElementById('userList');
    fetch('/getUsers')
        .then(function (response){return response.json()})
        .then(function (result){
            console.log(result);
            for (let i = 0; i < result.length; i++) {
                userList.innerHTML = userList.innerHTML +"<p>"+result[i].name+" "+result[i].lastname+"</p>";
            }
        })
</script>