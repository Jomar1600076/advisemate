$(document).ready(function(){
	firstsem();
	secondsem();
	grades();
	advisement();

			    function makeCode(){
			    	const element = document.getElementById('tab');	
			    	html2pdf().from(element).save();
			    }

		    	function firstsem(query = ''){
		    		$.ajax({
		    			url:"action.php",
		    			method:"POST",
		    			data:{firstsem: 1 },
		    			success:function(data)
		    			{
		    				$("#firstsem").html(data);
		    			}
		    		});
		    	}

		    	function secondsem(query = ''){
		    		$.ajax({
		    			url:"action.php",
		    			method:"POST",
		    			data:{secondsem:1 },
		    			success:function(data)
		    			{
		    				$("#secondsem").html(data);
		    			}
		    		});
		    	}

		    	$('#year_lvl').change(function(){
		    		var query = $(this).val();
		    		$.ajax({
		    			url:"action.php",
		    			method:"POST",
		    			data:{query : query},
		    			success:function(data)
		    			{
		    				$("#secondsem").html(data);
		    				$("#firstsem").html(data);
		    			}
		    		});

		    	});

		    	function grades(){
		    		$.ajax({
		    			url:"fetchgrade.php",
		    			method:"POST",
		    			data:{grades: 1 },
		    			success:function(data)
		    			{
		    				$("#grades").html(data);
		    			}
		    		});
		    	}

		    	function advisement(){
		    		$.ajax({
		    			url:"action.php",
		    			method:"POST",
		    			data:{advisement:1 },
		    			success:function(data)
		    			{
		    				$("#advisement").html(data);
		    			}
		    		});
		    	}

		    	/*$('#add').click(function(){  
			           $('#insert').val("Insert");  
			           $('#insert_form')[0].reset();  
			      });  

			    $(document).on('click','.edit_grade' function(){
			    		var sub_code = $(this).attr("id");
			    		$.ajax({
			    			url:"action.php",
			    			method:"POST",
			    			data:{sub_code:sub_code},
			    			dataType:"json",
			    			success:function(data){
			    				$('#sub_code').val(data.sub_code);
			    				$('#sub_grade').val(data.sub_grade);
			    				$('#student_id').val(data.student_id);
			    				$('#insert').val("Update");
			    				$("#edit_modal").modal('show');
			    				
			    			}		
			    		});
			    	});*/
		    	

		    	
})
