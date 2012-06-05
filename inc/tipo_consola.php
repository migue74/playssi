<?php
	$text = utf8_encode('<label for="plataforma">Plataforma:</label> <select name="plataforma" id="plataforma">
				<option>PC</option>
				<option>PS3</option>
				<option>Wii</option>
				<option>XBOX 360</option>
				<option>NDS</option>
				<option>PSP</option>
				<option>Móvil</option>
			</select>
<label for="genero">Género:</label> <select name="genero" id="genero">
				<option>Acción</option>
				<option>Aventuras</option>
				<option>Deportes</option>
				<option>Lucha</option>
				<option>FPS</option>
				<option>RPG</option>
				<option>Simulación</option>
				<option>Estrategia</option>
				<option>Puzzle</option>
				<option>Plataformas</option>
				<option>Conducción</option>
			</select>
<label for="parental">Clas. Parental:</label> <select name="parental" id="parental">
				<option>EC</option>
				<option>E</option>
				<option>E10+</option>
				<option>T</option>
				<option>M</option>
				<option>AO</option>
				<option>RP</option>
			</select>');
	echo $text;
?>