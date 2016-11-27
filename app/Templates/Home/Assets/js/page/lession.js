;$(function(){

});

function loadLession(id){
	$("#loadLession").modal("show");
	$.ajax({
		url : "/cat-prj/lession/get",
		type : "GET",
		data : {
			itemId : id
		},
		dataType : "JSON",
		success : function(data) {
			$.each(data, function(key, value) {
				$("#loadLession .title").html(value.title);
				$("#loadLession .content").text(value.content);
				$("#loadLession .video").attr({
					'src' : value.video
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