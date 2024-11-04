<?php require("app/views/partials/head.php"); ?>
<h1> create article</h1>

<form method="post" action= "/articles/store">
    <div>
        <input type="text" name="name" placeholder="name">
    </div>
    <div>
        <input type="text" name="body" placeholder="body">
    </div>
    <button type="submit">Create</button>
</form>