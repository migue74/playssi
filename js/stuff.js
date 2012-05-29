$(document).ready(function() {
	$('#alert-login').click(function() {
		$('#user').animate({ borderTopColor: '#FF6000', borderLeftColor: '#FF6000', borderRightColor: '#FF6000', borderBottomColor: '#FF6000' }, 100);
		$('#user').animate({ backgroundColor: 'rgba(255, 255, 0, 0.2)' }, 100);
		$('#user').animate({ borderTopColor: '#DBEFF6', borderLeftColor: '#DBEFF6', borderRightColor: '#DBEFF6', borderBottomColor: '#DBEFF6' }, 100);
		$('#user').animate({ borderTopColor: '#FF6000', borderLeftColor: '#FF6000', borderRightColor: '#FF6000', borderBottomColor: '#FF6000' }, 100);
		$('#user').animate({ borderTopColor: '#DBEFF6', borderLeftColor: '#DBEFF6', borderRightColor: '#DBEFF6', borderBottomColor: '#DBEFF6' }, 100);
		$('#user').animate({ borderTopColor: '#FF6000', borderLeftColor: '#FF6000', borderRightColor: '#FF6000', borderBottomColor: '#FF6000' }, 100);
	});
	
	$('#nif').keyup(function() {
		if ($('#nif').val().length > 0)
			$('#label_nif').hide();
	});
});