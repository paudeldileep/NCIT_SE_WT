<?php



//check session
session_start();
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $user_name = $_SESSION['user_name'];

    include_once 'db/connect.php';
    $db = mysqli_select_db($connection, 'social_network');

    //get user info
    $sql = "SELECT user_name,user_email,user_image FROM users WHERE user_id = $user_id";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $user_name = $row['user_name'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
        }
    }

    //handle user's post if post button is pressed
    // if (isset($_POST['post_status'])) {
    //     $post_content = $_POST['status_post'];
    //     $post_image = '';
    //     if (isset($_FILES['image_post'])) {
    //         //check for image file
    //         if ($_FILES['image_post']['name'] != '') {
    //             $post_image = $_FILES['image_post']['name'];
    //             $image_post_tmp = $_FILES['image_post']['tmp_name'];
    //             move_uploaded_file($image_post_tmp, "files/" . $post_image);
    //         }
    //     }
    //     //change date timezone
    //     date_default_timezone_set('Asia/Kathmandu');
    //     $post_date = date('Y-m-d H:i:s');
    //     $post_user_id = $user_id;
    //     $sql = "INSERT INTO posts (post_content, post_image, post_date, post_user_id) VALUES ('$post_content', '$post_image', '$post_date', '$post_user_id')";
    //     $result = mysqli_query($connection, $sql);
    //     if (!$result) {
    //         $post_error = 'Error: ' . mysqli_error($connection);
    //     }
    // }

?>

    <html>

    <head>
        <title>Home</title>
        <link rel="stylesheet" href="css/home.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class="container">
            <div class="left_section">
                <div class="user_info">
                    <div class="user_image">
                        <img src="files/<?php if ($user_image != '') {
                                            echo $user_image;
                                        } else {
                                            echo 'user_icon.png';
                                        } ?>" alt="" class="profile_pic">
                    </div>
                    <div class="user_name">
                        <h2><?php echo $user_name; ?></h2>
                    </div>
                    <div class="signout">
                        <a href="logout.php">Signout</a>
                    </div>
                </div>

            </div>
            <div class="center_section">
                <div id="status_post_section">
                    <!-- form to submit user status -->
                    <form id="form" action="handle_post_upload.php" method="post" enctype="multipart/form-data">
                        <textarea class="status_textarea" id="status_text" name="status_post" placeholder="What's on your mind?"></textarea>
                        <!-- for image -->
                        <input class="status_file" type="file" name="image_post" id="image_post">
                        <input class="status_submit" id="submit_button" type="button" name="post_status" value="Post">
                        <p id="post_status" style="height: 20px;"></p>
                    </form>
                </div>
                <!-- seperator -->
                <div class="seperator"></div>
                <!-- post display area -->
                <div id="display_post_section">
                </div>
            </div>
            <div class="right_section">
                <!-- find friends section -->
                <div class="find_friends">
                    <a class="find_friends_button" href="find_friends.php">Find Friends</a>
                </div>
                <!-- load user's friend list -->
                <div class="friends_list" style="width:100%">
                    <h2 style="border-bottom:1px solid grey;width:100%;margin-left:5px">Friends</h2>
                    <div class="friends_list_section">
                        <?php
                        //get user's friend list
                        $sql = "SELECT friend_id FROM friends WHERE user_id = $user_id";
                        $result = mysqli_query($connection, $sql);
                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $friend_id = $row['friend_id'];
                                    //get friend's info
                                    $sql = "SELECT user_name,user_image FROM users WHERE user_id = $friend_id";
                                    $result = mysqli_query($connection, $sql);
                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $friend_name = $row['user_name'];
                                            $friend_image = $row['user_image'];
                                        }
                                    }
                                    //display friend's info
                        ?>
                                    <div class="friend_list_item">
                                        <div class="friend_image">
                                            <img src="files/<?php if ($friend_image != '') {
                                                                echo $friend_image;
                                                            } else {
                                                                echo 'user_icon.png';
                                                            } ?>" alt="" class="profile_pic">
                                        </div>
                                        <div class="friend_name">
                                            <h3><?php echo $friend_name; ?></h3>
                                        </div>
                            <?php
                                }
                            } else {
                                echo '<h4 style="margin-left:5px">No friends yet</h4>';
                            }
                        }
                            ?>
                                    </div>
                    </div>
                </div>
            </div>

            <!-- js -->

            <script>
                $(document).ready(function() {
                    //refreshing display section
                    setInterval(function() {
                        $("#display_post_section").load("show_posts.php");
                    }, 1000);

                    //ajax form submit
                    $('#submit_button').click(function() {
                        //update post_status
                        $("#post_status").html("Posting...");

                        var fd = new FormData();
                        var image_file = $('#image_post')[0].files;
                        var status_text = $('#status_text').val();
                        console.log(status_text);
                        if (image_file.length > 0) {
                            fd.append('image_post', image_file[0]);
                        }
                        if (status_text != '') {
                            console.log("status text is not empty");
                            fd.append('post_status', status_text);
                        }
                        for (var key of fd.entries()) {
                            console.log(key[0] + ', ' + key[1]);
                        }
                        $.ajax({
                            url: 'handle_post_upload.php',
                            type: 'POST',
                            data: fd,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                $('#status_text').val('');
                                $('#image_post').val('');
                                //$('#display_post_section').load("show_posts.php");
                                console.log('res', response);
                                $("#post_status").html('<span style="color: green;">Post Successful</span>');
                                //remove success message after 3 seconds
                                setTimeout(function() {
                                    $("#post_status").html("");
                                }, 3000);
                            },
                            error: function(xhr, status, error) {
                                var err = eval("(" + xhr.responseText + ")");
                                //set post error with span
                                $("#post_status").html('<span style="color:red">' + err.message + '</span>');

                                //remove error message after 3 seconds
                                setTimeout(function() {
                                    $("#post_error").html("");
                                }, 3000);
                            }
                        });

                    })
                });
            </script>
    </body>

    </html>
<?php
} else {
    header('Location: signin.php');
}
