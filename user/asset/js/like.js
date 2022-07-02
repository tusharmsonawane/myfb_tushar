$(document).ready(function () {
    $(".like").click(function () { 
    
    var id=$(this).attr("title");
    $.post("includes/php/get.php",{data:id,how:'c'},function(data) {
    $("#"+''+id).load(" #"+''+id);
    });
    });
    });