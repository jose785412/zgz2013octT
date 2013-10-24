<?php

/**
 * Upload a file to uploads directory
 * @param array $array_files
 * @return string filename
 */
function subirFoto($array_files)
{
	$upload_dir = $_SERVER['DOCUMENT_ROOT']."/uploads";
	move_uploaded_file($array_files['photo']['tmp_name'],
	$upload_dir."/".$array_files['photo']['name']);
	
	return $array_files['photo']['name'];
}