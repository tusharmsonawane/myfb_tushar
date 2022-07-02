<?php
include "includes/header.php";
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

<?php
$post =mysqli_query($flink,"SELECT * FROM userpost");
if(mysqli_num_rows($post)>0){

    ?>

<div class="row">
    <div class="col-md-7 post-page border" >
<?php
    while($row =mysqli_fetch_assoc($post)){
    $user_friend =mysqli_query($flink,"SELECT * FROM friendreq WHERE to_id='$fb_id'  && from_id='$row[user_id]'  && status='friend' || to_id='$row[user_id]' && from_id='$fb_id'   && status='friend' || to_id='$fb_id'|| from_id='$fb_id'");
    if(mysqli_num_rows($user_friend)>0){
    
        ?>
        <div class="card text-center  userpose border m-3">
            <div class="card-header text-start">
                <a href="profile.php?p=<?php echo $row['user_id'];?>" class="text-start text-decoration-none text-black  text-uppercase"><?php echo $row['username']; ?></a>
            </div>
            <div class="card-body">
                <img src="imgd/posts/<?php echo $row['image']; ?>" class="card-img" alt="" height="250px" >
            </div>
          <?php
            $sql_like=mysqli_query($flink,"SELECT * FROM likes WHERE user_id='$fb_id' AND post_id='$row[post_id]'");
            if(mysqli_num_rows($sql_like)){
                $class="fa";
            }else{
                $class="fa-regular";
            }
          ?>
            <div class="card-footer text-start">
                <a  class="like mx-2 text-black" title="<?php echo $row['post_id']?>" id="<?php echo $row['post_id']?>"><i class="<?php echo $class; ?>  fa-thumbs-up fs-4 "></i><span>(<?php echo $row['count']?>)</span></a>
                <a href="comment.php?c=<?php echo $row['post_id']?>" class="text-decoration-none text-black"   id="myButton"><i class="fa-regular fa-comment fs-4"></i></a>
                <p class="float-end"><?php echo $row['date'];?></p>
            </div> 

        </div>
        <?php
    }
    }
}


    ?>
    </div>




    <div class="col-md-5 mt-2 profile_page " style="height:82vh">
        <div class="text-center ">
            <div class="profile">
                <img src="imgd/profiles/<?php echo $profile;?>" alt="" class="rounded-circle test-popup-link" style="height:200px;width:200px">
            </div>
            <div class="profile-name">
                <a href="#" class="text-decoration-none text-black fs-3" style="text-transform: capitalize;"><?php echo $username; ?></a>
            </div>
            <hr>
            <div class="user-acc">
            <span class="mx-3"><i class="fa fa-users"></i> : 
                <?php
                    $sql2=mysqli_query($flink,"SELECT * FROM friendreq WHERE to_id='$fb_id' || from_id='$fb_id' && status='friend'");
                    
                    if( $row = mysqli_num_rows($sql2)){
                    ?>
                <?php echo "$row" ?>
                    <?php  
                    }
                ?>
            </span>
               <span class="mx-3"><i class="fa fa-images"></i> :
             <?php
                 $sql3=mysqli_query($flink,"SELECT * FROM userpost WHERE user_id='$fb_id'");
                 
                 if( $row = mysqli_num_rows($sql3)){
                   ?>
                   <?php echo "$row" ?>
                <?php  
                 }
               ?>
               </span>
            </div>
        </div>
    </div>
</div>

</div>




<script src="asset/js/like.js"></script>
<?php
include "includes/script.php";
include "includes/footer.php";
?>