<div id="edit<?php echo $row['sub_code'];?>" tabindex="-1" role="dialog" class="modal fade">  
					      <div class="modal-dialog">  
					           <div class="modal-content">  
					                <div class="modal-header">  
					                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
					                     <h4 class="modal-title">Edit Grade</h4>  
					                </div>  
					                <div class="modal-body">  
					                     <form method="POST" action="admin_edit_stud_grade.php?sub_code=<?php echo $row['sub_code'];?>&user_id=<?php echo $id ?>">
					                          <label>Subject Code</label>  
					                          <input type="text" name="sub_code" id="sub_code" class="form-control" value="<?php echo $row['sub_code']; ?>" />
					                          <br />  
					                          <label>Subject Description</label>  
					                          <input type="text" name="sub_desc" id="sub_desc" class="form-control" value="<?php echo $row['sub_desc']; ?>" />  
					                          <br />  
					                          <label>Grade</label>  
					                          <input type="text" name="grade" id="grade" class="form-control" value="<?php echo $row['grade']; ?>"/>

					                          <input type="hidden" name="user_id" id="user_id" class="form-control" value="<?php echo $id ?>" />  
					                          <br />
					                          <button type="submit" name="edit" id="edit" value="Update" class="btn btn-success">Update</button>  
					                     </form>  
					                </div>  
					                <div class="modal-footer">  
					                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
					                </div>  
					           </div>  
					      </div>  
					 </div> 