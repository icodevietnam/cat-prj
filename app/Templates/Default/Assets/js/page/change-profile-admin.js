$(function(){
	var form = $("#profileForm");

	$("#profileForm .avatar").change(function(){
    	previewImage(this);
	});

	form.validate({
		rules : {
			fullname:{
				required:true
			},
			email :{
				required: true,
				remote : {
					url : '/cat-prj/user/checkEmail',
					type : 'GET',
					data : {
						email : function(){
							return $('#newItemForm .email').val();
						}
					}
				}
			}
		},
		messages : {
			fullname:{
				required:"fullname is not blank"
			},
			email:{
				required:"Email is not blank",
				remote : "The email is existed"
			},
		},
	});
});

function previewImage(input){
	if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function changeProfile(){
	var form = $('#profileForm');
	var formData =  new FormData(form[0]);
	if(form.valid()){
		$.ajax({
			url : "/cat-prj/user/update",
			type : "POST",
			data : formData,
			contentType : false,
			processData : false,
			dataType : "JSON",
			success : function(response) {
			},
			complete:function(){
				$('.alert-danger').text("Change Profile Successfully").show().delay(5000).fadeOut();
			},
			error: function (request, status, error) {
        	alert(request.responseText);
    		}
		});
	}
}