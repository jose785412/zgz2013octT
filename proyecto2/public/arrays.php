<?php

$a = array( 9,45,2);

var_dump($a);

echo "<pre>";
print_r($a);
echo "</pre>";


$b = array ('5'=>'caca',
			'nombre'=>'Agustin',
			9,
			true => 'mas',
			5.6 => 'float',
			'apellido'=>'Calderon',
			'email' => 'agustincl@gmail.com');

$b[]=5;

echo "<pre>";
print_r($b);
echo "</pre>";


foreach($b as $key => $value)
{
	echo $key.": ".$value;
	echo "<br/>";
}



