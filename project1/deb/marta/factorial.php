<?php
$n=10;
$r=3;
function factorial ($x)
{
	$f=$x;
	$x=$x-1;			
	while ($x>1)
	{	
		$f=$f*$x;
		$x=$x-1;
}
return $f
}
echo factorial($n)/(factorial($r)*factorial($(n-r)));
