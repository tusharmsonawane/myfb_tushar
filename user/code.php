<?php
session_start();
require_once "includes/php/database/dbconfig.php";
require_once "includes/php/data.php";

if(isset($_POST['Post'])){
  $image = $_FILES['image']['name'];

if(empty($image)){
    echo "please filled the data";
}else{
   $al_post=mysqli_query($flink,"SELECT * FROM userpost WHERE image='$image'");
if(mysqli_num_rows($al_post)){
    echo "already";
}else{
    $image_explode = explode('.',$image);
    $img_ext = end($image_explode);
    $time =time();
    $post_id =rand(time(), 100000000);

    $extensions =['png','jpeg','jpg'];
    if(in_array($img_ext,$extensions) === true){
     
      $post=mysqli_query($flink,"INSERT INTO userpost(post_id,username,email,image,user_id) VALUES('$post_id','$username','$email','$image','$fb_id')");
      if($post){
        
        move_uploaded_file($_FILES["image"]["tmp_name"], "imgd/posts/".$_FILES["image"]["name"]);
         $_SESSION['success'] ="You Are Photo Added Successfuly.";
        header("location:index.php");
      }else{
        $_SESSION['error'] ="You Are Photo Is Not Added.";
        header("location:index.php");
      }
    }else{
      $_SESSION['error'] ="Please Select Only Jpeg,Jpg,Png";
       
    }
}
}
}else{
  echo "<script>window.location.href='index.php'</script>";
}


                       
if(isset($_POST['comments'])){

  $comment =$_POST['comment'];
  $to_id=$fb_id;
  $from_id =$_GET['userpost']; 
  

if(!empty($comment)){

$cmt_send = mysqli_query($flink,"INSERT INTO comment(to_id,from_id,comment) VALUES('$to_id','$from_id','$comment')");
if($cmt_send){
 
header("location:comment.php?c=$from_id");
$_SESSION['success'] ="Your Comment Sent Succesffuly";
}else{
header("location:comment.php?c=$from_id");
$_SESSION['error'] ="Your Comment Not Sent";

}
}

}else{
  echo "<script>window.location.href='index.php'</script>";
}


if(isset($_POST['ProfileEdit'])){
  $image = $_FILES['image']['name'];

  $query = "UPDATE signup SET profile='$image' WHERE fb_id='$fb_id'";
  $query_run = mysqli_query($flink, $query);


  if($query_run){
     move_uploaded_file($_FILES["image"]["tmp_name"], "imgd/profiles/".$_FILES["image"]["name"]);
     header("location:myprofile.php");
  }else{
    echo "profile is not updated";
  }
}else{
  echo "<script>window.location.href='index.php'</script>";
}




if(isset($_POST['friendreq'])){

  $to_id= $fb_id;
  $from_id =$_GET['profile'];
  $status = "unfriend";

  $sql_query=mysqli_query($flink,"SELECT * FROM friendreq WHERE to_id='$to_id' && from_id='$from_id'");
  if(mysqli_num_rows($sql_query) >0){
    header("location:profile.php?p=$from_id");
  }else{
    $sql =mysqli_query($flink,"INSERT INTO friendreq(to_id,from_id,status) VALUES('$to_id','$from_id','$status')");
    if($sql){
      header("location:profile.php?p=$from_id");
      $_SESSION['success'] ="Your Friend Request Send Succesfuly";
    }else{
      $_SESSION['error'] ="Your Friend Request Not Send";
    }
  }

}else{
  echo "<script>window.location.href='index.php'</script>";
}
if(isset($_GET['a'])){
  $from_id =$_GET['a'];
  $to_id =$_GET['b'];

    $sql =mysqli_query($flink,"UPDATE friendreq SET status='friend' WHERE from_id='$from_id' && to_id='$to_id'");
    if($sql){
      header("location:notify.php");
    }else{
      echo "error";
    }
}else{
  echo "<script>window.location.href='index.php'</script>";
}


?>
