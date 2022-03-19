$(function() {

    $('#student-form-link').click(function(e) {
		$("#register-s-form").delay(100).fadeIn(100);
 		$("#register-t-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-t-form").delay(100).fadeIn(100);
 		$("#register-s-form").fadeOut(100);
		$('#student-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});
