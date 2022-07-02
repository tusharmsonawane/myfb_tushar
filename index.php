<?php
session_start();
require_once "user/includes/php/database/dbconfig.php";

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  echo "<script>window.location.href='user/index.php'</script>";
  exit;
}



 if(isset($_POST['save'])){
     $email =$_POST['email'];
     $password =$_POST['password'];
     $error= "";
  if(empty($email) && empty($password)){
    $_SESSION['error'] ="Please Filled The Username And Password";
  }else{
    $sql =mysqli_query($flink,"SELECT * FROM signup WHERE email='$email' && password='$password'");

    if(mysqli_num_rows($sql) >0){
     
        $_SESSION['email'] = $email;
        $_SESSION["loggedin"] = true;
        header("location:user/index.php");
    }else{
     
     $_SESSION['error'] ="username and password is not valid";
       
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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="user/asset/css/mdb.min.css">
    <title>  Sign In | MyFb</title>
    <style>
  .fb-status2{
    overflow:auto;
    white-space: nowrap;
    }
  .user-bar{
    overflow-y: scroll;
  }
.post-page{
   overflow-y:scroll;
}

form .passeye a i.active::before{
  content:'\f070';
}

    </style>
  </head>
  <body>



    <div class="conatiner  d-flex justify-content-center align-items-center" style="height:100vh">
        <div class="m-3" style="width:400px" >
            <div class="border p-2 shadow-lg p-3 mb-5 bg-body rounded">
                <div class="login-header">
                    <h1 class="text-center">Login Us</h1>
                    <p class="text-center "><small>a full width container width of the viewport.</small></p>
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
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      '.$_SESSION['error'].'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
    unset($_SESSION['error']);
}
?>
                  </div>
                <hr>
             <form action="index.php" method="post">

                    <div class="p-3">
                        <input type="email" name="email" id="" class="form-control mt-4" placeholder="Username">
                         <div class="position-relative passeye">
                          <input type="password" name="password" id="" class="form-control mt-4" placeholder="Password">
                          <a style="background:none;border:none" class=" position-absolute top-50 end-0 translate-middle"><i class="fa fa-eye"></i></a>
                         </div>
                        <div class="text-center d-grid gap-2">
                            <button type="submit" name="save" class="btn btn-success btn-block mt-2">Login</button>
                        </div>
                    </div>
             </form>
             <hr class="mx-3 my-2">
             <div class="text-center">
                 <a href="signup.php" class="text-decoration-none text-black"><small>You Have Not Created Account!Sign Up Now</small></a>
             </div>
            </div>
        </div>
    </div>
    
    <script>
   const passtext = document.querySelector("form .passeye input[type='password']");
    togglebtn =document.querySelector("form .passeye a i");

   togglebtn.onclick = () =>{
     if(passtext.type=='password'){
         passtext.type='text';
         togglebtn.classList.add("active");
     }else{
         passtext.type='password';
         togglebtn.classList.remove("active");
     }
   }


</script>
<script src="user/asset/js/bootstrap.bundle.min.js"></script>

  </body>
</html>



