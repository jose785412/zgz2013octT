<?php

function factorial($numero)
{
	if($numero==1) return 1;
	return $numero * factorial($numero - 1);
}


function factorial2($numero)
{
	$factorial=1;
	for($i=1;$i<=$numero;$i++)
		$factorial*=$i;
	return $factorial;
}

$n=5;
$k=3;

$binomial=factorial2($n) / (factorial2($k) * factorial2( $n - $k));
echo "El Coeficiente Binomial de (".$n.",".$k.") es : ".$binomial
?>