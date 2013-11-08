<a href="formulario.php">Insertar usuario</a>
<table border=1>
<tr>
	<th>Id</th>
	<th>Nombre</th>
	<th>Email</th>
	<th>Password</th>
	<th>Direccion</th>
	<th>Telefono</th>
	<th>Descripcion</th>
	<th>Tecnologia</th>
	<th>Mascota</th>
	<th>Idiomas</th>
	<th>Ciudad</th>
	<th>Submit</th>
	<th>Photo</th>
	<th>Options</th>	
</tr>
<?php 
	//Leer en string los datos del repositorio (usuarios.txt)
		$userFile = $_SERVER['DOCUMENT_ROOT']."/proyecto3/usuarios.txt";
		$data=file_get_contents($userFile);
	//Convertir el string a array
		$data=explode("\n",$data);
	//Recorrer para cada elemento del array
	foreach ($data as $key => $value)
	{
		//Dibujar Fila
		echo "<tr>";
			//Dibujar columnas
			$user=explode(',',$value);
			foreach ($user as $key => $value)
			{
				if ($key == 12)
				{
					echo "<td>";
					echo "<img src=\"/proyecto3/uploads/".$value."\" width=100px />";
					echo "</td>";
				}
				else
				{
					echo "<td>";
					echo $value;
					echo "</td>";
				}
			}
			//Agregar al final "Options" (update, delete)
			echo "<td>";
			echo "<a href=\"formulario.php\">Update</a>
					&nbsp;&nbsp;
				  <a href=\"delete.php\">Delete</a>";
			echo "</td>";
		echo "</tr>";
	}
	
	
		
?>

</table>





