
$(document).ready(function(){
    $('#modal-review').on('submit', function(event){
    
     event.preventDefault();
     $.ajax({

      url: basePath + 'reviews/add',
      method:"POST",
      data:$('#modal-review').serialize(),
      success:function(data){
       if(data.length == 0) {
        $('#error_message').html('No se ha podido guardar el comentario. inténtalo otra vez');
       }else {
         $('#exampleModal .close').click();
        $('#reviews').load(' #reviews');
    
       }
       
      }
     })
    });

   });
   