<?php 
include "includes/header.php";
?>
<?php

$id =$fb_id;

$profile =mysqli_query($flink,"SELECT * FROM signup WHERE fb_id='$id'");
if($profile = mysqli_fetch_assoc($profile)){
 
  $profile= $profile['profile'];
  
}

?>
<div class="container">
    <div class="text-center mt-2">
        <div class="profile ">
            <div class="profile-img">
              <div class="d-flex justify-content-center">
                <img src="imgd/profiles/<?php echo $profile?>" class="" height="200px" width="200px">

              </div>
            </div>
          <div class="text-center mt-3">
            <h4 class="text-uppercase"><?php echo $username; ?></h4>
          </div>



          <div class="myprofile-acc d-flex justify-content-center mt-2 mb-3">
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











          <div class="row d-flex justify-content-center">
           <div class="col-4">
           <div class="row h-50 mx-0">
          
              <div class="col-12">
              <a href="#" class="btn btn-success" data-mdb-toggle="modal" data-mdb-target="#ProfileEdit">
                     <i class="fa fa-edit"></i> Edit
                     </a>
              </div>
            </div>
           </div>
          </div>
        </div>
    </div>
    <hr>
</div>


<div class="modal fade" id="ProfileEdit" data-mdb-backdrop="static" data-mdb-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Profile Edit</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <input type="file" class="form-control" name="image" value="<?php echo $profile;  ?>">
        </div>
        <div class="modal-footer d-flex justify-content-center">
           <button type="submit" class="form-control" name="ProfileEdit">Edit</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
include "includes/script.php";
include "includes/footer.php";
?>