<?php

/**
 * Read .ini config file
 * @param string $filename
 * @param string $state
 * @return array config
 */
function readConfigFile($filename, $state)
{
	
	
	
// 	Leer el contenido del fichero .ini en un array
	$config=parse_ini_file($filename, true);
	
// 	recorrar el array
	foreach($config as $key => $value)
	{ 
// 		dividir las llaves por : en un array
		$array_keys=explode(':', $key);
// 		si la llavew 1 es igual a state
		if($array_keys[0]==$state)
		{
			$config_arra1=$config[$array_keys[1]];
			$config_arra2=$config[$key];
			break;
		}
	}	
// 	hacer el merge de los array 1 y array 2
	$config=array_merge($config_arra1,$config_arra2);
	
	
	
	return $config;
}





