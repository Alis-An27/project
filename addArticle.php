<div class="container my-3">
    <div class="col-sm-9 mx-auto">
        <form onsubmit="sendForm(this); return false;" action="/addArticle" method="post">
            <div class="mb-3">
                <input type="text" class="form-control" name="title" placeholder="Заголовок">
            </div>
            <div class="mb-3">
                <textarea name="content" id="sample">Hi</textarea>
            </div>
            <div class="mb-3">
                <input name="author" type="text" class="form-control" placeholder="Автор">
            </div>
            <div class="mb-3">
                <input type="submit" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
<link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/suneditor@latest/src/lang/ru.js"></script>
<script>
    const editor = SUNEDITOR.create((document.getElementById('sample') || 'sample'),{
        lang: SUNEDITOR_LANG['ru'],
        width: '100%',
        height: '400px',
        buttonList: [
            ['undo', 'redo'],
            ['font', 'fontSize', 'formatBlock'],
            ['paragraphStyle', 'blockquote'],
            ['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
            ['fontColor', 'hiliteColor', 'textStyle'],
            ['removeFormat'],
            '/', 
            ['outdent', 'indent'],
            ['align', 'horizontalRule', 'list', 'lineHeight'],
            ['table', 'link', 'image', 'video', 'audio'], 
            ['fullScreen', 'showBlocks', 'codeView'],
            ['preview', 'print'],
            ['save', 'template'],
            
        ]
    });
    function sendForm(form){
        const formData = new FormData(form);
        formData.append("content", editor.getContents());
        fetch("/addArticle", {
            method: "POST",
            body: formData
        }).then(response=>response.json())
            .then(result=>{
                if(result.result === "success"){
                    location.href = "/";
                }
            })
    }
</script>