<?php
include "includes/header.php";
require_once "includes/php/data.php";
if(isset($_GET['email'])){

}else{
    echo "<script>window.location.href='setting.php#delete'</script>";
}
?>
<?php
    if(isset($_POST['delete_account'])){
        $delete_password=$_POST['password'];
        
        $delete_account =mysqli_query($flink,"DELETE FROM `signup` WHERE email='$email' && password='$delete_password'");
        if($delete_account){
            $delete_userpost =mysqli_query($flink,"DELETE FROM `userpost` WHERE email='$email'");
            if($delete_userpost){
                $delete_friend =mysqli_query($flink,"DELETE FROM `friendreq` WHERE to_id='$fb_id' || from_id='$fb_id'");
                if($delete_friend){
                    $delete_like =mysqli_query($flink,"DELETE FROM `likes` WHERE user_id='$fb_id'");
                    if($delete_like){
                        $delete_comment =mysqli_query($flink,"DELETE FROM `comment` WHERE to_id='$fb_id'");
                        if($delete_comment){
                            echo "<script>window.location.href='logout.php'</script>";
                        }
        
                    }
                }
            }
        }else{
            echo "<script>window.location.href='logout.php'</script>";
        }
        }
?>

<div class="row d-flex justify-content-center align-items-center w-100" style="min-height:70vh">
    <div class="col-md-8 border">
        <h2 class="text-center m-3">
        Delete Account Permantaly
        </h2>
        <p class="text-center">Are You Sure,You Want To Delete Your Account Permantaly.</p>
        <hr>
        <form action="delete_acc.php" method="post" class="m-3">
            <input type="text" name="reasone" id="" class="form-control mt-2" placeholder="Give Me Reason..." required>
            <input type="password" name="password" id="" class="form-control mt-2" placeholder="Enter Your Password..." required>
            <button type="submit" class="btn btn-danger btn-block mt-2" name="delete_account">Delete Account</button>
        </form>
    </div>
</div>
<?php
include "includes/script.php";
include "includes/footer.php";
?>