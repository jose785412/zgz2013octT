<?php
function factorial($n)
{
$f = 1;
for($c=1; $c<=$n; $c++)
{
$f *= $c;
}
return $f;
}
$num1 = 6;
$num2 = 4;
$num0 = factorial($num1) / (factorial($num2) * factorial($num1 - $num2));

   echo $num1 . " sobre " . $num2 . " es " . $num0;
