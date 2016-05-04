;$(function(){
	var questionsStr = $('#questionStr').html();
	console.log(questionsStr);
	var quesArr = questionsStr.split('-');
	var count =0;
	for(var i=0;i<quesArr.length;i++){
		console.log(checkRightAnswer(quesArr[i])+'-'+quesArr[i]);
		++count;
		if(checkRightAnswer(quesArr[i])===true){
			loadAnswer(quesArr[i],'checkbox',count);
		}else{
			loadAnswer(quesArr[i],'radio',count);
		}
	}

	function checkRightAnswer(questionId){
		var isCheckBox = '';
		$.ajax({
			url : "/cat-prj/answer/checkAnswer",
			type : "GET",
			dataType : "JSON",
			async : false,
			data : {
				questionId : questionId
			},
			success : function(response) {
				isCheckBox = response;
			},
			complete : function(){
			},
			error: function (request, status, error) {
	        	console.log(error);
	    	}
		});
		return isCheckBox;
	}

	function loadAnswer(questionId,type,length){
		isCheckBox = true;
		$.ajax({
			url : "/cat-prj/answer/getAnswer",
			type : "GET",
			data : {
				questionId : questionId
			},
			async : false,
			dataType : "JSON",
			success : function(response) {
				$.each(response, function(key, value) {
					if(type==='radio'){
						var html = "<p>" +
      					"<input id='answer-"+value.id+"' name='answer-"+(length)+"' value='"+value.id+"' type='radio' />" +
      					"<label for='answer-"+value.id+"' >"+value.name+"</label>" +
    					"</p>";
						
					}else{
						var html = "<p>" +
      					"<input id='answer-"+value.id+"' name='answer-"+(length)+"[]' value='"+value.id+"' type='checkbox' />" +
      					"<label for='answer-"+value.id+"' >"+value.name+"</label>" +
    					"</p>";
					}
					$('#question-'+length).append(html);
				});
			},
			complete : function(){
				//document.location.href = '/cat-prj/home';
			},
			error: function (request, status, error) {
	        	console.log(error);
	    	}
		});
	}
});

var TestForm = {
	submit : function(){
		var form = $('#TestForm');
		/*$.ajax({
			url : "/cat-prj/user/createStudent",
			type : "POST",
			data : formData,
			contentType : false,
			processData : false,
			dataType : "JSON",
			success : function(response) {
				
			},
			complete : function(){
				//document.location.href = '/cat-prj/home';
			}
		});*/
		alert("Dep trai");
	}
}