<?php
session_start();
$user_id = $_SESSION['user_id'];

include_once '../db/connect.php';
$db = mysqli_select_db($connection, 'social_network');
$sql = "SELECT users.user_name,users.user_id,posts.post_id,posts.post_content,posts.post_image,posts.post_date FROM users INNER JOIN posts ON users.user_id=posts.post_user_id WHERE users.user_id=$user_id ORDER BY posts.post_date DESC";

$result = mysqli_query($connection, $sql);
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
?>
            <div class="post">
                <p><?php echo $row['user_name'] ?></p>
                <?php if ($row['post_content'] != '') {
                    echo "<p>" . $row['post_content'] . "</p>";
                } ?>
                <?php
                if ($row['post_image'] != '') {
                ?>
                    <img src='../files/<?php echo $row['post_image']; ?>' height="200">
                <?php
                }

                ?>
            </div>

<?php
        }
    } else {
        echo "Nothing to show!";
    }
} else {
    echo "Something wrong:" . mysqli_error($connection);
}

?>