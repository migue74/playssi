$(document).ready(function() {
	$('#alert-login').click(function() {
		$('#user').animate({borderTopColor: '#FF6000', borderLeftColor: '#FF6000', borderRightColor: '#FF6000', borderBottomColor: '#FF6000'}, 100);
		$('#user').animate({backgroundColor: 'rgba(255, 255, 0, 0.2)' }, 100);
		$('#user').animate({borderTopColor: '#DBEFF6', borderLeftColor: '#DBEFF6', borderRightColor: '#DBEFF6', borderBottomColor: '#DBEFF6'}, 100);
		$('#user').animate({borderTopColor: '#FF6000', borderLeftColor: '#FF6000', borderRightColor: '#FF6000', borderBottomColor: '#FF6000'}, 100);
		$('#user').animate({borderTopColor: '#DBEFF6', borderLeftColor: '#DBEFF6', borderRightColor: '#DBEFF6', borderBottomColor: '#DBEFF6'}, 100);
		$('#user').animate({borderTopColor: '#FF6000', borderLeftColor: '#FF6000', borderRightColor: '#FF6000', borderBottomColor: '#FF6000'}, 100);
		$('#nif').focus();
	});
	
	$('#nif').keyup(function() {
		if ($('#nif').val().length > 0)
			$('#label_nif').css('display', 'none');
		else
			$('#label_nif').css('display', 'inline');
	});
	
	$('#passwd').keyup(function() {
		if ($('#passwd').val().length > 0)
			$('#label_passwd').css('display', 'none');
		else
			$('#label_passwd').css('display', 'inline');
	});
	
	function validaNIF(value) {
		if (value.match(/^([0-9]{8})[a-zA-Z]{1}$/)) {
			var numero = value.substr(0, value.length - 1) % 23;
			var letra = value.substr(value.length - 1, 1);
			var letras = 'TRWAGMYFPDXBNJZSQVHLCKET';
			letras = letras.substring(numero, numero + 1);
			if (letras == letra)
				return true;
		}
		alert('ERROR: El NIF no es correcto');
		$('#nif').focus();
		return false;
	}
	
	function validaPasswd(value) {
		if (value.length < 6){
			alert('ERROR: La contraseña debe tener 6 caracteres como minimo');
			$('#passwd').focus();
			return false;
		} else if (!value.match(/^[0-9a-zA-Z]+$/)){
			alert('ERROR: La contraseña debe tener números y letras exclusivamente');
			$('#passwd').focus();
			return false;
		} else
			return true;
	}
	
	$("#login").submit(function() {
		if (!$('#nif').val() || !$('#passwd').val()) {
			alert('ERROR: El formulario no puede contener campos vacíos');
			return false;
		} else if (validaNIF($('#nif').val()) && validaPasswd($('#passwd').val()))  
			return true;  
		else
			return false;
	}); 
	
	$('.box .numbox').textfill({ maxFontPixels: 18 });
	
	$('a.action').click(function() {
		if ($('.prodaction').css('display') == 'none')
			$('.prodaction').slideToggle(500);
		else
			$('.prodaction').slideToggle(500);
	});
	
	$('#tipo').change(function() {
		$('.optional').empty();
		$.ajax({
			url: "inc/productos/tipo.php",
			data:"tipo=" + this.value,
			success: function(html) {
				$('.optional').append(html);
			}
		});
	});
	
	$('#checknew').change(function() {
		$('#editor select').css('display', 'none');
		if ($(this).is(':checked')) {
			$('#editor select').attr('name', 'old_editor');
			$('#editor').append('<input type="text" name="editor" style="width: 100px" />');
		} else {
			$('#editor input').remove();
			$('#editor select').attr('name', 'editor');
			$('#editor select').css('display', 'inline');
		}
	});
	
	$('#checkurl').change(function() {
		$('.upimage').empty();
		if ($(this).is(':checked'))
			$('.upimage').append('Imagen: <input type="text" name="imagen" id="urlimg" />');
		else
			$('.upimage').append('Imagen: <input type="file" name="imagen" id="imagen" />');
	});
	
	$('a.add').click(function() {
		var element = $('.optional span:nth-child(1)').clone();
		element.find('input').val('');
		element.find('select')[0].selectedIndex = 0;
		element.append('<a href="#" class="remove lower"><img src="img/icons/brick_delete.png" />Eliminar</a>');
		$('.optional').append(element);
	});
	
	$('.remove').live('click', function() {
		$(this).parent().remove();
	});
	
	$('#cantidad').change(function() {
		$('#total').val($(this).val());
	});
});