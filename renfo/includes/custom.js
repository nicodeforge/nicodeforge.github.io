$(document).ready(function(){
	var payload_nav = "test ajax",
			payload_page = "page_test",
			payload_desc = "description";

	$('#register_bug_submit_button').click(function(e){
		e.preventDefault();
		$.ajax({
		  method: "POST",
		  url: "../functions/register_bug.php",
		  cache:false,
		  dataType: "json",
		  data: { 
		  	navigator: payload_nav,
			page: payload_page,
			description: payload_desc
		  	
		  },
		  success : function(data){
		  	//programContent = data;
		  	//console.log("Data: "+data);
		  	logCallback(data);
		  	//displayProgram(currentExerciseId,programName);
		  }
		});

		/*
		

		$.ajax({
			  method: "POST",
			  url: "functions/register_bug.php",
			  data: { 
			  	navigator: payload_nav,
			  	page: payload_page,
			  	description: payload_desc
			  },
			  success : function(data) {
		    	alert( "Data Saved: " + data );
		    	return false;
		  	  },
		  	  fail : function(data) {
		    	alert( "Error" );
		    	return false;
		  	  }
		});
		return false;
		*/
	});

	function logCallback(data){
		console.log("Data: "+data);
	}
});