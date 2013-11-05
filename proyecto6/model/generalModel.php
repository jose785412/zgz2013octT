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




function getRequest()
{
	$uri=explode('/',$_SERVER['REQUEST_URI']);
	
	if(!isset($uri[1]))
		return array('controller'=>'index');
	
	$controller = $uri[1];

	if(!isset($uri[2]))
		return array('controller'=>$controller,
					 'action'=>'index');

	$action = $uri[2];

	$params=array();
	foreach($uri as $key => $value)
	{
		if($key>2 AND ($key%2==1))
		if(isset($uri[$key+1]))
			$params[$value]=$uri[$key+1];
	}



	return array('controller'=>$controller,
			'action'=>$action,
			'params'=>$params
	);

}



function readCities($config)
{
	switch($config['adapter'])
	{
		case 'mysql';
			include_once('mysql/usuarios.php');
			getCities($config);
			return;
		break;
		case 'txt';
			include_once('txts/usuarios.php');
			getCities($config);
			return;
		break;
	}
}



