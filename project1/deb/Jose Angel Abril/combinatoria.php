<?php 
     function factorial($x){
        $aux = $x-1;
        $ans=$x;
        while($aux>1){
           $ans = $ans* $aux;
           $aux--;
        }
        return($ans);
     }
     $m=5;
     $n=4;
     echo  "La combinación de 5 sobre 4 es: ".factorial($m) / (factorial($m-$n) * factorial($n) );
?>