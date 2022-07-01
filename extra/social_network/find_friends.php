<?php
//check session
session_start();
if (isset($_SESSION['user_id'])) {

    //fetch all user's list who are not in the user's friend list and the user himself


    $user_id = $_SESSION['user_id'];
    include 'db/connect.php';
    $db = mysqli_select_db($connection, 'social_network');
    //fetch except user's friend list and user himself
    $sql = "SELECT user_id, user_name, user_image FROM users WHERE user_id NOT IN (SELECT friend_id FROM friends WHERE user_id = $user_id) AND user_id != $user_id";
    //$sql = "SELECT user_id, user_name, user_image FROM users WHERE user_id NOT IN (SELECT friend_id FROM friends WHERE user_id = $user_id)";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $friend_id = $row['user_id'];
                $friend_name = $row['user_name'];
                $friend_image = $row['user_image'];
                //display user info
                if ($user_id !== $friend_id) {
?>
                    <html>

                    <head>
                        <style>
                            .friend_info {
                                display: flex;
                                flex-direction: row;
                                margin-bottom: 10px;
                                align-items: center;
                            }

                            .friend_image {
                                width: 50px;
                                height: 50px;
                                margin-right: 10px;
                            }

                            .friend_image img {
                                width: 100%;
                                height: 100%;
                            }

                            .friend_name {
                                width: 200px;
                            }
                        </style>
                    </head>

                    <body>
                        <div class="friend_info">
                            <div class="friend_image">
                                <img src="files/<?php if ($friend_image != '') {
                                                    echo $friend_image;
                                                } else echo 'user_icon.png'   ?>" alt="" class="profile_pic">
                            </div>
                            <div class="friend_name">
                                <h3><?php echo $friend_name; ?></h3>
                            </div>
                            <div class="friend_add">
                                <a href="add_friend.php?friend_id=<?php echo $friend_id; ?>">Add Friend</a>
                            </div>
                        </div>
                    </body>

                    </html>
<?php
                }
            }
        } else {
            echo '<h4 style="margin-left:5px">No user found</h4>';
        }
    }
} else {
    header('Location: login.php');
}
