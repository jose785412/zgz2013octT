<?php



function factorial ($number) {
	$resultado = 1;
	while ($number > 1) {
		$resultado = $resultado * $number;
		//echo "El valor actual de resultado es".$resultado."<br/>";
		$number--;
		//echo "El valor actual de number es".$number."<br/>";
	}
	return $resultado;	
}


echo "Calculadora de n�mero combinatorio"."<br/>";	
$a = 100;
$b = 50;
echo "Calculamos la f�rmula combinatoria de".$a."y".$b."<br/>";
echo factorial($a)/(factorial($b)*factorial($a-$b));	