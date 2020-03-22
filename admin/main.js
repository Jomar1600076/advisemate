				
$(document).ready(function(){
	all_student();
				function all_student(){
		    		$.ajax({
		    			url:"action.php",
		    			method:"POST",
		    			data:{students:1 },
		    			success:function(data)
		    			{
		    				$("#students").html(data);
		    			}
		    		});
		    	}
});