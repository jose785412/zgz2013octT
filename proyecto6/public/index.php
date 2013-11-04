<?php 

// Define application environment
defined('APPLICATION_ENV') || 
	define('APPLICATION_ENV', 
		(getenv('APPLICATION_ENV') ? 
			getenv('APPLICATION_ENV') : 'production'));



if(isset($_GET['controller']))
	$controller=$_GET['controller'];
else
	$controller='frontend';


require_once ("../model/generalModel.php");
require_once ("../model/archivos.php");
require_once ("../model/usuarios/usuarios.php");

$config_file="../configs/config.ini";
$config=readConfigFile($config_file, APPLICATION_ENV);


switch ($controller)
{
	case 'usuarios':
		include_once("../controllers/usuarios.php");		
	break;
	case 'frontend':
		echo "Esto es index";
	break;
	default:
	break;
}