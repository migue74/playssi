<?php
	if ($_GET['tipo'] == 'Juego') {
		echo utf8_encode('<label for="plataforma">Plataforma:</label> <select name="plataforma" id="plataforma">
				<option>PC</option>
				<option>PS3</option>
				<option>Wii</option>
				<option>XBOX 360</option>
				<option>NDS</option>
				<option>PSP</option>
				<option>M�vil</option>
			</select>
			<label for="genero">G�nero:</label> <select name="genero" id="genero">
				<option>Acci�n</option>
				<option>Aventuras</option>
				<option>Deportes</option>
				<option>Lucha</option>
				<option>FPS</option>
				<option>RPG</option>
				<option>Simulaci�n</option>
				<option>Estrategia</option>
				<option>Puzzle</option>
				<option>Plataformas</option>
				<option>Conducci�n</option>
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
	} else if ($_GET['tipo'] == 'Consola')
		echo utf8_encode('<label for="capacidad">Capacidad:</label> <input type="text" name="capacidad" class="number" />');
	else
		echo utf8_encode('<label for="tipoacc">Tipo de accesorio:</label> <select name="tipoacc"><option>Mando</option><option>Volante</option><option>Funda</option><option>Auriculares</option><option>Memoria</option><option>Cable</option><option>Otros</option></select>');
?>