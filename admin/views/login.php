<!DOCTYPE html>
<html lang="es_MX">
<!--[if IE 9 ]><html class="ie9"><![endif]-->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login UMS</title>
    <link href="<?php echo ($_SESSION['BASE_DIR_FRONTEND']. '/resources/bower_components/animate.css/animate.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo ($_SESSION['BASE_DIR_FRONTEND']. '/resources/bower_components/icon-moon/css/icon-moon.css'); ?>" rel="stylesheet">
    <link href="<?php echo ($_SESSION['BASE_DIR_FRONTEND']. '/assets/css/app.min.1.css'); ?>" rel="stylesheet">
  </head>
  <body class="login-content">
    <div class="lc-block toggled" id="l-login">
      <div class="input-group m-b-20">
        <span class="input-group-addon"><i class="icon-user"></i></span>
        <div class="fg-line">
          <input id="UserName" type="text" class="form-control" autocomplete="off" placeholder="Usuario" tabindex="1" autofocus>
        </div>
      </div>
      <div class="input-group m-b-20">
        <span class="input-group-addon"><i class="icon-lock"></i></span>
        <div class="fg-line">
          <input id="UserPassword" type="password" class="form-control" autocomplete="off" placeholder="Contraseña" tabindex="2">
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="checkbox">
        <label>
          <input id="UserCheck" type="checkbox">
          <i class="input-helper"></i>Mantener mi sesión iniciada
        </label>
      </div>
      <a id="user_login" href="#" class="btn btn-login btn-danger btn-float" tabindex="3">
        <i class="icon-arrow-right2"></i>
      </a>
      <ul class="login-navigation">
        <li data-block="#l-forget-password" class="bgm-orange">Olvide mi Contraseña</li>
      </ul>
    </div>
    <div class="lc-block" id="l-forget-password">
      <p class="text-left">Porfavor ingrese su correo para poder restaurar su contraseña.</p>
      <div class="input-group m-b-20">
        <span class="input-group-addon"><i class="icon-mail4"></i></span>
        <div class="fg-line">
          <input type="text" class="form-control" placeholder="Correo Electrónico">
        </div>
      </div>
      <a href="" class="btn btn-login btn-danger btn-float"><i class="icon-arrow-right2"></i></a>
      <ul class="login-navigation">
        <li data-block="#l-login" class="bgm-green">Iniciar Sesión</li>
      </ul>
    </div>
    <script src="<?php echo ($_SESSION['BASE_DIR_FRONTEND'].'/resources/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
    <script src="<?php echo ($_SESSION['BASE_DIR_FRONTEND'].'/resources/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo ($_SESSION['BASE_DIR_FRONTEND'].'/resources/bower_components/Waves/dist/waves.min.js'); ?>"></script>
    <script src="<?php echo ($_SESSION['BASE_DIR_FRONTEND'].'/assets/js/functions.js'); ?>"></script>
    <script src="<?php echo ($_SESSION['BASE_DIR_FRONTEND'].'/assets/js/sha.js'); ?>"></script>
  </body>
</html>