<?php

if(isset($_GET['action']))
	$action=$_GET['action'];
else
	$action='select';

$config_file="../configs/config.ini";
require_once ("../model/generalModel.php");
$config=readConfigFile($config_file, "development");


// echo "<pre>";
// print_r($config);
// echo "</pre>";
// die;

require_once ("../model/archivos.php");
require_once ("../model/usuarios/usuarios.php");

switch($action)
{	
	case 'update':
		if($_POST)
		{
			$filename=updateFoto($_FILES, $_GET['line'], $config);
			updateUserLine($_POST, $_GET['line'], $filename, $config);
			header('Location: /usuarios.php');
		}
		else
		{
			//Lleer datos del archivo de usuarios segun la linea
			$user=readUserLine($_GET['line'], $config);
			include ("../views/usuarios/insert.phtml");
		}
	break;
	case 'insert':
		if($_POST)
		{
			// Subir foto
			$file_name=subirFoto($_FILES);
			// Escribir a archivo
			userToFile($_POST, $file_name, $config);					
			header('Location: /usuarios.php');
		}
		else
		{
			$user=array();
			include ("../views/usuarios/insert.phtml");
		}
	break;
	
	case 'delete':
		if($_POST)
		{
			if($_POST['borrar']=='Si')
				deleteUserFromFile($_POST['line'],$config);
			header('Location: /usuarios.php');
		}
		else
		{
			echo "Esto es delete";
			$user=readUserLine($_GET['line'], $config);
			include ("../views/usuarios/delete.phtml");
		}
		
	break;
	default:
	case 'select':		
		//Leer en string los datos del repositorio (usuarios.txt)
		$users=readAllUsersFromFile($config);
		include ("../views/usuarios/select.phtml");
	break;
}