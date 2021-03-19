<?php
$sql = "SELECT * FROM comments WHERE comments.post_id = {$_GET['post_id']}";
$comments = GetAllCommentsFromDB($sql, $connection);
?>

<div class="comments">
    <h3>Comments:</h3>
    <?php
    foreach ($comments as $comment) {
    ?>
        <div class="single-comment">
            <div>posted by: <strong><?php echo $comment['author'] ?></strong> </div>
            <div>
                <?php echo $comment['text'] ?>
                <hr>
            </div>
        </div>
    <?php
    }
    ?>
</div>