<!DOCTYPE html>
<html lang="es_MX">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../../favicon.ico" style="image/x-icon"> 
    <meta name="description" content="">
    <meta name="Pablo Pérez" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 user-scalable=no">
    <title>Unidad Médica Santé</title>
    <link rel="stylesheet" href="../resource/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resource/animate/css/animate.css">
    <link rel="stylesheet" href="../assets/css/home.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../resource/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../resource/icon-moon/css/icon-moon.css">
    <link rel="stylesheet" href="../resource/bootstrap-datetimepicker-master/css/bootstrap-datetimepicker.css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <nav class="navbar navbar-custom navbar-fixed-top" >
      <div class="container">
        <div class="row ">
          <div class="col-md-12 ">
            <div class="main-nav">
              <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                <i class="fa fa-bars"></i>
              </button>
              <a class="navbar-brand page-scroll" href="#page-top">
              <img src="../assets/img/logo/UMS_logo.png" alt="UMS">
              </a>
              </div>
              <div class="collapse navbar-collapse  navbar-main-collapse">
                <ul class="nav navbar-nav">
                  <li class="active"><a href="#section-slider"  >Inicio</a></li>
                  <li><a class="page-scroll" href="#section-feature" >Acerca de</a></li>
                  <li><a class="page-scroll" href="#section-service"  >Especialidades</a></li>                 
                 <?php /* <li><a class="page-scroll" href="#section-catalogue" >Catalogo</a></li> */?>                
                  <li><a class="page-scroll" href="#section-contact-info"  >Contacto</a></li>
                </ul>
                <div class="contact-no navbar-right visible-md visible-lg">
                  <i class="fa fa-phone"></i> (33)38604777
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <div id="section-slider">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
         	<h1>Unidad Medica Santé <br> <p>Av. Constitución de 1917 #3204 <br> Colonia Fracc. Revolución Tlaquepaque, Jalisco, México</p></h1>
          </div>
        </div>
      </div>
    </div>
    <section id="section-about">
      <div class="container">
        <div class="about-wrapper">
          <div class="row">
            <div class="col-md-4 col-sm-4 wow slideInLeft">
              <div class="about-inner">
                <h4> <i class="icon-users"></i> Con gusto le atenderemos</h4>
                <div align="center">
                <p>Puede solicitar una cita llenando el siguiente formulario o llamando a los telefonos de la unidad. </p> 
                <ul>
                <li> <i class="fa fa-phone"></i> (33) 38 60 47 77 </li>
                <li> <i class="fa fa-phone"></i> (33) 33 35 60 69 </li>
                </ul>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 wow slideInRight">
              <div class="about-inner">
                <h4> <i class="icon-clock"></i>Horario de Atención</h4>
                <p align="center">Lunes a Viernes <br> 9:00-14:00 &amp; 16:00-20:00</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-4 wow slideInDown">
              <div class="top-contact">
                <form role="form" id="contactForm" data-toggle="validator" class="shake" >
                  <div class="header_cita">
                    <h4>Agende su cita</h4>
                    <p>Datos de contacto</p>
                  </div>
                  <div class="row">
                    <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                        <input type="text" id="nombre" class="form-control" placeholder="Nombre(s)" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                        <input type="text" id="paterno" class="form-control" placeholder="Apellido Paterno" autocomplete="off">
                      </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                        <input type="text" id="materno" class="form-control" placeholder="Apellido Materno" autocomplete="off" >
                      </div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                        <input type="email" id="email" class="form-control" placeholder="Correo" autocomplete="off" ></div>
                      </div>
                      </div>
                      <div class="col-md-12 col-sm-12">
                      <div class="form-group">
                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Telefono" autocomplete="off" </div>
                      </div>
                      <div class='col-md-12 col-sm-12'>
                        <div class="form-group">
                          <div class='input-group date' id='datetimepicker1'>
                            <input type='text' class="form-control" />
                            <span class="input-group-addon">
                              <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                          </div>
                        </div>
                      </div>
                  </div>
                  <button class="btn btn-primary white" id="form-submit" type="submit" value="Submit">Agendar</button>
                  <div id="msgSubmit" class="h3 text-center hidden"></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="section-feature">
      <div class="container">
        <div class="row">
          <div class="col-md-12 wow slideInDown">
          <div class="section-heading text-center">
          <h2>Acerca de nosotros</h2>
          <p>En Unidad Médica Santé contamos con un grupo de médicos especialistas dedicados a cumplir con las necesidades de cada paciente.</p>
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-7 ">
            <div class="feature-inner">
              <div class="row">
                <div class="col-md-6 col-sm-6 wow slideInDown" data-wow-delay=".2s">
                  <div class="feature-box">
                    <i class="icon-profile"></i> 
                    <h4>Medicos Especialistas</h4>
                    <p>Todos nuestros médicos se encuentran calificados para que usted reciba una atención de calidad.</p>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6  wow slideInDown" data-wow-delay=".4s">
                  <div class="feature-box">
                    <i class="icon-aid-kit"></i> 
                    <h4>Equipamiento</h4>
                    <p>Cada especialidad cuenta con el equipo necesario para su atención.<br><br></p>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6  wow slideInDown" data-wow-delay=".6s">
                  <div class="feature-box">
                    <i class="icon-location"></i> 
                    <h4>Ubicacion</h4>
                    <p>Nos encontramos en el Fraccionamiento Residencial Revolución.</p>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6  wow slideInDown" data-wow-delay=".8s">
                  <div class="feature-box">
                    <i class="icon-happy"></i> 
                    <h4>Objetivo</h4>
                    <p>Brindarle una atención adecuada a sus necesidades.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-5 feature-slide col-sm-12 visible-md visible-lg wow slideInRight">
            <div class="carousel slide" id="feature-slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="item active">
                  <img src="../assets/img/images/about/medic1.jpg" alt="feature-img1">
                </div>
                <div class="item">
                  <img src="../assets/img/images/about/medic2.jpg" alt="feature-img2">
                </div>
     
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="section-service">
      <div class="container">
        <div class="row">
          <div class="col-md-12 wow fadeIn">
            <div class="section-heading text-center">
              <h2>Especialidades Medicas</h2>
              <p>Conozca las especialidades con las que contamos en la unidad.<br><br></p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 col-sm-4 wow fadeInLeft">
            <ul class="nav nav-tabs nav-stacked" role="tablist" id="service-tab-wrapper">
              <li role="presentation" class="active">
                <a href="#tab_a" class="animated fadeIn"  role="tab" data-toggle="tab">Medicina Fisica y Rehabilitacion</a>
              </li>
              <li role="presentation">
                <a href="#tab_b" class="animated fadeIn" role="tab" data-toggle="tab">Ortopedia</a>
              </li>
              <li role="presentation">
                <a href="#tab_c" class="animated fadeIn" role="tab" data-toggle="tab">Traumatologia</a>
              </li>
              <li role="presentation">
                <a href="#tab_d" class="animated fadeIn"  role="tab" data-toggle="tab">Ginecologia y obstetricia</a>
              </li>
              <li role="presentation">
                <a href="#tab_e" class="animated fadeIn"  role="tab" data-toggle="tab">Nefrologia</a>
              </li>
              <li role="presentation">
                <a href="#tab_f" class="animated fadeIn"  role="tab" data-toggle="tab"> Pediatria</a>
              </li>
               <li role="presentation">
                <a href="#tab_g" class="animated fadeIn"  role="tab" data-toggle="tab"> Otorrinolaringologia</a>
              </li>
               <li role="presentation">
                <a href="#tab_h" class="animated fadeIn"  role="tab" data-toggle="tab"> Cirugia General</a>
              </li>
               <li role="presentation">
                <a href="#tab_i" class="animated fadeIn"  role="tab" data-toggle="tab"> Gastroenterologia</a>
              </li>
               <li role="presentation">
                <a href="#tab_j" class="animated fadeIn"  role="tab" data-toggle="tab"> Nutricion</a>
              </li>
               <li role="presentation">
                <a href="#tab_k" class="animated fadeIn"  role="tab" data-toggle="tab"> Psicologia</a>
              </li>
               <li role="presentation">
                <a href="#tab_l" class="animated fadeIn"  role="tab" data-toggle="tab"> Medicina Familiar</a>
              </li>
               <li role="presentation">
                <a href="#tab_m" class="animated fadeIn"  role="tab" data-toggle="tab"> Neurologia</a>
              </li>
               <li role="presentation">
                <a href="#tab_n" class="animated fadeIn"  role="tab" data-toggle="tab"> Medicina Interna</a>
              </li>
               <li role="presentation">
                <a href="#tab_o" class="animated fadeIn"  role="tab" data-toggle="tab"> Cirugia Plastica</a>
              </li>
               <li role="presentation">
                <a href="#tab_p" class="animated fadeIn"  role="tab" data-toggle="tab"> Hematologia</a>
              </li>
               <li role="presentation">
                <a href="#tab_q" class="animated fadeIn"  role="tab" data-toggle="tab"> Oncocirugia</a>
              </li>
               <li role="presentation">
                <a href="#tab_r" class="animated fadeIn"  role="tab" data-toggle="tab"> Urologia</a>
              </li>
               <li role="presentation">
                <a href="#tab_s" class="animated fadeIn"  role="tab" data-toggle="tab"> Homeopatia</a>
              </li>
            </ul>
          </div>
          <div class="col-md-9 col-sm-8 wow fadeInRight">
            <div class="tab-content" id="service-tab-content">
            <div role="tabpanel" class="tab-pane active animated fadeIn" id="tab_a">
            <div class="row">
            <div class="col-md-5 col-sm-12">
            <div class="service-img">
            <img src="../assets/img/images/about/terapia.jpg" alt="Rehabilitacion">
            </div>
            </div>
            <div class="col-md-7 col-sm-12">
            <div class="service-desc">
            <h4>Medicina Fisica y Rehabilitacion</h4>
            <p>Secuelas de Fracturas, Esguinces, Páralisis Facial, Dolores de Espalda, Dolores de Cuello, Tendinitis, etc. <br> <br> Certificación en Técnica Gavilán <br> Certificación en Tape Neuromuscular</p>
            <ul class="service-tab-info">
            <li>Médico Especialista</li>
            <li>Láser</li>
            <li>Electroestimulación</li>
            <li>Cavitación</li>
            <li>Parafina</li>
            <li>Ultrasonido</li>
            </ul>
            </div>
            </div>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane animated fadeIn" id="tab_b">
            <div class="row">
            <div class="col-md-5 col-sm-12">
            <div class="service-img">
            <img src="../assets/img/images/about/ortopedia.jpg" alt="Ortopedia">
            </div>
            </div>
            <div class="col-md-7 col-sm-12">
            <div class="service-desc">
            <h4>Ortopedia</h4>
            <p>Pie plano, Pie Cabo, Defectos de Postura, etc.</p>
            <ul class="service-tab-info">
            <li>Plantillas</li>
            <li>Zapatos Ortopédicos</li>
            <li>Zapatos para Diabético</li>
            <li>Rodilleras, Fajas, etc.</li>
            </ul>
            </div>
            </div>
            </div>
            </div>
            <div role="tabpanel" class="tab-pane animated fadeIn" id="tab_c">
              <div class="row">
                <div class="col-md-5 col-sm-12">
                  <div class="service-img">
                    <img src="../assets/img/images/about/trauma.jpg" alt="Traumatologia">
                  </div>
                </div>
                <div class="col-md-7 col-sm-12">
                  <div class="service-desc">
                    <h4>Traumatologia</h4>
                    <p>Accidentes y Lesiones Músculo Esqueléticas</p>
                      <ul class="service-tab-info">
                      <li>Fracturas</li>
                      <li>Luxaciones</li>
                      <li>Esguinces</li>
                      <li>Cirugía Artroscópica</li>
                      <li>Reemplazo Articular</li>
                      <li>Trauma Deportivo</li>
                      </ul>
                    </div>
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane animated fadeIn" id="tab_d">
              <div class="row">
                <div class="col-md-5 col-sm-12">
                  <div class="service-img">
                    <img src="../assets/img/images/about/ginecologia.jpg" alt="Ginecologia">
                  </div>
                </div>
                <div class="col-md-7 col-sm-12">
                  <div class="service-desc">
                    <h4>Ginecologia y Obtetricia</h4>
                    <p>Control Prenatal, Planificación Familiar, Papanicolau, Colposcopia, etc.</p>
                    <ul class="service-tab-info">
                      <li>Neoplasias</li>
                      <li>Colposcopia</li>
                      <li>Exploración Mamaria</li>
                      <li>Ecosonograma</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane animated fadeIn" id="tab_e">
              <div class="row">
                <div class="col-md-5 col-sm-12">
                  <div class="service-img">
                  <img src="../assets/img/images/about/nefro.jpg" alt="Nefrologia">
                  </div>
                </div>
              <div class="col-md-7 col-sm-12">
                <div class="service-desc">
                  <h4>Nefrologia</h4>
                  <p>Enfermedades Renales, Diálisis, Hemodiálisis, Insuficiencia Renal, Hipertension Arterial, etc.</p>
                  <ul class="service-tab-info">
                      <li>Problemas Inmunológicos</li>
                      <li>Tratamiento Especializado</li>
                      <li>Nefropatía Diabética</li>
                      <li>Infecciones</li>
                  </ul>
                </div>
              </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane animated fadeIn" id="tab_f">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <div class="service-img">
                      <img src="../assets/img/images/about/pediatra.jpg" alt="Pediatria">
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <div class="service-desc">
                      <h4>Pediatria</h4>
                      <p>Control de Niño Sano, Crecimiento Normal, Vacunas, Control de Peso, etc..</p>
                        <ul class="service-tab-info">
                          <li>Diarrea</li>
                          <li>Problemas Urinarios</li>
                          <li>Fiebre</li>
                          <li>Problemas Respiratorios</li>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
            <div role="tabpanel" class="tab-pane animated fadeIn" id="tab_g">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <div class="service-img">
                      <img src="../assets/img/images/about/otorrino.jpg" alt="Otorrino">
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <div class="service-desc">
                      <h4>Otorrinolaringologia</h4>
                      <p>Tratamiento Médico y Quirúrgico de Oido, Nariz y Garganta.</p>
                        <ul class="service-tab-info">
                          <li>Adenoides</li>
                          <li>Rinoplastía</li>
                          <li>Sinusitis</li>
                          <li>Alergias</li>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
			<div role="tabpanel" class="tab-pane animated fadeIn" id="tab_h">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <div class="service-img">
                      <img src="../assets/img/images/about/cirgen.jpg" alt="Cirugia general">
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <div class="service-desc">
                      <h4>Cirugia General</h4>
                      <p>Cirugía de Apendice, Cirugía de Vesícula, Cirugía de Tiroides, Cirugía de Intestino, Hernias, etc.</p>
                        <ul class="service-tab-info">
                          <li>Laparoscopía</li>
                          <li>Cuello</li>
                          <li>Tiroides</li>
                          <li>Tumores</li>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
			<div role="tabpanel" class="tab-pane animated fadeIn" id="tab_i">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <div class="service-img">
                      <img src="../assets/img/images/about/gastro.jpg" alt="Gastroenterologia">
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <div class="service-desc">
                      <h4>Gastroenterologia</h4>
                      <p>Colitis, Gastritis, Problemas de Esófago, Problemas Gastrointestinales, etc.</p>
                        <ul class="service-tab-info">
                          <li>Colon Irritable</li>
                          <li>Hepatopatias</li>
                          <li>Endoscopía</li>
                          <li>Colondoscopía</li>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
			<div role="tabpanel" class="tab-pane animated fadeIn" id="tab_j">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <div class="service-img">
                      <img src="../assets/img/images/about/nutri.jpg" alt="Nutricion">
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <div class="service-desc">
                      <h4>Nutricion</h4>
                      <p>Baja de Peso Comiendo Sano.</p>
                        <ul class="service-tab-info">
                          <li>Obesidad</li>
                          <li>Control de Diabético</li>
                          <li>Aumento de Peso</li>
                          <li>Dietas Especiales</li>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
			<div role="tabpanel" class="tab-pane animated fadeIn" id="tab_k">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <div class="service-img">
                      <img src="../assets/img/images/about/psico.jpg" alt="Psicologia">
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <div class="service-desc">
                      <h4>Psicologia</h4>
                      <p>Problemas Emocionales, Psicología Infantil, Problemas Familiares, Problemas de Adicciones, etc.</p>
                        <ul class="service-tab-info">
                          <li>Depresión</li>
                          <li>Angustia</li>
                          <li>Terapia de Lenguaje</li>
                          <li>Niños y Adultos</li>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
			<div role="tabpanel" class="tab-pane animated fadeIn" id="tab_l">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <div class="service-img">
                      <img src="../assets/img/images/about/medfam.jpg" alt="Medicina familiar">
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <div class="service-desc">
                      <h4>Medicina Familiar</h4>
                      <p>Medicina Preventiva, Control de Diabetes, Hipertensión, etc.</p>
                        <ul class="service-tab-info">
                          <li>Chequeos Médicos </li>
                          <li>Diagnóstico</li>
                          <li>Prevención</li>
                          <li>Enfermedades Crónicas</li>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
			<div role="tabpanel" class="tab-pane animated fadeIn" id="tab_m">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <div class="service-img">
                      <img src="../assets/img/images/about/neuro.jpg" alt="Neurologia">
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <div class="service-desc">
                      <h4>Neurologia</h4>
                      <p>Atención de Problemas Neurológicos.</p>
                        <ul class="service-tab-info">
                          <li>Convulsiones</li>
                          <li>Migraña</li>
                          <li>Distonías</li>
                          <li>Malformaciones</li>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
			<div role="tabpanel" class="tab-pane animated fadeIn" id="tab_n">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <div class="service-img">
                      <img src="../assets/img/images/about/medint.jpg" alt="Medicina interna">
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <div class="service-desc">
                      <h4>Medicina Interna</h4>
                      <p>Tratamiento de Enfermedades Crónico Degenerativas.</p>
                        <ul class="service-tab-info">
                          <li>Diabetes</li>
                          <li>Endocrinopatías</li>
                          <li>Artritis</li>
                          <li>Hipertensión</li>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>		
			<div role="tabpanel" class="tab-pane animated fadeIn" id="tab_o">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <div class="service-img">
                      <img src="../assets/img/images/about/cirplas.jpg" alt="Cirugia plastica">
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <div class="service-desc">
                      <h4>Cirugia Plastica</h4>
                      <p>Rinoplastia, Lipoescultura, Injertos Cutáneos, Liposucciones, Lipectomías, Aumento y Disminución de Gluteos y Busto, etc.</p>
                        <ul class="service-tab-info">
                          <li>Cirugía Estética</li>
                          <li>Cirugía Funcional</li>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
			<div role="tabpanel" class="tab-pane animated fadeIn" id="tab_p">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <div class="service-img">
                      <img src="../assets/img/images/about/hema.jpg" alt="Hematologia">
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <div class="service-desc">
                      <h4>Hematologia</h4>
                      <p>Enfermedades de la Sangre, Anemia, Leucemia, Púrpura, etc.</p>
                        <ul class="service-tab-info">
                          <li>Anemia</li>
                          <li>Leucemia</li>
                          <li>Púrpura</li>
                          <li>Discracias Sanguíneas</li>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
			<div role="tabpanel" class="tab-pane animated fadeIn" id="tab_q">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <div class="service-img">
                      <img src="../assets/img/images/about/oncocir.jpg" alt="Oncocirugia">
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <div class="service-desc">
                      <h4>Oncocirugia</h4>
                      <p>Estudio y Extirpación de Tumores.</p>
                        <ul class="service-tab-info">
                          <li>Tumores Malignos</li>
                          <li>Biopsias</li>
                          <li>Quimioterapia</li>
                          <li>Radioterapia</li>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
			<div role="tabpanel" class="tab-pane animated fadeIn" id="tab_r">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <div class="service-img">
                      <img src="../assets/img/images/about/urologia.jpg" alt="Urologia">
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <div class="service-desc">
                      <h4>Urologia</h4>
                      <p>Hiperplastia Prostatica y Cáncer de Próstata, Litiasis Renal, Eyaculación Precoz, Disfunción Eréctil, etc.</p>
                        <ul class="service-tab-info">
                          <li>Tratamiento Médico</li>
                          <li>Tratamiento Quirúrgico</li>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
			<div role="tabpanel" class="tab-pane animated fadeIn" id="tab_s">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <div class="service-img">
                      <img src="../assets/img/images/about/homeo.jpg" alt="Homeopatia">
                    </div>
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <div class="service-desc">
                      <h4>Homeopatia</h4>
                      <p>La Mejor Forma de Curar a Tu Familia de Manera Suave, Rápida y Permanente.</p>
                        <ul class="service-tab-info">
                          <li>Ansiedad</li>
                          <li>Angustia</li>
                          <li>Estrés</li>
                          <li>Depresión</li>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>                     
     <section id="section-contact-info">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-sm-6 wow slideInLeft contact-form" data-wow-delay="0.6s">
            <h2>Contacto</h2>
            <p>Cualquier duda, queja o sugerencia le responderemos con gusto.</p>
            <div class="status alert alert-success" style="display: none"></div>
            <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="../controllers/email_contacto/sendemail.php" role="form">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" name="nombre" class="form-control" required placeholder="Nombre">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="email" name="correo" class="form-control" required placeholder="Email">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <input type="text" name="asunto" class="form-control" required placeholder="Asunto">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <textarea name="mensaje" id="message" required class="form-control" rows="8" placeholder="Mensaje"></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-danger btn-lg">Enviar Mensaje</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-6 col-sm-6 wow slideInLeft ubicacion" data-wow-delay=".12s">
            <h2 class="section-contact">Ubicacion</h2>
            <div class="mapa">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3734.2499815220367!2d-103.32357868561874!3d20.61866500702856!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b2f8579fd4a1%3A0x1332f30dd30df003!2sUnidad+Medica+Sant%C3%A9%2C+Constituci%C3%B3n+de+1917+3204%2C+Fraccionamiento+Residencial+Revoluci%C3%B3n%2C+45580+San+Pedro+Tlaquepaque%2C+Jal.!5e0!3m2!1ses!2smx!4v1459551590990"  width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </section> 
    d<section id="section-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center wow fadeInDown">
            <div class="footer-desc">
              <h2 class="footer-logo">Unidad Medica Sante</h2><p>Av. Constitución de 1917 #3204 <br> Col. Fraccionamiento Revolucion <br> 
                Tlaquepaque, Jalisco, México
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="../resource/jquery/jquery.js"></script>
    <script src="../resource/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/validator.min.js"></script>
    <script src="../assets/js/form-scripts.js"></script>
    <script src="../assets/js/jquery.easing.min.js"></script>
    <script src="../assets/js/wow.min.js"></script>
    <script src="../resource/respond/js/respond.js"></script>
    <script src="../assets/js/theme.js"></script>
    <script src="../resource/respond/js/respond.js"></script>
    <script src="../resource/moment-develop/js/moment.min.js"></script>
    <script src="../resource/bootstrap-datetimepicker-master/js/bootstrap-datetimepicker.min.js"></script>
  </body>
</html>




