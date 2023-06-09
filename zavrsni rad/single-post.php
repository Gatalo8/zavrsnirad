<link href="styles/blog.css" rel="stylesheet">

<?php
include('db.php');
include('header.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from posts where id = '{$id}'";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $post = $statement->fetch(PDO::FETCH_ASSOC);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $author = $_POST['author'];
    $text = $_POST['text'];
    $sql = "insert into comments (author, text, post_id) values ('{$author}', '{$text}', '{$id}')";
    $statement = $connection->prepare($sql);
    $statement->execute();
}


?><h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
<p class="blog-post-meta"><?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></a></p>

<p><?php echo $post['body']; ?></p>


<div class="create-comment">
    <h2>Dodaj komentar</h2>

    <form action="single-post.php?id=<?php echo $id ?>" method="POST">


        <label for="author">Vaše ime:</label>
        <input type="text" id="author" name="author" required>

        <label for="text">Vaš komentar:</label>
        <input id="text" name="text" required>




        <input type="submit" value="Dodaj komentar">

    </form>
</div>


<?php include('comments.php'); ?>