<form action="action.php" method="post">
<ul>
	<li>
		Id: <input type="hidden" name="id" value="1"/>
	</li>
	<li>
		Nombre: <input type="text" name="name"/>
	</li>
	<li>
		Email: <input type="text" name="email"/>
	</li>
	<li>
		Password: <input type="password" name="password"/>
	</li>
	<li>
		Direccion: <input type="text" name="address"/>
	</li>
	<li>
		Telefono: <input type="text" name="phone"/>
	</li>
	<li>
		Descripcion: <textarea name="description"></textarea>
	</li>
	<li>
		Foto: <input type="file" name="photo" />
	</li>
	<li>
		Tecnologia: 
			PHP: <input type="checkbox" name="techs[]" value="PHP" />
			MySQL: <input type="checkbox" name="techs[]" value="MySQL" />
			Java: <input type="checkbox" name="techs[]" value="JAVA" />
	</li>
	<li>
		Mascotas: 
			Perro: <input type="radio" name="pets" value="Perro" />
			Gato: <input type="radio" name="pets" value="Gato" />
			Otros: <input type="radio" name="pets" value="Otros" />
	</li>
	<li>
		Idiomas:
		<select multiple name="languages[]">
			<option value="eng">Ingles</option>
			<option value="fra">Frances</option>
			<option value="esp">Castellano</option>
		</select> 
		
		
	</li>
	<li>
		Ciudad: 
		<select name="cities">
			<option value="zgz">Zaragoza</option>
			<option value="bcn">Barcelona</option>
			<option value="mad">Madrid</option>
		</select>
	</li>
	<li>
		Submit: <input type="submit" name="Enviar" />
	</li>
	<li>
		Reset: <input type="reset" name="Reset" value="Limpiar" />
	</li>
	<li>
		Button: <input type="button" value="Boton" />
	</li>
	
	
</ul>



</form>

