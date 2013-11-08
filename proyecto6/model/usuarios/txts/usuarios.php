<?php

/**
 * Write user to txt file 
 * @param unknown $array_data
 * @param unknown $file_name
 * @return null
 */
function userToFile($array_data, $file_name, $config)
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
	$filename = $_SERVER['DOCUMENT_ROOT'].$config['user_txt'];
	file_put_contents($filename,$text."\n",FILE_APPEND);
	
	return;
}

/**
 * Read user line from text file and return as array 
 * @param int $line
 * @return array userarray
 */
function readUserLine($line, $config)
{
	
	
	$filename = $_SERVER['DOCUMENT_ROOT'].$config['user_txt'];
	//Leer el archivo en un array
	$data=file_get_contents($filename);
	//Separar el array por lineas
	$data=explode("\n", $data);
	//Leer la linea en cuestion
	$user=$data[$line];
	//Separar la linea en array
	$user=explode(',', $user);
	foreach($user as $column => $value)
	{
		if(strpos($value, '|')!==false)
			$value=explode('|',$value);
		elseif($column==7 or $column==9)
			$value=array($value);
		$userarray[]=$value;
	}	
	//Retornar el array de usuario
	return $userarray;
}

/**
 * Read all users from text file into array
 * @return array users * 
 */
function readAllUsersFromFile($config)
{
	
	
	$userfile = $_SERVER['DOCUMENT_ROOT'].$config['user_txt'];
	$data=file_get_contents($userfile);
	$data=explode("\n",$data);
	foreach ($data as $key => $value)
	{
		$user=explode(',',$value);
		$users[]=$user;
	}
	return $users;
}

/**
 * Update user line in text file
 * @param array $array_data
 * @param int $line
 * @param string $filename
 */
function updateUserLine($array_data, $line, $filename, $config)
{
	
	
	$users=readAllUsersFromFile($config);
	//recorrer cada elemento del POST
	foreach($array_data as $key => $value)
	{
		//si es un array dividir por |
		if (is_array($value))
			$value=implode('|', $value);
		$out[]=$value;
	}
	$out[]=$filename;			
	$users[$line]=$out;	
	$out=array();
	foreach ($users as $user)
		$out[]=implode(',',$user);		

	$users=implode("\n",$out);
	
	$userfile = $_SERVER['DOCUMENT_ROOT'].$config['user_txt'];	
	file_put_contents($userfile, $users);
	
}
/**
 * Update user foto
 * @param array $_FILES
 * @param int user line
 * @return string filename
 */
function updateFoto($array_files, $line, $config)
{
	
	$user=readUserLine($line, $config);
	
	$foto_anterior=$user[12];	
	if(isset($_FILES['photo']['name']))
	{
		unlink($_SERVER['DOCUMENT_ROOT'].$config['upload_dir']."/".$foto_anterior);
		$upload_dir = $_SERVER['DOCUMENT_ROOT'].$config['upload_dir'];
		move_uploaded_file($array_files['photo']['tmp_name'],
		$upload_dir."/".$array_files['photo']['name']);
	}	
	return $array_files['photo']['name'];
}


function deleteUserFromFile($line, $config)
{
	
	
	$users=readAllUsersFromFile($config);
	//recorrer cada elemento del POST
	unlink($_SERVER['DOCUMENT_ROOT'].$config['upload_dir']."/".$users[$line][12]);
	unset($users[$line]);
	$out=array();
	foreach ($users as $user)
		$out[]=implode(',',$user);
	
	$users=implode("\n",$out);
	
	$userfile = $_SERVER['DOCUMENT_ROOT'].$config['user_txt'];
	file_put_contents($userfile, $users);
}





