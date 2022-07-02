<?php
session_start();
require_once "database/dbconfig.php";
require_once "data.php";

if(isset($_POST['how'])){
    $post_id=$_POST['data'];
    $user_id=$fb_id;

    $sql ="SELECT `user_id`, `post_id` FROM `likes` WHERE user_id='$user_id' AND post_id='$post_id'";

    $res=$flink->query($sql);
    if($res->num_rows==0){
        $sql1="UPDATE `userpost` SET `count`=count+1 WHERE post_id='$post_id'";
        if($flink->query($sql1)){
            $sql2="INSERT INTO `likes`(`user_id`, `post_id`) VALUES ('$user_id','$post_id')";
            if($flink->query($sql2)){
                echo $post_id;
            }
        }
    }else if($res->num_rows==1){
        $sql3="UPDATE `userpost` SET `count`=count-1 WHERE post_id='$post_id'";
        if($flink->query($sql3)){
            $sql4="DELETE FROM `likes` WHERE user_id='$user_id' and post_id='$post_id'";
            if($flink->query($sql4)){
                echo $post_id;
            }
        } 
    }
}else{
    echo "<script>window.location.href='../../index.php'</script>";
}
?>