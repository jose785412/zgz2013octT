<?php

require_once ("../model/usuarios/users.php");

switch($request['action'])
{	
	case 'update':
		if($_POST)
		{
			$user=$_POST;
			$user['filename']=updateFoto($_FILES, $request['params']['line'], $config);
			writeUser($request['params']['line'], $user, $config);
			
			header('Location: /users');
		}
		else
		{
			include ("../views/helpers/selectForm.php");
			//Lleer datos del archivo de usuarios segun la linea
			$user=readUser($request['params']['line'], $config);
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
			$data=readCities($config);
			include ("../views/helpers/selectForm.php");
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
		$users=selectAllUsers($config);
		$viewparams=array('users'=>$users);
		//include ("../views/usuarios/select.phtml");
		$content=renderView($request,$viewparams);
	break;
}
$layoutparams=array('content'=>$content);
echo renderLayout('backend', $layoutparams);













