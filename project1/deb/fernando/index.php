
<?php
// (n)
// (r)
//  n sobre r = n! / r!(n -r)!

$n = 4;
$r = 2;

function factorial($num) {
	$res = 1;
	for($i = 2; $i <= $num; $i++) {
		$res *= $i;
	}
	return $res;
}

$res = factorial($n) / (factorial($r) * factorial ($n - $r));

print("Resultado de " . $n . " sobre " . $r . " -> " . $res);


?>