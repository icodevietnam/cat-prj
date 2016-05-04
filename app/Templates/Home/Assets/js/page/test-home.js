;$(function(){
	var questionsStr = $('#questionStr').html();
	var quesArr = questionsStr.split('-');
	for(var i=0;i<quesArr.length;i++){
		console.log(checkRightAnswer(quesArr[i])+'-'+quesArr[i]);
		if(checkRightAnswer(quesArr[i])===true){
			loadAnswer(quesArr[i],'checkbox');
		}else{
			loadAnswer(quesArr[i],'radio');
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

	function loadAnswer(questionId,type){
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
						$('#question-'+questionId).append("<p>" +
      					"<input name='answer-"+questionId+"' value='"+value.id+"' type='radio' />" +
      					"<label >"+value.name+"</label>" +
    					"</p>");
					}else{
						$('#question-'+questionId).append("<p>" +
      					"<input name='answer-"+questionId+"[]' value='"+value.id+"' type='checkbox' />" +
      					"<label >"+value.name+"</label>" +
    					"</p>");
					}
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