<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    //fetch user posts
    include_once 'db/connect.php';
    $db = mysqli_select_db($connection, 'social_network');
    //fetch user posts as well as user's friend posts
    $sql = "SELECT posts.post_id, posts.post_content, posts.post_date, posts.post_user_id,posts.post_image, users.user_name, users.user_image FROM posts INNER JOIN users ON posts.post_user_id = users.user_id WHERE posts.post_user_id = $user_id OR posts.post_user_id IN (SELECT friend_id FROM friends WHERE user_id = $user_id) ORDER BY posts.post_date DESC";
    //$sql = "SELECT * FROM posts WHERE post_user_id = $user_id ORDER BY post_date DESC";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $post_id = $row['post_id'];
                $post_content = $row['post_content'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $user_id = $row['post_user_id'];
                $post_user_name = $row['user_name'];
                $user_image = $row['user_image'];
                //display user info
?>
                <html>

                <head>
                    <link rel="stylesheet" href="css/show_posts.css">
                </head>

                <body>
                    <div class="post" style="margin:5px 0px;border:2px solid white;border-radius:10px;display:flex;flex-direction:column;justify-content:center">
                        <!-- posted user -->
                        <p style="padding:1px ;margin-left:5px">By:<?php echo $post_user_name ?> </p>
                        <?php

                        if ($post_image != '') {
                        ?>
                            <div style="width:100%;height:300px;overflow:hidden;border-radius:10px">
                                <img src="files/<?php echo $post_image; ?>" style="width:100%;object-fit:contain;">
                            </div>
                        <?php } ?>
                        <?php if ($post_content != '') { ?>
                            <p style="font-size:20px;padding:0px ;margin-left:5px;color:black;"> <?php echo $post_content; ?> </p>
                        <?php } ?>

                    </div>
        <?php
            }
        } else {
            echo '<div class="error_posts">No posts found</div>';
        }
    } else {
        echo mysqli_error($connection);
        echo '<div class="error_posts">No posts found</div>';
    }
} else {
        ?>
        <div class="error_posts">
            <p>Error loading posts</p>
        </div>

    <?php
}
    ?>
                </body>

                </html>