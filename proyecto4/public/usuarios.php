<?php

if(isset($_GET['action']))
	$action=$_GET['action'];
else
	$action='select';


require_once ("../model/archivos.php");
require_once ("../model/usuarios/usuarios.php");

switch($action)
{	
	case 'update':
		echo "Esto es update";
		if($_POST)
		{
			
		}
		else
		{
			//Lleer datos del archivo de usuarios segun la linea
			$user=readUserLine($_GET['line']);
			include ("../views/usuarios/insert.phtml");
		}
	break;
	case 'insert':
		if($_POST)
		{
			// Subir foto
			$file_name=subirFoto($_FILES);
			// Escribir a archivo
			userToFile($_POST, $file_name);					
			header('Location: /usuarios.php');
		}
		else
		{
			$user=array();
			include ("../views/usuarios/insert.phtml");
		}
	break;
	
	case 'delete':
		echo "Esto es delete";
	break;
	default:
	case 'select':		
		//Leer en string los datos del repositorio (usuarios.txt)
		$users=readAllUsersFromFile();
		include ("../views/usuarios/select.phtml");
	break;
}