<script>
$(document).ready(function(){

 load_student();
 function load_student(query)
 {
  $.ajax({
   url:"fetchStudentSearch.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#getStudents').html(data);
   }
  });
 }
 $('#student_search_id').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
    load_student(search);
  }
  else
  {
    load_student();
  }
 });
});
</script>