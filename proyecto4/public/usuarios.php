<?php

if(isset($_GET['action']))
	$action=$_GET['action'];
else
	$action='select';


require_once ("../model/archivos.php");

switch($action)
{	
	case 'update':
		echo "Esto es update";
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
			include ("../views/usuarios/insert.phtml");
		}
	break;
	
	case 'delete':
		echo "Esto es delete";
	break;
	default:
	case 'select':
		
		//Leer en string los datos del repositorio (usuarios.txt)
		$userFile = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
		$data=file_get_contents($userFile);
		//Convertir el string a array
		$data=explode("\n",$data);
		//Recorrer para cada elemento del array
		$html='';
		foreach ($data as $key => $value)
		{
			//Dibujar Fila
			$html.="<tr>";
			//Dibujar columnas
			$user=explode(',',$value);
			foreach ($user as $key => $value)
			{
				if ($key == 12)
				{
					$html.="<td>";
					$html.="<img src=\"/uploads/".$value."\" width=100px />";
					$html.="</td>";
				}
				else
				{
					$html.="<td>";
					$html.=$value;
					$html.="</td>";
				}
			}
			//Agregar al final "Options" (update, delete)
			$html.="<td>";
			$html.="<a href=\"/usuarios.php?action=update\">Update</a>
					&nbsp;&nbsp;
				  <a href=\"usuarios.php?action=delete\">Delete</a>";
			$html.="</td>";
			$html.="</tr>";
		}
		include ("../views/usuarios/select.phtml");				
		
	break;
}