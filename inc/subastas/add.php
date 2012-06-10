<a class="action" href="#"><img src="img/icons/add.png" />Añadir subasta</a></h1>
<div class="prodaction">
	<fieldset>
		<legend>Añadir subasta</legend>
		<form id="formulario" method="post" action="act/auction_add.php" enctype="multipart/form-data">
			<div class="fixed">
				Artículo: <input type="text" name="articulo" maxlength="200" />
				Precio: <input type="text" name="precio" class="number" />
			</div>
			<span class="upimage">
				Imagen: <input type="file" name="imagen" id="imagen" />
			</span>
			<input id="checkurl" type="checkbox" name="imgurl" /><label for="checkurl">URL</label>
			<input type="submit" value="Enviar" />
		</form>
	</fieldset>
</div>