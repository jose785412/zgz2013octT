<?php
require_once ("../model/archivos.php");
require_once ("../model/usuarios/usuarios.php");
if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action='select';
}
$fileName = $_SERVER['DOCUMENT_ROOT'] . "/uploads/" . "usuario.txt";
switch($action) {	
	/** INSERT */
	case 'insert':
		if($_POST) {
			$filePhotoName= "";
			if (isset($_FILES) && isset($_FILES['photo'])) {			
				$filePhotoName = uploadFile($_FILES["photo"]); //Funcion mia
			}
			userToFile($fileName,$filePhotoName);
			header("Location: /usuarios.php");		
		} else {
			include("../views/usuarios/insert.phtml");
		}
		break;
		
		
	/** UPDATE */
	case 'update':
		if($_POST) {
			if(isset($_GET["id"])) {
				$id = $_GET["id"];
				//Obtain the users data from file
				$users = readUsers($fileName);
				//Check if id is a correct value	
				if (is_numeric($id) === true && $id < count($users)) {
					//Photograph
					$filePhotoName= $_POST['photo2'];
					if (isset($_FILES) && isset($_FILES['photo']) && isset($_FILES['photo']['error'])
					         && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {			
						$filePhotoName = uploadFile($_FILES["photo"]); 						
					}
					//Convert user form data into an array
					$userData = userToArray($filePhotoName);					
					//Change user data
					$users[$id] = $userData;
					//Write the users data in the file
					usersToFile($fileName,$users);
				}
			}			
			header("Location: /usuarios.php");		
		} else {
			if(isset($_GET["id"])) {
				$id = $_GET["id"];
				$user = readUserLine($id,$fileName);
			}
			include("../views/usuarios/insert.phtml");
		}
		break;
		
		
	/** DELETE */
	case 'delete':
		if(isset($_GET["id"])) {
			$id = $_GET["id"];
			//Obtain the users data from file
			$users = readUsers($fileName);
			//Check if id is a correct value	
			if (is_numeric($id) === true && $id < count($users)) {
				//Delete the user
				unset($users[$id]);
				//Write the users data in the file
				usersToFile($fileName,$users);
			}
		}
		header("Location: /usuarios.php");	
		break;
		
		
	/** SELECT */
	case 'select':
	default:	
		//Read users from file
		$users = readUsers($fileName);		
		include("../views/usuarios/usuarios.phtml");
		break;
}