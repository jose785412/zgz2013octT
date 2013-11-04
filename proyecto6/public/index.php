<?php 

// Define application environment
defined('APPLICATION_ENV') || 
	define('APPLICATION_ENV', 
		(getenv('APPLICATION_ENV') ? 
			getenv('APPLICATION_ENV') : 'production'));

require_once ("../model/generalModel.php");
require_once ("../model/archivos.php");
require_once ("../model/usuarios/txts/usuarios.php");

$config_file="../configs/config.ini";
$config=readConfigFile($config_file, APPLICATION_ENV);

$request=getRequest();

switch ($request['controller'])
{
	case 'users':
		include_once("../controllers/usuarios.php");		
	break;
	case 'frontend':
		echo "Esto es index";
	break;
	default:
	break;
}