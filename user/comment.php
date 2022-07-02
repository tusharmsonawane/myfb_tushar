<?php
if(isset($_GET['c'])){
 include "includes/header.php";
?>

<?php
$userpost =$_GET['c'];

$comment_post=mysqli_query($flink,"SELECT * FROM userpost WHERE post_id='$userpost'");
if($row=mysqli_fetch_array($comment_post)){

    $image= $row['image'];
    $user_id =$row['user_id'];
}


$comment_user=mysqli_query($flink,"SELECT * FROM signup WHERE fb_id='$user_id'");
if($row1=mysqli_fetch_array($comment_user)){

    $username2=$row1['username'];
    $profile= $row1['profile'];
}

?>
<div class="container comment" >

    <div class="row d-flex justify-content-center align-items-center" style="height:90vh">
        <div class="col-10 mt-2 ">
            <div class="row">
               <div class="col-md-6 border d-flex justify-content-center align-items-center">
                    <div class="img_mr">
                    <img src="imgd/posts/<?php echo $image ?>" class="u_img" alt="">
                    </div>
               </div>
               <div class="col-md-6 border">
                    <div class="header m-2">
                        <a href="index.php" class="m-2"><i class="fa fa-arrow-left"></i></a>
                        <img src="imgd/profiles/<?php echo $profile; ?>" class="rounded-circle" height="40px" width="40px" alt="">
                        <a href="#" class="text-black text-uppercase"><?php echo $username2; ?></a>
                    </div>
                    
                        
                    <div class="body border position-relative">
                    <?php
                      $from_id=$userpost;
                     
                      $comment_fetch =mysqli_query($flink,"SELECT * FROM comment WHERE from_id='$from_id'");

                      while($row3 = mysqli_fetch_array($comment_fetch)){
                            $to_id =$row3['to_id'];
                            $usercomment =mysqli_query($flink,"SELECT * FROM signup WHERE fb_id='$to_id'");
                            if($row4 =mysqli_fetch_assoc($usercomment)){
                                $username2 =$row4['username'];
                                $profile =$row4['profile'];
                            }
                         
                        ?>
                        <div class="textmsg float-end">
                        <img src="imgd/profiles/<?php echo $profile; ?>" class="rounded-circle my-0" height="20px" width="20px" alt="">
                        <a href="#" class="text-uppercase"><?php echo $username2;?></a>
                        <hr class="my-0">
                        <p><?php echo $row3['comment'];?></p>
                        </div>
                        <?php
                          }
                        
                         ?>
                    </div>
                    
                
                    <div class="footer">
                    <form action="code.php?userpost=<?php echo $userpost;?>" method="post">
                    <input type="text" name="comment" class="form-control " id="">
                    <button type="submit" class="btn btn-light" name="comments">send</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
 include "includes/script.php";
 include "includes/footer.php";
                        }else{
                            echo "<script>window.location.href='index.php'</script>";
                        }
?>