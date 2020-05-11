
$(document).ready(function(){
    
    $('#modal-login').on('submit', function(event){
     event.preventDefault();
     $.ajax({
        url: basePath + 'users/login',
      method:"POST",
      data:$('#modal-login').serialize(),
      success:function(data){
          console.log(data);
       if(data.length < 50)
       {
        $('#error_message').html('Usuario o contraseña incorrectos  ');
       }else {
           
         $('#exampleModalCenter .close').click();
        $('#menu-nav').load(' #menu-nav');
        $('#add-review').load(' #add-review');
       }
       
      }
     })
    });
   });
   