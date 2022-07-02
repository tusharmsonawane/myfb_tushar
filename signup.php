<?php
session_start();
require_once 'user/includes/php/database/dbconfig.php';

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo "<script>window.location.href='user/index.php'</script>";
    exit;
  }
  
 if(isset($_POST['save'])){
     $username =$_POST['username'];
     $email =$_POST['email'];
     $mobilenumber =$_POST['mobilenumber'];
     $password =$_POST['password'];
     $cpassword =$_POST['cpassword'];
     $error='';
     $success='';

if(empty($username) && empty($email) && empty($mobilenumber) && empty($password) && empty($cpassword)){
   $_SESSION['error'] = "please filled the data ";
}else{
    $username_query=mysqli_query($flink,"SELECT * FROM signup WHERE username='$username'");
    if(mysqli_num_rows($username_query)>0){
        $_SESSION['error'] = "this username already exist!please user another";
        
    }else{
        $email_query=mysqli_query($flink,"SELECT * FROM signup WHERE email='$email'");
        if(mysqli_num_rows($email_query)>0){
            $_SESSION['error'] = "this email address already exist";
        }else{
            $phone_query=mysqli_query($flink,"SELECT * FROM signup WHERE mobilenumber='$mobilenumber'");
            if(mysqli_num_rows($phone_query)>0){
                $_SESSION['error'] = "this mobile number  already exist";
            }else{
               if(strlen($mobilenumber) >=10){
                if(strlen($password) >=6){
                    if($password == $cpassword){
                         $time =time();
                         $fb_id= rand(time(), 1000000);
                
                        $query=mysqli_query($flink,"INSERT INTO signup(fb_id,username,email,mobilenumber,password) VALUES('$fb_id','$username','$email','$mobilenumber','$password')");
                        if($query){
                            header("location:index.php");
                        }else{
                            $_SESSION['error'] = "something went to wrong";
                        }
                    }else{
                        $_SESSION['error'] = "password does not match";
                    
                    }
                  }else{
                    $_SESSION['error'] ="password should be 8 characters";
                  }
               }else{
                   $_SESSION['error'] ="Mobile number should be 10 number";
               }
            }
        }
    }
}

 }
?>








<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="user/asset/css/mdb.min.css">
    <title>  Sign Up </title>
    <style>
        form .passeye a i.active::before{
            content:'\f070';
            }
    </style>
  </head>
  <body>

    <div class="conatiner  d-flex justify-content-center align-items-center" style="height:100vh">
        <div class="m-3" style="width:700px">
            <div class="border rounded p-2 shadow-lg p-3 mb-5 bg-body rounded">
                <div class="login-header">
                    <h1 class="text-center">Sign Up</h1>
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
                </div>
                <hr class="mx-2 my-3">
             <form action="#" method="post">
                 
                    <div class="">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                            <input type="text" name="username" id="" class="form-control" placeholder="Enter Your Name..." required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="email" name="email" id="" class="form-control" placeholder="Enter The Email Address...." required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="number" name="mobilenumber" id="" class="form-control" placeholder="Enter Mobile Number..." required>
                            </div>
                            <div class="col-md-6 mb-3 position-relative passeye">
                                 <input type="password" name="password" id="" class="form-control" placeholder="Password" required>
                                 <a style="background:none;border:none" class="position-absolute top-50 end-0 translate-middle mx-2"><i class="fa fa-eye"></i></a>
                            </div>
                            <div class="col-md-6 position-relative mb-3">
                                <input type="password" name="cpassword" id="" class="form-control" placeholder="Confirm Password" required>
                            </div>
                            <div class="d-grid gap-2 mb-3 col-md-6 ">
                                <button class="btn btn-danger" type="reset">Reset</button>
                            </div>
                            <div class="d-grid gap-2 mb-3 col-md-6">
                                <button type="submit" name="save" class="btn btn-success" >Submit</button>
                            </div>
                    </div>
                    
                    </div>
             </form>
             <hr class="mx-5 my-2">
             <div class="text-center ">
                <a href="index.php" class="text-decoration-none text-black">You have alredy account!Login Now</a>
             </div>
            </div>
        </div>
    </div>
<script>
   const passtext = document.querySelector("form .passeye input[type='password']");
    togglebtn =document.querySelector("form .passeye a i");

   togglebtn.onclick = () =>{
     if(passtext.type=="password"){
         passtext.type="text";
         togglebtn.classList.add("active");
     }else{
         passtext.type="password";
         togglebtn.classList.remove("active");
     }
   }


</script>
<script src="user/asset/js/bootstrap.bundle.min.js"></script>
  </body>
</html>



