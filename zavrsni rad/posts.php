<link href="styles/blog.css" rel="stylesheet">

<?php

include('db.php');
$sql = "select * from posts order by created_at asc";
$statement = $connection->prepare($sql);
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <img src="kkcz.jpg" width="500" height="300">
    <main role="main" class="container">
        <?php foreach ($posts as $post) { ?>
            <h2 class="blog-post-title"><a href="single-post.php?id=<?php echo $post['id'] ?>"><?php echo $post['title']; ?></a></h2>
            <p class="blog-post-meta"><?php echo $post['created_at']; ?> by <?php echo $post['author']; ?></a></p>

            <p><?php echo $post['body']; ?></p>
        <?php } ?>

        </div>
</body>