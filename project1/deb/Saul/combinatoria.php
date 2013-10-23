<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Combinatoria</title>
</head>
<body>

<?php
//Se llama combinatoria: n sobre m es =>  n! / m!(n - m)!

// Probar usar factorial

// 5! = 1x2x3x4x5

$n = 7;
$m = 3;
$dif = $n - $m;

// Modo recursivo
function factorial_rec ($n) { 
    if ($n==1) return 1; 
    else return $n * factorial($n-1);  // Probar factorial de 0 que irá mal
} 

// Modo iterando
function factorial ($numero) {
   $res = 1; // factorial de 0 es 1.
   for ( $i = 1; $i <= $numero; $i++) {
       $res = $res * $i ;
   }
   return $res;
}

echo "El factorial de $n es ".factorial($n). "<br>";
echo "El factorial_rec de $n es ".factorial_rec($n). "<br>";

echo "El factorial de $m es ".factorial($m). "<br>";
echo "El factorial_rec de $m es ".factorial_rec($m). "<br>";

echo "El factorial de $dif es ".factorial($dif). "<br>";
echo "El factorial_rec de $dif es ".factorial_rec($dif). "<br>";

$combina = factorial($n) / (factorial($m)*factorial($dif));
echo "Combinatoria de $n sobre $m es ".$combina. "<br>"; 

?>

</body>
</html>