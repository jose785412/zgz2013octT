<?php

echo "<pre>Post:";
print_r($_POST);
echo "<pre>";

echo "<pre>Get:";
print_r($_GET);
echo "<pre>";

echo "<pre>Files:";
print_r($_FILES);
echo "<pre>";

// Subir foto
$upload_dir = $_SERVER['DOCUMENT_ROOT']."/proyecto3/uploads";
move_uploaded_file($_FILES['photo']['tmp_name'], 
				   $upload_dir."/".$_FILES['photo']['name']);




//recorrer cada elemento del POST
foreach($_POST as $key => $value)
{
	//si es un array dividir por |
	if (is_array($value))
		$value=implode('|', $value);
	$out[]=$value;	
}
$out[]=$_FILES['photo']['name'];
	
$text = implode(',', $out);
$userFile = $_SERVER['DOCUMENT_ROOT']."/proyecto3/usuarios.txt";
file_put_contents($userFile,$text."\n",FILE_APPEND);


header('Location: /proyecto3/usuarios.php');





