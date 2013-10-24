<?php

/**
 * Write user to txt file 
 * @param unknown $array_data
 * @param unknown $file_name
 * @return null
 */
function userToFile($array_data, $file_name)
{
	//recorrer cada elemento del POST
	foreach($array_data as $key => $value)
	{
		//si es un array dividir por |
		if (is_array($value))
			$value=implode('|', $value);
		$out[]=$value;
	}
	$out[]=$file_name;
		
	$text = implode(',', $out);
	$filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
	file_put_contents($filename,$text."\n",FILE_APPEND);
	
	return;
}

/**
 * Read user line from text file and return as array 
 * @param int $line
 * @return array userarray
 */
function readUserLine($line)
{
	$filename = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
	//Leer el archivo en un array
	$data=file_get_contents($filename);
	//Separar el array por lineas
	$data=explode("\n", $data);
	//Leer la linea en cuestion
	$user=$data[$line];
	//Separar la linea en array
	$user=explode(',', $user);
	foreach($user as $value)
	{
		if(strpos($value, '|')!==false)
			$value=explode('|',$value);
		$userarray[]=$value;
	}	
	//Retornar el array de usuario
	return $userarray;
}

/**
 * Read all users from text file into array
 * @return array users * 
 */
function readAllUsersFromFile()
{
	$userfile = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
	$data=file_get_contents($userfile);
	$data=explode("\n",$data);
	foreach ($data as $key => $value)
	{
		$user=explode(',',$value);
		$users[]=$user;
	}
	return $users;
}










