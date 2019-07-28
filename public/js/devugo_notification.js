window.setTimeout(function() {
    $(".alert").fadeTo(2000, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);