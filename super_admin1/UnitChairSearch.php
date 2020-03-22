<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetchUnitChair.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#getChairs').html(data);
   }
  });
 }
 $('#search_id').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>