<?php
function factorial($n) {
    $result=1; 
    for( $i=1; $i<=$n; $i++)
    {
      $result= $result*$i;
      
    }
    return $result;
}
$n1= 16;
$r= 3;
$comb=0;
$comb= factorial($n1)/(factorial($r)*  factorial($n1-$r));
echo "n= ".$n1."<br>" ;
echo "r= ".$r."<br>";

echo "Combinacion: ".$comb;
?>
