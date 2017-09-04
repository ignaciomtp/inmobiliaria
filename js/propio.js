
function comprobarEmail(email){
    $.ajax({
        url: '../app/Model/ajx/comprobarEmail.php?email=' + email,
        
        success: function(resp){
            alert(resp);
        }
    });
    
    
}
