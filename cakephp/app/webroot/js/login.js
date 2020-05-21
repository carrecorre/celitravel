
$(document).ready(function(){
    
    $('#modal-login').on('submit', function(event){
     event.preventDefault();
     $.ajax({
        url: basePath + 'users/login',
      method:"POST",
      data:$('#modal-login').serialize(),
      success:function(data){
       if(data.length < 50)
       {
        $('#error_message').html('Usuario o contraseña incorrectos');
       }else {
           
        $('#exampleModalCenter .close').click();
        $('#menu-nav').load(' #menu-nav');
        $('#add-review').load(' #add-review');
        $('#modal-review').load(' #modal-review');
        location.reload(true);
       }
       
      }
     })
    });


    $('.ir-arriba').click(function(){
      $('body, html').animate({
        scrollTop: '0px'
      }, 300);
    });
   
    $(window).scroll(function(){
      if( $(this).scrollTop() > 0 ){
        $('.ir-arriba').slideDown(300);
      } else {
        $('.ir-arriba').slideUp(300);
      }
    });

    
    if($('#flashMessage').not(':empty')) {
      $("#modal-flash").modal("show");
  }

    $('#input-img').change(function (e){
      let reader = new FileReader();
      reader.readAsDataURL(e.target.files[0]);
      reader.onload = function(){
        $('#user-img').attr('src', reader.result);
      }
    });

   });
   