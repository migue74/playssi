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
});