$("#search").on("keyup",function(){ 
  var s_id = $(this).val();
  $.ajax({ 
      url: "includes/php/search_p.php",
      type: "POST",
      data: {search:s_id},
      success: function (data) {
           $("#user_auth").html(data);
             if($("#search").val())
             {
              $(".searchbar").addClass("active");
             }else{
              $(".user_auth").addClass("active");
               window.location.href='search.php';
             }
      }
  });
});