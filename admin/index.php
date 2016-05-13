<?php
  /*
	* @Proyecto	UME
	* @Version Ajax
	* @Autor	Jorge Garcia
	* @Version	1.0
	*/

	/*
		Control de errores
	 */
	@session_start();
	define('ENVIRONMENT','Desarrollo');
	switch (ENVIRONMENT){
		case 'Desarrollo':
			error_reporting(-1);
			ini_set('display_errors', 1);
		break;

		case 'Produccion':
			ini_set('display_errors', 0);
			if (version_compare(PHP_VERSION, '5.3', '>=')){
			error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
			}
			else{
			error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
			}
		break;

		default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'The application environment is not set correctly.';
		exit(1);
	}

	/*
		Variables PATH del sistema
	 */
  define('BASE_DIR_BACKEND', __DIR__);
  define('BASE_DIR_FRONTEND', 'http://'. $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].dirname($_SERVER['PHP_SELF']));
  define('BASE_FILE', basename(basename($_SERVER['SCRIPT_NAME']),'.php'));

  require_once(BASE_DIR_BACKEND.'/controller/main.php');
?>