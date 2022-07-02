<?php
include "includes/header.php";
?>
<style>
@media screen and (max-width:600px){
.notify-bar .card-header a{
font-size:12px;
}
.notify-bar .card-body p{
    font-size:12px;
}
}
@media screen and (max-width:400px){
.notify-bar .card-header a{
font-size:10px;
}
}
</style>
<?php
$fr_fetch =mysqli_query($flink,"SELECT * FROM friendreq WHERE to_id='$fb_id'");
if($row =mysqli_fetch_assoc($fr_fetch)){
    $to_id=$row['to_id'];
    $from_id=$row['from_id'];
}

?>





<div class="container">
    <div class="border mt-2 notify-bar" style="height:80vh">
        <div class="m-5">
        <?php
            
            $re_send=mysqli_query($flink,"SELECT * FROM friendreq WHERE from_id='$fb_id'  && status='unfriend'");
            while($row3=mysqli_fetch_assoc($re_send)){
                $from_id=$row3['to_id'];
                $re_name=mysqli_query($flink,"SELECT * FROM signup WHERE fb_id='$from_id'");
                if($row2=mysqli_fetch_assoc($re_name)){
    
                }
                ?>
            <div class="card border mb-2 ">
                <div class="card-header position-relative">
                    <img src="imgd/profiles/<?php echo $row2['profile'];?>" alt="" class="float-start  rounded-circle" height="40px" width="40px">
                    <a href="#" class="position-absolute end-0 top-50 translate-middle  text-decoration-none text-uppercase text-black"><?php echo $row2['username'];?></a>
                </div>
                <div class="card-body">
                    <p style="text-transform:capitalize"><?php echo $row2['username'] ?> are send you friend request</p>
                </div>
                <div class="card-footer">
                <a href="code.php?a=<?php echo $row3['from_id'];?> && b=<?php echo $row3['to_id'];?>" class="btn btn-primary float-end  mx-1">Accept</a>

               </div>
            </div>
            <?php
                }
                ?>

  <?php
            $re_send=mysqli_query($flink,"SELECT * FROM friendreq WHERE to_id='$fb_id'   && status='friend'");
            while($row4=mysqli_fetch_assoc($re_send)){
                $from_id=$row4['from_id'];
                $re_name=mysqli_query($flink,"SELECT * FROM signup WHERE fb_id='$from_id'");
                if($row5=mysqli_fetch_assoc($re_name)){
    
                }
                ?>
        <div class="card border mb-2 ">
                <div class="card-header position-relative">
                    <img src="imgd/profiles/<?php echo $row5['profile'];?>" alt="" class="float-start  rounded-circle" height="40px" width="40px">
                    <a href="#" class="position-absolute end-0 top-50 translate-middle  text-decoration-none text-uppercase text-black"><?php echo $row5['username'];?></a>
                </div>
                <div class="card-body">
                    <p style="text-transform:capitalize"><?php echo $row5['username'];?> are accepted your friend request</p>
                </div>
        </div>

        <?php
 }
?>

        </div>
    </div>
</div>

<?php
include "includes/script.php";
include "includes/footer.php";
?>