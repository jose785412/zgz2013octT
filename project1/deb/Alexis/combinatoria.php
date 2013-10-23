<?php

echo "<b>COMBINATORIA</b>";
echo "<br/>";

/*
 * Si se seleccionan 3 bolas de billar de un grupo de 16, ¿cuantas combinaciones de 3 bolas hay?
 */

echo getCombinatoria(16,3);

function getCombinatoria($n,$r){
	
	$comb = factorial($n)/(factorial($r)*factorial($n-$r));
	
	
	return $comb;
}

function factorial($n){
	if ($n==1) return 1;
	else return $n * factorial($n-1);
}

