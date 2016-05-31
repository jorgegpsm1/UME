<?php session_start(); ?>
<style>
  h3{
    text-align: center;
    margin-bottom: 40px;
  }
  th,td{
    text-align: center;
  }
  #feedback{ 
    font-size: 1.4em; 
  }
  #selectable .ui-selecting{ 
    background: #FECA40; 
  }
  #selectable .ui-selected{ 
    background: #F39814; 
    color: white; 
  }
  #selectable{ 
    list-style-type: none; 
    margin: 0; 
    padding: 0; 
    width: 60%; 
  }
  #selectable li{ 
    margin: 3px; 
    padding: 0.4em;
    font-size: 1.4em;
    height: 18px; 
  }
</style>

  <div class="container">
    <div class="row">   
      <div class="col-md-1"></div>
      <div class="col-md-10">
        <h1 class='text-center'>Usuarios</h1>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-2">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#crear_usuario">Crear Usuario</button>
      </div>
      <div class="col-md-10"></div>
      <div class="col-md-12">
        <div class="outer_div">
          <div class="table-responsive">
            <table class="table" id="myTable">
              <thead>
              <tr class="info">
                <th class="col-md-4">ID</th>
                <th class="col-md-4">USUARIO</th>
                <th class="col-md-4">ACCIONES</th>
              </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="crear_usuario" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="usuarios_mensaje">Crear Usuario</h4>
        </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="new_user_name" class="control-label">Usuario</label>
            <input id="new_user_name" type="text" class="form-control" autocomplete="off" required > 
          </div>
          <div class="form-group">
            <label for="new_user_password" class="control-label">Contraseña</label>
            <input id="new_user_password" type="password" class="form-control" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="Departamento" class="control-label">Departamento</label>
            <br />
          <select id="Departamento" >
            <option value="1">Sistemas</option>
            <option value="2">Medicos</option>
            <option value="3">Secretarias</option>
          </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button id="create_new_user" type="button" class="btn btn-primary" data-dismiss="modal">Crear Usuario</button>
      </div>
      </div>
    </div>
  </div>

<script>
  (function(){
    get_info();
    function clear_modal(){
      $('#new_user_name').val(''),
      $('#new_user_password').val(''),
      $('#Departamento').val(1)
    }
    function get_info(){
      $("#myTable > tbody").html('');
      $.getJSON("./model/class/load_user.php", function(){
        console.log("success");
      })
      .done(function(Response,statusText,jqXhr){
        var x;
        for(x=0; x<Response['COUNT']; x++){
          var newListItem = "<tr>";
          newListItem+= "<td>" + Response['INFO'][x]['id_user'] + "</td>";
          newListItem+= "<td>" + Response['INFO'][x]['user_login_name'] + "</td>";
          newListItem+= "<td><span class='pull-center'>";
          newListItem+= "<a class='btn btn-default' href='eliminar_usuario.php?uno="+Response['INFO'][x]['id_user']+"'><span class='glyphicon glyphicon-trash'></span></a>";  
          newListItem+= "</span></td>";
          newListItem+= "</tr>";
          $("#myTable > tbody").append(newListItem);
        }
      },function(){
          $("a[href*='eliminar_usuario.php']").click(function(event){
            event.preventDefault();
            var val = $(this).attr('href');
            var strin = val.split('=',2);
            del_info(strin[1]);
            return false;
          });
      })
      .fail(function() {
      })
      .always(function() {
      });
    }

    $('#create_new_user').click(function(e){
          var data = { 
            NameUser:       $('#new_user_name').val(),
            PasswordUser:   Sha256.hash($('#new_user_password').val()),
            DepartmentUser: $('#Departamento').val()
          };
          $.ajax({
            type:          "post",
            url:           "./model/class/create_user.php",
            async:         true,
            cache:         false,
            data:          JSON.stringify(data),
            contentType:   "application/json; charset=utf-8",
            dataType :     "json",
            beforeSend:    function(response){
            },
            success:       function(response){
              if(response.Success){
                get_info();
                $("#crear_usuario").modal('toggle');
                clear_modal();
              }
              else{
                get_info();
                $("#crear_usuario").modal('toggle');
                clear_modal();
              }
            },
            error:         function(response, error){
              alert("Error Interno: " + error);
            }  
          });
        return false;  
      });
  })();
</script>