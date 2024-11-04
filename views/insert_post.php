<form action="?c=Post&m=create_process" method="post">
    <input type="hidden" name="id">
    <label>
        Title:
        <input type="text" name="title" placeholder="Title" required autofocus>
    </label>
    <br>
    <label>
        Content:
        <textarea name="content" cols="30" rows="10" placeholder="Content" required></textarea>
    </label>
    <br>
    <input type="submit" value="Post">
</form>