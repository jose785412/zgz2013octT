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
	$userFile = $_SERVER['DOCUMENT_ROOT']."/usuarios.txt";
	file_put_contents($userFile,$text."\n",FILE_APPEND);
	
	return;
}

