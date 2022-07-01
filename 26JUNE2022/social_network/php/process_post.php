<?php
    session_start();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(empty($_POST['post_text']) && empty($_FILES['post_image']['name'])){
            echo "post cannot be empty!";
        }
        else{
            $text=$_POST['post_text'];
            $image='';
            $user_id=$_SESSION['user_id'];

            if($_FILES['post_image']['name']!=''){
                $image_name=$_FILES['post_image']['name'];
                $tmp=$_FILES['post_image']['tmp_name'];
                //for type

                $target='../files/'.$user_id.'_'.$image_name;

                move_uploaded_file($tmp,$target);
                $image=$user_id.'_'.$image_name;
            }
            date_default_timezone_set('Asia/Kathmandu');
            $post_date = date('Y-m-d H:i:s');
            //db connection
            include_once '../db/connect.php';
            $db=mysqli_select_db($connection,'social_network');
            $query="INSERT INTO posts(post_content,post_date,post_image,post_user_id) VALUES('$text','$post_date','$image',$user_id)";

            if(mysqli_query($connection,$query)){
                    echo "Posted succesfully";
            }
            else{
                echo "Something went wrong".$mysqli_error($connection);
            }
        }
    }
    else{
        header('Location:signin.php');
    }
