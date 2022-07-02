<?php
include "includes/header.php";
?>
<style>
  .box_setting{
  scroll-behavior: smooth;
}
.profile_page_update ul{
  list-style: none;
}
.profile_page_update ul li{
  margin-top:13px;
  
}

@media screen and (max-width:700px) {
.profile_page_update ul li a {
font-size:20px;
}
.profile_page_update ul li a span{
display:none;
}
}
@media screen and (max-width:600px) {
.profile_page_update{
overflow-x:scroll;
}
.profile_page_update ul  {
display:flex;
justify-content:center;

}
.profile_page_update ul  li{
margin-left:10px;
background:none;
border:none;
}

}

</style>
<div class="row d-flex justify-content-center w-100">
    <div class="col-md-10">
    <div class="row mt-2" >
    <div class="col-sm-3 border profile_page_update">
        <ul>
        <li><a href="#account" class="btn btn-light btn-block position-relative"><i class="fa fa-lock mx-2 position-absolute start-0"></i><span>Account</span></a></li>
            <li><a href="#profile" class="btn btn-light btn-block  position-relative"><i class="fa fa-user mx-2 position-absolute start-0"></i><span>Edit Profile</span></a></li>
            <li><a href="#password" class="btn btn-light btn-block position-relative"><i class="fa fa-unlock mx-1 position-absolute start-0"></i><span>Forget Password</span></a></li>
            <li><a href="#delete" class="btn btn-light btn-block position-relative"><i class="fab fa-bin mx-2 position-absolute start-0"></i><span>Delete Account</span></a></li>
    
        </ul>
    </div>

    <?php
    if(isset($_GET['account'])){
      $account3 ="";
      if($account =='public'){
        $account2 ="private";
      }else if($account =='private'){
        $account2 ="public";
      }
     $account=mysqli_query($flink,"UPDATE signup SET account='$account2' WHERE fb_id='$fb_id'");
     if($account){
        echo "<script>window.location.href='setting.php'</script>";
     }else{
       echo "<script>window.location.href='index.php'</script>";
     }
   }?>
    <div class="col-sm-9 border box_setting" style="overflow-y:scroll;height:80vh">
         <section id="account">
            <div class="row d-flex justify-content-center mx-3 mt-2">
              <div class="col-md-6 border d-flex justify-content-center">
                  <p class="fw-bolder mt-2">Account Type:</p>
              </div>
              <div class="col-md-6 border d-flex justify-content-center">
                  <a href="setting.php?account=<?php echo $account;?>" class="mt-2"><i class="fa <?php echo $icon?>"></i> <?php echo $account;?></a>
                 </div>
            </div>
         </section>
    
      <hr>
    
    
    
    
    
    
    <section id="profile" class="mt-3 text-center" style="height:74vh">
              <img src="imgd/profiles/<?php echo $profile;?>" class="text-center" style="height:70px;width:70px;border-radius:50%" alt="" srcset="">
              <div class="name" style="text-transform:capitalize">
                <?php echo $username?>
              </div>
              <hr>
              <h1 class="text-center">
                Update Profile
              </h1>
                <?php

                if(isset($_POST['update_profile'])){
                  $update_username = $_POST['update_username'];
                  $update_email= $_POST['update_email'];
                  $update_mobile= $_POST['update_mobile'];

                  $update_profile =mysqli_query($flink,"UPDATE signup SET username='$update_username', email='$update_email', mobilenumber='$update_mobile' WHERE email='$update_email'");
                  if($update_profile){
                    echo "<script>window.location.href='setting.php'</script>";
                  }else{
                    echo "<script>window.location.href='setting.php'</script>";
                  }
                }

                ?>

              <div class="row justify-content-center">
                <div class="col-md-8">
                <form action="setting.php" method="post">
                 <input type="text" name="update_username" id="" value="<?php echo $username; ?>" class="form-control mt-2" placeholder="Update Your Username..">
                 <input type="email" name="update_email" id="" value="<?php echo $email; ?>" class="form-control mt-2" placeholder="Update Your Email..">
                 <input type="text" name="update_mobile" id="" value="<?php echo $mobilenumber;?>" class="form-control mt-2" placeholder="Update Your Mobile Number..">
                 <button type="submit" class="btn btn-success btn-block mt-2" name="update_profile">Update Profile</button>
              </form>
                </div>
              </div>

         </section>
         <hr class="border-bolder">
         <section id="password" style="height:74vh">
              <h1 class="text-center">
                Forget Password
              </h1>
              <p class="text-center">forget your password </p>
              <hr class="mx-5">
              <?php
              if(isset($_POST['forget_password'])){
              $old_password =$_POST['old_password'];
              $new_password_1 =$_POST['new_password_1'];
              $new_password_2 =$_POST['new_password_2'];

              if(empty($old_password) && empty($new_password_1) && empty($new_password_2)){
                     echo "empty";
              }else{
                  if($old_password != $new_password_1){
                      if($new_password_1 == $new_password_2){
                          $forget_sql =mysqli_query($flink,"UPDATE signup SET password='$new_password_1' WHERE password='$old_password' && fb_id='$fb_id'");
                          if($forget_sql){
                            echo "<script>window.location.href='setting.php#password'</script>";
                          }else{
                            echo "<script>window.location.href='setting.php#password'</script>";
                          }
                      }else{
                        echo "paasword does no match";
                      }
                  }else{
                      echo "password are match";
                  }
              }

            }
              ?>

              <div class="row d-flex justify-content-center forget_password" >
                <div class="col-md-8 ">
                <form action="setting.php" method="post">
                <input type="password" name="old_password" id="" class="form-control mt-2" placeholder="Enter Your Old Password..">
                <input type="password" name="new_password_1" id="" class="form-control mt-2" placeholder="Enter Your New Password..">
                <input type="password" name="new_password_2" id="" class="form-control mt-2" placeholder="Confirm New Password..">
                <button type="submit" class="btn btn-danger mt-2 btn-block" name="forget_password">Forget Password</button>
               
              </form>
                </div>
              </div>
         </section>
         <hr>
         <section id="delete" style="height:74vh">
             <div class=""  style="min-height:74vh">
             <h1 class="text-center ">
               Delete Account
              </h1>
              <p class="text-center">are you sure your account is deleted permanetly</p>
               <hr class="mx-5">
              <div class="row justify-content-center">
                  <div class="col-md-8 mt-3">
                  <?php
                   if(isset($_GET['delete_account'])){
                          $delete_email =$_GET['delete_email'];
                          if($delete_email === $email){
                            echo"<script>window.location.href='delete_acc.php?email=$delete_email'</script>";
                          }else{
                                echo "email are not exist";
                          }
                   }
                  ?>
                <form action="setting.php" method="get">
                        <input type="email" name="delete_email" id="" class="form-control" placeholder="Enter Your Email.." required>
                        <button type="submit" class="btn btn-danger btn-block mt-2" name="delete_account">Delete Account</button>
              </form>
                </div>
              </div>
             </div>
         </section>

    </div>
</div>
    </div>
</div>

<?php
include "includes/script.php";
include "includes/footer.php";
?>