$(function() {

	$('.combobox').selectpicker();
	displayTable();

	$("#newItemForm .audio").change(function(){
    	previewAudio();
	});

	$("#updateItemForm .audio").change(function(){
    	previewAudio2();
	});
	
	$("#newItemForm").validate({
		rules : {
			name:{
				required:true
			},
			description:{
				required:true
			}
		},
		messages : {
			name:{
				required:"Name is not blank"
			},
			description:{
				required:"Description is not blank"
			}
		},
	});
	
	$("#updateItemForm").validate({
		rules : {
			name:{
				required:true
			},
			description:{
				required:true
			}
		},
		messages : {
			name:{
				required:"Name is not blank"
			},
			description:{
				required:"Description is not blank"
			}
		},
	});
});

function displayTable() {
	var dataItems = [];
	$.ajax({
		url : "/cat-prj/question/getAll",
		type : "GET",
		dataType : "JSON",
		success : function(response) {
			var i = 0;
			$.each(response, function(key, value) {
				i++;
				dataItems.push([
						i,
						value.name,value.description,getLevelById(value.level),value.point,
						"<button class='btn btn-sm btn-info' onclick='viewAnswer("
								+ value.id + ");' >View</button>",
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
					"sTitle" : "Name"
				}, {
					"sTitle" : "Description"
				}, {
					"sTitle" : "Level"
				}, {
					"sTitle" : "Point"
				}, {
					"sTitle" : "View Answer"
				}, {
					"sTitle" : "Edit"
				}, {
					"sTitle" : "Delete"
				} ]
			});
		}
	});
}

function viewAnswer(questionId){
	alert("dep trai");
}

function getLevelById(id){
	var name = "";
	$.ajax({
		url : "/cat-prj/level/get",
		type : "GET",
		async : false,
		data : {
			itemId : id
		},
		dataType : "JSON",
		success : function(data) {
			$.each(data, function(key, value) {
				name = value.name;
			})	
		},
		complete : function(){
		},
		error: function (request, status, error) {
        	alert(request.responseText);
    	}
	});
	return name;
}

function getItem(id) {
	$.ajax({
		url : "/cat-prj/question/get",
		type : "GET",
		data : {
			itemId : id
		},
		dataType : "JSON",
		success : function(data) {
			$.each(data, function(key, value) {
				$("#updateItemForm .id").val(value.id);
				$("#updateItemForm .name").val(value.name);
				tinyMCE.activeEditor.setContent(value.description);
				$('#updateItemForm .level').selectpicker('val',value.level);
				$('#updateItemForm .level').selectpicker('render');

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
			url : "/cat-prj/question/delete",
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
	var form = $('#updateItemForm');
	var formData =  new FormData(form[0]);
	if($("#updateItemForm").valid()){
		$.ajax({
			url : "/cat-prj/question/update",
			type : "POST",
			data : formData ,
			contentType : false,
			processData : false,
			dataType : "JSON",
			success : function(response) {
			},
			complete:function(){
				displayTable();
				$("#updateItemForm .id").val(" ");
				$("#updateItemForm .name").val(" ");
				$("#updateItemForm .description").val(" ");
				$("#updateItem").modal("hide");
			}
		});
	}
}

function insertItem() {
	var form = $('#newItemForm');
	var formData =  new FormData(form[0]);
	if(form.valid()){
		$.ajax({
			url : "/cat-prj/question/add",
			type : "POST",
			data : formData ,
			contentType : false,
			processData : false,
			dataType : "JSON",
			success : function(response) {
			},
			complete : function(){
				displayTable();
				$("#newItem").modal("hide");
				$("#newItemForm .name").val(" ");
				$("#newItemForm .description").val(" ");
			}
		});
	}
}


function previewAudio(){
	$('#newItemForm .audio-preview').append("<span class='alert-danger'>You choose 1 file audio </span>");
}

function previewAudio2(){
	$('#updateItemForm .audio-preview').append("<span class='alert-danger'>You choose 1 file audio </span>");
}
