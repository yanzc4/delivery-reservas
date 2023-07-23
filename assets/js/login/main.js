jQuery(document).on('submit','#formlg', function(event){
    event.preventDefault();
    jQuery.ajax({
       url:'main_app/login.php',
       type:'POST',
       dataType:'json',
       data: $(this).serielize(),
       beforeSend: function(){
        $('.botonlg').val('Validando....');
       }
    })
.done(function(respuesta){
    console.log(respuesta);
    if(!respuesta.error){
        if(respuesta.tipo == 'admin'){
        location.href= 'main_app/admin/';
        } else if(respuesta.tipo == 'usuario'){
            location.href = 'main_app/usuario/';
        }
    }else{
        $('.error').slideDown('slow');
        setTimeout(function(){
            $('.error').slideUp('slow');
        },3000);
        $('.botonlg').val('Iniciar Sesion');
    }
})
.fail(function(resp){
    console.log(resp.responseText);
})
.always(function(){
    console.log("complete");
});
});
