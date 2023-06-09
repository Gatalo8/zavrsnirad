<link href="styles/blog.css" rel="stylesheet">
<?php
include('db.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "select * from comments where post_id = '{$id}' ";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
}
?>

<body>
    <h1>Komentari</h1>
    <?php foreach ($comments as $comment) { ?>
        <div>
            <ul>
                <li>
                    <h3><?php echo $comment['author']; ?></h3>


                    <p><?php echo $comment['text']; ?></p>
                </li>
                <hr>
            </ul>
        </div>
    <?php }; ?>
</body>
<?php include('footer.php');
