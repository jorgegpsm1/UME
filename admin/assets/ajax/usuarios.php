<style>
  h3{
    text-align: center;
    margin-bottom: 40px;
  }
  th,td{
    text-align: center;
  }
  .id{
    width: 10%;
  }
  .user{
    width: 25%;
  }
  .passwd{
    width: 25%;
  }
  .action{
    width: 40%;
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
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#create_user">Crear Usuario</button>
      </div>
      <div class="col-md-10"></div>
      <div class="col-md-12">
        <div class="outer_div">
          <div class="table-responsive">
            <table class="table" id="myTable">
              <thead>
              <tr class="info">
                <th class="col-md-3">ID</th>
                <th class="col-md-3">USUARIO</th>
                <th class="col-md-3">ESTADO</th>
                <th class="col-md-3">ACCIONES</th>
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
  <div class="modal fade" id="create_user" tabindex="-1" role="dialog">
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
            <option value="1">Administracion</option>
            <option value="2">Secretaria</option>
            <option value="3">Medico</option>
            <option value="4">Medico Diagnostico</option>
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
      $.getJSON("./model/class/load_user.php", function(){
      console.log("success");
      })
      .done(function(Response,statusText,jqXhr){
        var x,y;
        for(x=0; x<Response['COUNT']; x++){
          y=0;
          var newListItem = "<tr>";
          $.each(Response['INFO'][x], function(Key,Value ){
            if(y==2){
              newListItem+= "<td>" + Value + "</td>";
              newListItem+= "<td><span class='pull-center'>";
              newListItem+= "<a class='btn btn-default' href='Editar_Usuario_?id="+Response['INFO'][x]['ID_USER']+"'><span class='glyphicon glyphicon-pencil'></span></a>";
              newListItem+= "<a class='btn btn-default' href='Eliminar_Usuario_?id="+Response['INFO'][x]['ID_USER']+"'><span class='glyphicon glyphicon-trash'></span></a>";  
              newListItem+= "</span></td>";
            }
            else{
              newListItem+= "<td>" + Value + "</td>"; 
            }
            y++;
          });
            newListItem+= "</tr>";
            $("#myTable > tbody").append(newListItem);
        }
      
      })  //var newListItem = "<td><span class='pull-center'>" +  + "</span></td>";
      .fail(function() {
      })
      .always(function() {
    });
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
                $('#new_user_name').val(''),
                $('#new_user_password').val(''),
                $('#Departamento').val(1),
                $("#create_user").modal('toggle');
              }
              else{
                $('#new_user_name').val(''),
                $('#new_user_password').val(''),
                $('#Departamento').val(''),
                $("#create_user").modal('toggle');
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