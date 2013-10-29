<?php

if(isset($_GET['action']))
	$action=$_GET['action'];
else
	$action='select';




// echo "<pre>";
// print_r($config);
// echo "</pre>";
// die;


// /controller/action/param/value/param2/value2


switch($action)
{	
	case 'update':
		if($_POST)
		{
			$filename=updateFoto($_FILES, $_GET['line'], $config);
			updateUserLine($_POST, $_GET['line'], $filename, $config);
			header('Location: /?controller=usuarios&action=select');
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
			header('Location: /?controller=usuarios&action=select');
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
			header('Location: /?controller=usuarios&action=select');
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