<?php
session_start();
require_once "database/dbconfig.php";
require_once "data.php";
if(isset($_GET['s'])){
$search_id =$_GET['s'];

if($fb_id == $search_id){
    $fb_id=$fb_id;
    
}else{
    $fb_id=$search_id;
  
}
                    $fetch= mysqli_query($flink,"SELECT * FROM signup WHERE fb_id='$fb_id'");
                        $output1 = "";

                        if(mysqli_num_rows($fetch) == 0){
                            $output1 .="user are not found";
                        }elseif(mysqli_num_rows($fetch) >0){
                            while($row1 = mysqli_fetch_assoc($fetch)){
                           $output1 .='<div class="user-profile">
                              <div class="text-center">
                              <img src="imgd/profiles/'.$row1['profile'].'" class="rounded-circle" height="200px" width="200px" alt="" srcset="">
                              <h3 class="text-uppercase">'.$row1['username'].'</h3>
                               <a href="profile.php?p='.$row1['fb_id'].'" class="btn btn-light w-50 border">Check Profile</a>
                               </div>';
                                }
                            }
                            echo $output1;
                        }else{
                            echo "<script>window.location.href='../../index.php'</script>";
                        }
                        ?>