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
        <h1 class='text-center'>Crear Expediente</h1>
      </div>
      <div class="col-md-1"></div>
      <div class="col-md-2">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#crear_expediente">Crear Expediente</button>
      </div>
      <div class="col-md-10"></div>
      <div class="col-md-12">
        <div class="outer_div">
          <div class="table-responsive">
            <table class="table" id="myTable">
              <thead>
                <tr class="info">
                  <th class="col-md-2">ID_EXPEDIENTE</th>
                  <th class="col-md-2">NOMBRE</th>
                  <th class="col-md-2">CORREO</th>
                  <th class="col-md-2">TELEFONO</th>
                  <th class="col-md-2">EDAD</th>
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
  <div class="modal fade" id="crear_expediente" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title text-center">Crear Expediente</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="nombre_completo" class="control-label">Nombre</label>
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
              <label for="edad" class="control-label">Edad</label>
              <input id="edad" type="number" class="form-control" autocomplete="off" required > 
            </div>
            <div class="form-group">
              <label for="fecha" class="control-label">Fecha</label>
              <div class='input-group date' id='datetimepicker1'>
                <input type='text' id="fecha" class="form-control" />
                <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label for="padecimiento" class="control-label">Padecimiento</label>
              <input id="padecimiento" type="text" class="form-control" autocomplete="off" required > 
            </div>
            <div class="form-group">
              <label for="domicilo" class="control-label">Domicilio</label>
              <input id="domicilo" type="text" class="form-control" autocomplete="off" required > 
            </div>
            <div class="form-group">
              <label for="telefono" class="control-label">Telefono</label>
              <input id="telefono" type="tel" class="form-control" autocomplete="off" required > 
            </div>
            <div class="form-group">
              <label for="recomendo" class="control-label">Recomendo</label>
              <input id="recomendo" type="text" class="form-control" autocomplete="off" required > 
            </div>
            <div class="form-group">
              <label for="analisis" class="control-label">Analisis Medico</label>
              <input id="analisis" type="text" class="form-control" autocomplete="off" required > 
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button id="crear_nuevo_expediente" type="button" class="btn btn-primary" data-dismiss="modal">Crear expediente</button>
        </div>
      </div>
    </div>
  </div>
<script src="<?php echo ($_SESSION['BASE_DIR_FRONTEND'].'/resources/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js'); ?>"></script>
<script>
  (function(){
      $('#datetimepicker1').datetimepicker();
      get_info();
      function clear_modal(){
        $('#nombre_completo').val(''),
        $('#apellido_paterno').val(''),
        $('#apellido_materno').val(''),
        $('#correo').val(''),
        $('#edad').val(''),
        $('#fecha').val(''),
        $('#padecimiento').val(''),
        $('#domicilo').val(''),
        $('#telefono').val(''),
        $('#recomendo').val(''),
        $('#analisis').val('')
      }
      function get_info(){
        $("#myTable > tbody").html('');
        $.getJSON("./model/class/load_expedientes.php", function(){
          console.log("success");
          })
          .done(function(Response,statusText,jqXhr){
            var x;
            for(x=0; x<Response['COUNT']; x++){
              var uno = Response['INFO'][x]['id_expediente'];
              var dos = Response['INFO'][x]['nombre'];
              var tres = Response['INFO'][x]['apellido_paterno'];
              var cuatro = Response['INFO'][x]['apellido_materno'];
              var cinco = Response['INFO'][x]['correo'];
              var seis = Response['INFO'][x]['edad'];
              var siete = Response['INFO'][x]['fecha'];
              var ocho = Response['INFO'][x]['pacecimiento'];
              var nueve = Response['INFO'][x]['domicilo'];
              var diez = Response['INFO'][x]['telefono'];
              var once = Response['INFO'][x]['recomendo'];
              var doce = Response['INFO'][x]['analisis'];
              var cien = "?uno="+uno+"&dos="+dos+"&tres="+tres+"&cuatro="+cuatro+"&cinco="+cinco+"&seis="+seis+"&siete="+siete+"&ocho="+ocho+"&nueve="+nueve+"&diez="+diez+"&once="+once+"&doce="+doce;
              var newListItem = "<tr>";
              newListItem+= "<td>" + uno + "</td>";
              newListItem+= "<td>" + tres  + " " + cuatro + " " + dos + "</td>";
              newListItem+= "<td>" + cinco + "</td>";
              newListItem+= "<td>" + diez + "</td>";
              newListItem+= "<td>" + seis + "</td>";
              newListItem+= "<td><span class='pull-center'>";
              newListItem+= "<a class='btn btn-default' href='descargar_expediente.php"+cien+"'><span class='glyphicon glyphicon-cloud-download'></span></a>";
              newListItem+= "<a class='btn btn-default' href='eliminar_expediente.php?uno="+uno+"'><span class='glyphicon glyphicon-trash'></span></a>";  
              newListItem+= "</span></td>";
              newListItem+= "</tr>";
              $("#myTable > tbody").append(newListItem);
            }
          },function(){
            $("a[href*='eliminar_expediente.php']").click(function(event){
              event.preventDefault();
              var val = $(this).attr('href');
              var strin = val.split('=',2);
              alert(strin[1]);
              del_info(strin[1]);
              return false;
            });
          })
          .fail(function(){
          })
          .always(function(){
          });
      }
      function get_info_modal(){
        clear_modal();
        var data = { 
          url:           $('#nombre_completo').val(),
        };
        $.ajax({
          type:          "post",
          url:           "./model/class/create_expediente.php",
          async:         true,
          cache:         false,
          data:          JSON.stringify(data),
          contentType:   "application/json; charset=utf-8",
          dataType :     "json",
          success:       function(response){
            if(response.Success){
              $("#crear_expediente").modal('toggle');
              get_info();
            }
            else{
              $("#crear_expediente").modal('toggle');
              alert("Error");
            }
          },
          error:         function(response, error){
            alert("Error Interno: " + error);
          }  
        });
      return false;  
      }
      function del_info(datas){
        var data = { 
          urls:           datas
        };
        $.ajax({
          type:          "post",
          url:           "./model/class/eliminar_expediente.php",
          async:         true,
          cache:         false,
          data:          JSON.stringify(data),
          contentType:   "application/json; charset=utf-8",
          dataType :     "json",
          success:       function(response){
            if(response.Success){
              get_info();
            }
            else{
              alert("Error");
            }
          },
          error:         function(response, error){
            alert("Error Interno: " + error);
          }  
        });
      return false;  
      }
      $('#crear_nuevo_expediente').click(function(e){
        var data = { 
          nombre:           $('#nombre_completo').val(),
          apellido_p:       $('#apellido_paterno').val(),
          apellido_m:       $('#apellido_materno').val(),
          correo:           $('#correo').val(),
          edad:             $('#edad').val(),
          fecha:            $('#fecha').val(),
          padecimiento:     $('#padecimiento').val(),
          domicilo:         $('#domicilo').val(),
          telefono:         $('#telefono').val(),
          recomendo:        $('#recomendo').val(),
          analisis:         $('#analisis').val()
        };
        $.ajax({
          type:          "post",
          url:           "./model/class/create_expediente.php",
          async:         true,
          cache:         false,
          data:          JSON.stringify(data),
          contentType:   "application/json; charset=utf-8",
          dataType :     "json",
          success:       function(response){
            if(response.Success){
              $("#crear_expediente").modal('toggle');
              clear_modal();
              get_info();
            }
            else{
              $("#crear_expediente").modal('toggle');
              clear_modal();
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