<?php

/**
 * Upload a file to uploads directory
 * @param array $array_files
 * @return string filename
 */
function subirFoto($array_files)
{
	$upload_dir = $_SERVER['DOCUMENT_ROOT']."/uploads";
	
	// 	leer los nombres de los archivos de la carpeta en un array()
	$archivos = scandir($upload_dir);
	
	$a=0;
	$file=$array_files['photo']['name'];
	while(in_array($file,$archivos))
	{
		$a++;
		$file_info=pathinfo($upload_dir."/".$array_files['photo']['name']);
		$file=$file_info['filename']."-".$a.".".$file_info['extension'];
	}

	
	move_uploaded_file($array_files['photo']['tmp_name'],
	$upload_dir."/".$file);
	
	return $file;
}

