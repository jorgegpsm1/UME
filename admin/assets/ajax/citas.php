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
        <h1 class='text-center'>Agendar Citas</h1>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-2">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#crear_cita">Crear cita</button>
      </div>
      <div class="col-md-10"></div>
      <div class="col-md-12">
        <div class="outer_div">
          <div class="table-responsive">
            <table class="table" id="myTable">
              <thead>
              <tr class="info">
                <th class="col-md-2">ID_CITA</th>
                <th class="col-md-2">NOMBRE</th>
                <th class="col-md-2">CORREO</th>
                <th class="col-md-2">TELEFONO</th>
                <th class="col-md-2">FECHA</th>
                <th class="col-md-2">ACCIONES</th>
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
  <div class="modal fade" id="crear_cita" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="usuarios_mensaje">Crear Cita</h4>
        </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="nombre_completo" class="control-label">Nombre Completo</label>
            <input id="nombre_completo" type="text" class="form-control" autocomplete="off" required > 
          </div>
          <div class="form-group">
            <label for="apellido_paterno" class="control-label">Apellido Paterno</label>
            <input id="apellido_paterno" type="text" class="form-control" autocomplete="off" required > 
          </div>
          <div class="form-group">
            <label for="apellido_materno" class="control-label">Apellido Materno</label>
            <input id="apellido_materno" type="text" class="form-control" autocomplete="off" required > 
          </div>
          <div class="form-group">
            <label for="correo" class="control-label">Correo Electronico</label>
            <input id="correo" type="email" class="form-control" autocomplete="off" required > 
          </div>
          <div class="form-group">
            <label for="telefono" class="control-label">Telefono</label>
            <input id="telefono" type="tel" class="form-control" autocomplete="off" required > 
          </div>
          <div class="form-group">
            <div class='input-group date' id='datetimepicker1'>
              <input type='text' id="fecha" class="form-control" />
              <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
              </span>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button id="crear_nueva_cita" type="button" class="btn btn-primary" data-dismiss="modal">Crear Cita</button>
      </div>
      </div>
    </div>
  </div>
<script src="<?php echo ($_SESSION['BASE_DIR_FRONTEND'].'/resources/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js'); ?>"></script>
<script>
  (function(){
      $('#datetimepicker1').datetimepicker();
      get_info();
      function get_info(){
        $("#myTable > tbody").html('');
        $.getJSON("./model/class/load_citas.php", function(){
      console.log("success");
      })
      .done(function(Response,statusText,jqXhr){
        var x;
        for(x=0; x<Response['COUNT']; x++){
          var newListItem = "<tr>";
          newListItem+= "<td>" + Response['INFO'][x]['id_cita'] + "</td>";
          newListItem+= "<td>" + Response['INFO'][x]['apellido_paterno'] + " " + Response['INFO'][x]['apellido_materno'] + " " + Response['INFO'][x]['nombre'] + "</td>";
          newListItem+= "<td>" + Response['INFO'][x]['correo'] + "</td>";
          newListItem+= "<td>" + Response['INFO'][x]['telefono'] + "</td>";
          newListItem+= "<td>" + Response['INFO'][x]['fecha'] + "</td>";
          newListItem+= "<td><span class='pull-center'>";
          newListItem+= "<a class='btn btn-default' href='Editar_Cita_?id="+Response['INFO'][x]['ID_CITA']+"'><span class='glyphicon glyphicon-pencil'></span></a>";
          newListItem+= "<a class='btn btn-default' href='Eliminar_Cita_?id="+Response['INFO'][x]['ID_CITA']+"'><span class='glyphicon glyphicon-trash'></span></a>";  
          newListItem+= "</span></td>";
          newListItem+= "</tr>";
          $("#myTable > tbody").append(newListItem);
        }
      
      })
      .fail(function() {
      })
      .always(function() {
    });
      }

      $('#crear_nueva_cita').click(function(e){
        var data = { 
          nombre:       $('#nombre_completo').val(),
          apellido_p:       $('#apellido_paterno').val(),
          apellido_m:       $('#apellido_materno').val(),
          correo:       $('#correo').val(),
          telefono:       $('#telefono').val(),
          fecha:       $('#fecha').val()
        };
        $.ajax({
          type:          "post",
          url:           "./model/class/create_cita.php",
          async:         false,
          cache:         false,
          data:          JSON.stringify(data),
          contentType:   "application/json; charset=utf-8",
          dataType :     "json",
          success:       function(response){
            if(response.Success){
              $("#crear_cita").modal('toggle');
              get_info();
            }
            else{
              $("#crear_cita").modal('toggle');
              alert("Error");
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