$(document).ready(function(){
    $('#submit_contacto').click(function(e){
      e.preventDefault();
      var Modal = $('#Estado_Modal');
      var data  = {
        Nombre:         $('#nombre_contacto').val(),
        Email:          $('#email_contacto').val(),
        Asunto:         $('#asunto_contacto').val(),
        Mensaje:        $('#mensaje_contacto').val()
      };
      $.ajax({
        type:          "post",
        url:           "../controllers/email_contacto/sendemail.php",
        async:         true,
        cache:         false,
        data:          JSON.stringify(data),
        contentType:   "application/json; charset=utf-8",
        dataType :     "json",
        beforeSend:    function(response){
        },
        success:       function(response){
          if(response.Success){
            Modal.html('Correo enviado con exito');
            $('#My_Modal').modal('show');
            setTimeout(function(){
              $('#My_Modal').modal('hide');
            }, 2000);
          }
          else{
            Modal.html('Error interno');
            $('#My_Modal').modal('show');
            setTimeout(function(){
                $('#My_Modal').modal('hide');
            }, 2000);   
          }
        },
        error:         function(response, error){
          alert("Error Interno: " + error);
        }  
      });
    return false;  
  });
  $('#form-submit').click(function(e){
      e.preventDefault();
      var Modal = $('#Estado_Modal');
      var data  = {
        Nombre:           $('#nombre').val(),
        Paterno:          $('#paterno').val(),
        Materno:          $('#materno').val(),
        Correo:           $('#coreo').val(),
        Telefono:         $('#telefono').val(),
        Fecha:            $('#fecha').val()
      };
      $.ajax({
        type:          "post",
        url:           "../controllers/email_contacto/sendemails.php",
        async:         true,
        cache:         false,
        data:          JSON.stringify(data),
        contentType:   "application/json; charset=utf-8",
        dataType :     "json",
        beforeSend:    function(response){
        },
        success:       function(response){
          if(response.Success){
            Modal.html('Cita agendada con exito');
            $('#My_Modal').modal('show');
            setTimeout(function(){
              $('#My_Modal').modal('hide');
            }, 2000);
          }
          else{
            Modal.html('Error interno');
            $('#My_Modal').modal('show');
            setTimeout(function(){
                $('#My_Modal').modal('hide');
            }, 2000);   
          }
        },
        error:         function(response, error){
          alert("Error Interno: " + error);
        }  
      });
    return false;  
  });
});

