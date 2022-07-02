<?php 
include "includes/header.php";
?>

<div class="container">
    <div class="">
    <div class="wrapper">
                <div class="searchbar">
                    <input type="text" name="" class="form-control" id="search" autocomplete="off" placeholder="search the items..">
                <div class="user_auth" id="user_auth">
    
                </div>
                <div class="icon"><i class="fas fa-search"></i></div>
                </div>
        </div>


         <div class="search-container p-3 border m-4">
             <div class="row">
                <div class="col-md-12 s_profile">
        
                </div> 

             </div>
        </div>
    </div>
</div>
<script>
    
    const userprofile =document.querySelector(".s_profile");
      let xhr = new XMLHttpRequest();
      xhr.open("GET","includes/php/s_profile.php?s=<?php echo $_GET['s'];?>",true);
       xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data =xhr.response;
           userprofile.innerHTML =data;
          }
        }
       }
       xhr.send();
</script>
<script>
  

</script>
<?php
include "includes/script.php";
include "includes/footer.php";
?>