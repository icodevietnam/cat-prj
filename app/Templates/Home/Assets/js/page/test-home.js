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