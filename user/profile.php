<?php 
include "includes/header.php";
?>

<?php
if(isset($_GET['p'])){
$p_id =$_GET['p'];

$profile =mysqli_query($flink,"SELECT * FROM signup WHERE fb_id='$p_id'");
if($row = mysqli_fetch_assoc($profile)){
 }

?>
<div class="container">
<?php
if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      '.$_SESSION['success'].'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    unset($_SESSION['success']);
}
?>
<?php
if(isset($_SESSION['error']) && $_SESSION['error'] !=''){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      '.$_SESSION['error'].'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    unset($_SESSION['error']);
}
?>
    <div class="">
        <div class="profile">
            <div class="profile-img mt-3">
              <div class=" d-flex justify-content-center">
                <img src="imgd/profiles/<?php echo $row['profile']; ?> " class="" height="200px" width="200px">
              </div>
            </div>
          <div class="text-center m-2">
            <h4 class="text-uppercase"><?php echo $row['username']; ?></h4>
          </div>
          <div class="profile-acc d-flex justify-content-center">
          <span class="mx-3"><i class="fa fa-users"></i> : 
                <?php
                    $sql2=mysqli_query($flink,"SELECT * FROM friendreq WHERE to_id='$p_id' && status='friend'");
                    
                    if( $row = mysqli_num_rows($sql2)){
                    ?>
                <?php echo "$row" ?>
                    <?php  
                    }
                ?>
            </span>
               <span class="mx-3"><i class="fa fa-images"></i> :
             <?php
                 $sql3=mysqli_query($flink,"SELECT * FROM userpost WHERE user_id='$p_id'");
                 
                 if( $row = mysqli_num_rows($sql3)){
                   ?>
                   <?php echo "$row" ?>
                <?php  
                 }
               ?>
               </span>
            </div>
<?php
if($p_id == $fb_id){
  $class1="d-none";
}else{
  $class1="btn";
}

$req_btn=mysqli_query($flink,"SELECT * FROM friendreq WHERE to_id='$p_id' && from_id='$fb_id' || to_id='$fb_id' && from_id='$p_id'");
if(mysqli_num_rows($req_btn)){
  $class2="disabled";
}else{
  $class2="";
}
?>
              <form action="code.php?profile=<?php echo $p_id; ?>" method="post" class="d-flex justify-content-center mt-2">
                  <button class="<?php echo $class1; ?> btn-success <?php echo $class2; ?>" type="submit" name="friendreq"><i class="fa fa-user"></i></button>
              </form>

          </div>
        </div>
        </div>
    </div>
    <hr>
</div>

<?php
}else{
  echo "<script>window.location.href='index.php'</script>";
}
include "includes/script.php";
include "includes/footer.php";
?>