$(function(){
	var form = $("#profileForm");

	$("#profileForm .avatar").change(function(){
    	checkImage(this);
	});

	form.validate({
		rules : {
			fullname:{
				required:true
			},
			email :{
				required: true,
			}
		},
		messages : {
			fullname:{
				required:"fullname is not blank"
			},
			email:{
				required:"Email is not blank"
			},
		},
	});
});

function changeProfile(){
	var form = $('#profileForm');
	var formData =  new FormData(form[0]);
	if(form.valid()){
		$.ajax({
			url : "/cat-prj/user/change-profile",
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

function checkImage(input){
		var form = $('#profileForm');
		var formData =  new FormData(form[0]);
		$.ajax({
			url : "/cat-prj/file/checkAvatar",
			type : "POST",
			data : formData,
			contentType : false,
			processData : false,
			dataType : "JSON",
			success : function(response) {
				console.log(response);
				if(response === 'wrong-file' ){
					$('#image-error').text("File belongs Document type : jpg, jpeg, png, bmp .").show().delay(5000).fadeOut();
					$('#profileForm .avatar').val('');
				}
				if(response === 'wrong-size' ){
					$('#image-error').text("Size is larger than default size .").show().delay(5000).fadeOut();
					$('#profileForm .avatar').val('');
				}
				if(response === 'true'){
					$('#image-error').text("File is attached.").show().delay(10000).fadeOut();
					if (input.files && input.files[0]) {
				        var reader = new FileReader();

				        reader.onload = function (e) {
				            $('#profileForm .preview').attr('src', e.target.result);
				        }

				        reader.readAsDataURL(input.files[0]);
   					}
				}
			}
		});
}