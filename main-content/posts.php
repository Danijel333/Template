<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>

<body>

<?php

include ('./template/header.php');

include ('./db.php');
// pripremamo upit
$sql = "SELECT * FROM posts ORDER BY posts.created_at DESC ";
$allPosts = GetAllPostsFromDB($sql, $connection);
?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
            <?php
            foreach ($allPosts as $post) {
            ?>

            <div class="blog-post">

                <h2 class="blog-post-title"><a href="main-content/single-post.php?post_id=<?php echo($post['id']) ?>"><?php echo($post['title']) ?></a></h2>
                
                <p class="blog-post-meta"><?php echo($post['created_at']) ?> by <?php echo $post['author'] ?></p>
                
                <p><?php echo($post['body']) ?></p>
                
            </div><!-- /.blog-post -->

        <?php
                }
        ?>

            <nav class="blog-pagination">
                <a class="btn btn-outline-primary" href="#">Older</a>
                <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
            </nav>

        </div><!-- /.blog-main -->
        
    </div><!-- /.row -->
    <?php include ('./template/sidebar.php');?>
</main><!-- /.container -->
<?php include ('./template/footer.php'); ?>
</body>
</html>
