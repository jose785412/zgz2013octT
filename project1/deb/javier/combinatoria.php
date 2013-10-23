<?php
$a=16;
$b=3;



$f_a=1;
$f_b=1;
$f_c=1;

for ($aitr=$a;$aitr>=1 ; $aitr--)
{
	$f_a=$f_a*$aitr;
	echo $aitr;
}
echo $f_a;
die;
for ($b=3;$b=1;$b--)
{
	$f_b=$f_b*$b;
}
for ($c;$c=1;$c--)
{
	$f_c=$f_c*$c;
}
echo "Solución a a!/c: ".$f_a/($f_c*$f_b);