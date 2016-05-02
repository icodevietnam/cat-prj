;$(function(){
	var form = $("#aboutUsForm");

	form.validate({
		rules:{
			name : {
				required : true
			},
			email : {
				required : true
			},
			message : {
				required : true
			}
		},
		messages:{
			name : {
				required : "Name is not blank"
			},
			email : {
				required : "Email is not blank"
			},
			message : {
				required : "Message is not blank"
			}
		}
	});

});

var aboutUsForm = {
	submit : function(){
		var form = $('#aboutUsForm');
		if(form.valid()){
			$('.success').html('Sent Email Successfully');
		}
	}
}