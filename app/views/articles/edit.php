<?php require("app/views/partials/head.php"); ?>
<h1> edit article</h1>

<form method="post" action= "/article/update">
    <input type="hidden" name="id" value="<?= $article->id ?>">
    <div>
        <input type="text" name="name" placeholder="name" value="<?= $article->name?>">
    </div>
    <div>
        <input type="text" name="body" placeholder="body" value="<?= $article->body?>">
    </div>
    <button type="submit">Edit</button>
</form>