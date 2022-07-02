<?php
if(isset($_POST['search'])){
require_once "database/dbconfig.php";

$s_id = $_POST['search'];

$sql =mysqli_query($flink,"SELECT * FROM signup WHERE username LIKE '%{$s_id}%' or email LIKE '%{$s_id}%'");
$output ="";
if(mysqli_num_rows($sql) >0){
    while($row =mysqli_fetch_assoc($sql)) {
        $output .="<li style='text-transform:capitalize'><a href=search.php?s={$row["fb_id"]} class=text-black>{$row["username"]}</a></li>";
    }
    echo $output;
}
}else{
    echo "<script>window.location.href='../../index.php'</script>";
}
?>