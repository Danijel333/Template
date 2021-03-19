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

    <title>Vivify Blogg</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../styles/blog.css" rel="stylesheet">
    <link href="../styles/styles.css" rel="stylesheet">
</head>

<body>

<?php

include ('../template/header.php');

include ('../db.php');
// upit za single post
if (isset($_GET['post_id'])) {
    $sql = "SELECT posts.id, posts.title, posts.body, posts.created_at, posts.author FROM posts WHERE posts.id = {$_GET['post_id']}";
    $singlePost = GetSinglePostFromDB($sql,$connection);
}

?>

<main role="main" class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">
            <div class="blog-post">

            <h2 class="blog-post-title"><?php echo ($singlePost[0]['title']) ?></h2>
                
            <p class="blog-post-meta"><?php echo ($singlePost[0]['created_at']) ?> by <?php echo ($singlePost[0]['author']) ?></p>
                
            <p><?php echo($singlePost[0]['body']) ?></p>
                
            </div><!-- /.blog-post -->

        </div><!-- /.blog-main -->
        
    </div><!-- /.row -->
    <?php include ('../template/sidebar.php');?>
</main><!-- /.container -->
<?php include ('../template/footer.php'); ?>
</body>
</html>
