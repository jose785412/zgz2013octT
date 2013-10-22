<table border=1>
<tr>
	<td>1</td>
	<td>2</td>
	<td>3</td>
</tr>
<tr>
	<td>2</td>
	<td>4</td>
	<td>8</td>
</tr>
<tr>
	<td>3</td>
	<td>6</td>
	<td>9</td>
</tr>

</table>
<?php
$filas = 5;
$columnas =4;

echo "<table border=1>";
for ($a=0;$a<=$filas;$a++)
{	
	echo "<tr>";
	for ($b=0;$b<=$columnas;$b++)
	{
		// Si fila cero
		if($a==0)
		{
			echo "<td>";
			echo $b;
			echo "</td>";		
		}		
		// Si columna cero
		else if($b==0)
		{
			echo "<td>";
			echo $a;
			echo "</td>";
		}
		else
		{			
			echo "<td>";
			echo $a*$b;
			echo "</td>";
		}
	}
	echo "</tr>";
}

echo "</table>";












