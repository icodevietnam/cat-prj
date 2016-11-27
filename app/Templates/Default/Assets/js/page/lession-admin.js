$(function() {
	displayTable();
	
	$("#newItemForm").validate({
		rules : {
			title:{
				required:true
			},
			description :{
				required:true
			},
			content:{
				required:true
			},
			image : {
				required : true
			}
		},
		messages : {
			title:{
				required:"Title is not blank"
			},
			description:{
				required:"Description is not blank"
			},content:{
				required:"Content is not blank"
			},image : {
				required : "Image is not blank"
			}
		}
	});
	
	$("#updateItemForm").validate({
		rules : {
			title:{
				required:true
			},
			description :{
				required:true
			},
			content:{
				required:true
			},
			image : {
				required : true
			}
		},
		messages : {
			title:{
				required:"Title is not blank"
			},
			description:{
				required:"Description is not blank"
			},content:{
				required:"Content is not blank"
			},image : {
				required : "Image is not blank"
			}
		}
	});

	$("#newItemForm .image").change(function(){
		checkImage(this,"#newItemForm");
	});

	$("#updateItemForm .image").change(function(){
		checkImage(this,"#updateItemForm");
	});
});

function displayTable() {
	var dataItems = [];
	$.ajax({
		url : "/cat-prj/lession/getAll",
		type : "GET",
		dataType : "JSON",
		success : function(response) {
			var i = 0;
			$.each(response, function(key, value) {
				i++;
				dataItems.push([
						i,
						value.title,value.description,
						"<button class='btn btn-sm btn-primary' onclick='getItem("
								+ value.id + ");' >Edit</button>",
						"<button class='btn btn-sm btn-danger' onclick='deleteItem("
								+ value.id + ");'>Delete</button>" ]);
			});
			$('#tblItems').dataTable({
				"bDestroy" : true,
				"bSort" : true,
				"bFilter" : true,
				"bLengthChange" : true,
				"bPaginate" : true,
				"sDom" : '<"top">rt<"bottom"flp><"clear">',
				"aaData" : dataItems,
				"aaSorting" : [],
				"aoColumns" : [ {
					"sTitle" : "No"
				}, {
					"sTitle" : "Title"
				}, {
					"sTitle" : "Description"
				}, {
					"sTitle" : "Edit"
				}, {
					"sTitle" : "Delete"
				} ]
			});
		}
	});
}

function getItem(id) {
	$.ajax({
		url : "/cat-prj/lession/get",
		type : "GET",
		data : {
			itemId : id
		},
		dataType : "JSON",
		success : function(data) {
			$.each(data, function(key, value) {
				$("#updateItemForm .id").val(value.id);
				$("#updateItemForm .title").val(value.title);
				$("#updateItemForm .description").val(value.description);
				tinyMCE.activeEditor.setContent(value.content);
				$("#updateItemForm .video").val(value.video);
				//$("#updateItemForm .image").val(value.img);
				$("#updateItemForm .preview").attr({
					'src' : value.img
				});
			})	
		},
		complete : function(){
			$("#updateItem").modal("show");
		},
		error: function (request, status, error) {
        	alert(request.responseText);
    	}
	});
}

function deleteItem(id) {
	if (confirm("Are you sure you want to proceed?") == true) {
		$.ajax({
			url : "/cat-prj/lession/delete",
			type : "POST",
			data : {
				itemId : id
			},
			dataType : "JSON",
			success : function(response) {
			},
			complete : function(){
				displayTable();
			}
		});
	}
}

function update() {
	var form = $("#updateItemForm");
	var formData =  new FormData(form[0]);
	if($("#updateItemForm").valid()){
		$.ajax({
			url : "/cat-prj/lession/update",
			type : "POST",
			data : formData,
			contentType : false,
			processData : false,
			dataType : "JSON",
			success : function(response) {
			},
			complete:function(){
				displayTable();
				$("#updateItem").modal("hide");
				$("#updateItemForm .title").val("");
				$("#updateItemForm .description").val("");
				tinyMCE.activeEditor.setContent('');
				$("#updateItemForm .image").val("");
			}
		});
	}
}

function insertItem() {
	var form = $("#newItemForm");
	var formData =  new FormData(form[0]);
	if($("#newItemForm").valid()){
		$.ajax({
			url : "/cat-prj/lession/add",
			type : "POST",
			data : formData,
			contentType : false,
			processData : false,
			dataType : "JSON",
			success : function(response) {
			},
			complete : function(){
				displayTable();
				$("#newItem").modal("hide");
				$("#newItemForm .title").val("");
				$("#newItemForm .description").val("");
				tinyMCE.activeEditor.setContent('');
				$("#newItemForm .image").val("");
			}
		});
	}
}

function checkImage(input,formId){
		var form = $(formId);
		var formData =  new FormData(form[0]);
		$.ajax({
			url : "/cat-prj/file/checkImage",
			type : "POST",
			data : formData,
			contentType : false,
			processData : false,
			dataType : "JSON",
			success : function(response) {
				console.log(response);
				if(response === 'wrong-file' ){
					$(formId +' .image-error').text("File belongs Document type : jpg, jpeg, png, bmp .").show().delay(5000).fadeOut();
					$(formId +' .image').val('');
				}
				if(response === 'wrong-size' ){
					$(formId +' .image-error').text("Size is larger than default size .").show().delay(5000).fadeOut();
					$(formId +' .image').val('');
				}
				if(response === 'true'){
					$(formId +' .image-error').text("File is attached.").show().delay(10000).fadeOut();
					if (input.files && input.files[0]) {
				        var reader = new FileReader();

				        reader.onload = function (e) {
				            $(formId +' .preview').attr('src', e.target.result);
				        }

				        reader.readAsDataURL(input.files[0]);
   					}
				}
			}
		});
}
