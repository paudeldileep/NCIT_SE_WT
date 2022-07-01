<?php
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    //get user info
    include_once '../db/connect.php';
    $db = mysqli_select_db($connection, 'social_network');
    $query = "SELECT * FROM users WHERE user_id=$user_id";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $user_name = $row['user_name'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
    }
    //user logged in show home page
?>
    <html>

    <head>
        <style>
            body {
                margin: 0;
                padding: 0;
            }

            .container {
                width: 100%;
                min-height: 100vh;
                background-color: red;
                display: flex;
                flex-direction: row;
                justify-content: space-between;

            }

            .left_section {
                width: 20%;
                background-color: lightyellow;
                min-height: 100vh;
            }

            .center_section {
                width: 60%;
                background-color: lightgray;
                min-height: 100vh;
            }

            .right_section {
                width: 20%;
                background-color: lightyellow;
                min-height: 100vh;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="left_section">
                <!-- for user info -->
                <div class="profile_info">
                    <img src="../files/<?php if ($user_image != '') {
                                            echo $user_image;
                                        } else {
                                            echo 'user_icon.png';
                                        } ?>" alt="">
                    <p><?php echo $user_name; ?></p>
                </div>
            </div>
            <div class="center_section">
                <!-- for user post -->
                <div class="form" style="width: 100%;display:flex;justify-content:center">
                    <form method="POST" action="process_post.php" enctype="multipart/form-data" class="post_form" style="display:flex;flex-direction:column;justify-content:center;width:70%;">
                        <textarea name="post_text" id="post_text" placeholder="What's in your mind?">

                    </textarea>
                        <input type="file" name="post_image" id="post_image">
                        <input type="submit" id="post_submit" value="POST">
                    </form>
                </div>
                <!-- to display posts from db -->
                <div class="posts_section">

                </div>
            </div>
            <div class="right_section">
                <!-- for friends -->
            </div>
        </div>

    </html>

<?php
} else {
    header('Location: signin.php');
}
?>