<?php
require_once 'php/database/dbconfig.php';
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  echo "<script>window.location.href='../index.php'</script>";
  exit;
}


 
require_once "php/data.php";
$user_active=mysqli_query($flink,"SELECT * FROM signup WHERE email='$email'");
if(mysqli_num_rows($user_active)){

}else{
  echo "<script>window.location.href='logout.php'</script>";
}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="asset/css/mdb.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/all.min.css">
    <link rel="stylesheet" href="asset/css/fontawesome.min.css">
    <script src="asset/js/jquery.min.js"></script>

    <title> MyFb</title>

  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-sm">
        <a class="navbar-brand" href="index.php">MyFb</a>
        <button class="navbar-toggler text-black" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="search.php?s=<?php echo $fb_id; ?>">Search</a>
              
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="notify.php">Notification</a>
            </li>

          </ul>
          <div class="dropdown mx-5">
  <a href="#"  aria-expanded="false" class=" text-end text-decoration-none text-white text-uppercase" id="dropdownMenuButton"
  data-mdb-toggle="dropdown"><img class="rounded-circle  border border-primary" src="imgd/profiles/<?php echo $profile ?>" style="height:30px;width:30px" alt=""><span style="font-size:12px;"><?php echo $username; ?></span></a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">

    <li><a class="dropdown-item" style="text-transform: capitalize;" href="#"><?php echo $username; ?></a></li><hr class="my-0">
    <li><a class="dropdown-item" href="myprofile.php">My Profile</a></li>
    <li><a class="dropdown-item" href="#" data-mdb-toggle="modal" data-mdb-target="#examplePost">Post</a></li>
    <li><a class="dropdown-item" href="setting.php">Setting</a></li>
    <li><a class="dropdown-item" href="logout.php">LogOut</a></li>
 
  </ul>
</div>
        </div>


      </div>
    </nav>

















