<?php
/**
 * Upload a file to uploads directory
 * @param array $array_files Array with the file information
 * @return string filename
 */
function uploadFile($array_files) {
	//Save the form image
	$uploads_dir = $_SERVER['DOCUMENT_ROOT'] . "/uploads";
	move_uploaded_file ($array_files["tmp_name"], $uploads_dir . "/" .$array_files["name"]);		
	return $array_files["name"];
}

/**
 * Print a debug of the array
 * @param aray $array Array to debug
 * @return null
 */
function debug($array) {
	print("<pre>");
	print_r($array);
	print("</pre>");
}