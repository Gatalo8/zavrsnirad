<link href="styles/blog.css" rel="stylesheet">
<?php include('header.php');
include('db.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $body = $_POST['body'];
    $author = $_POST['author'];
    $sql = "insert into posts ( title, body,author,created_at) values ( '{$title}', '{$body}', '{$author}', curdate())";
    $statement = $connection->prepare($sql);
    $statement->execute();
    header("Location: index.php");
}

?>
<div class="create-post">
    <h2>Napiši objavu</h2>

    <form action="create-post.php" method="POST">

        <label for="title">Naslov:</label>
        <input type="text" id="title" name="title" required>

        <label for="body">Vaša objava:</label>
        <input id="body" name="body" required>

        <label for="author">Vaše ime:</label>
        <input id="author" name="author" required>

        <input type="submit" value="Postavi objavu">

    </form>
</div>

<?php include('footer.php');
