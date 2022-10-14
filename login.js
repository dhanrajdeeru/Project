var$=jquery.noconflict();
$(document).ready(function() {
	$('#login').on('submit', function(event) {
		$.ajax({
			data : {
				id : $('#id').val(),
				pass : $('#pass').val()
			},
			type : 'POST',
			url : 'login.py'
		})
		.done(function(data) {
			if (data.done) {
				txt=text(data.done);
				alert(txt)
			}
			else if(data.fail) {
				txt=text(data.fail);
				alert(txt)
			}
			else if(data.wrong){
				txt=text(data.wrong);
				alert(txt)
			}
			else {
				txt=text(data.error);
				alert(txt)
			}
		});
		event.preventDefault();
	});
});
