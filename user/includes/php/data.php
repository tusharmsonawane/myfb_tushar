<?php
$email =  $_SESSION['email'];

$fetch=mysqli_query($flink,"SELECT * FROM signup WHERE email='$email'");
if($row=mysqli_fetch_assoc($fetch)){

    $username =$row['username'];
    $email =$row['email'];
    $profile =$row['profile'];
    $id=$row['id'];
    $fb_id=$row['fb_id'];
    $account=$row['account'];
    $mobilenumber=$row['mobilenumber'];
}

if($account=="public"){
    $icon= "fa-unlock";
}else if($account=="private"){
    $icon= "fa-lock";
}

?>