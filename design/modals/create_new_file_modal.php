<?php //$FLDNAME=$_GET['FLDNAME']; 
//echo $FLDNAME;

?>

<!-- Modal -->
<div class="modal fade" id="create_new_file_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create New File</h4>
      </div>
      <div class="modal-body">
        <div id="file_folder_created_msg"></div>
        <input type="text" class="form-control button_name_for_create" value="">
        <input type="text" class="form-control put_designmainsubfolder_name" value="">
        <input type="text" class="form-control put_destinationfolder_name" value="">

        <div class="add_new_folder_section" style="display: none;">
          <label>Give a Folder Name</label>
          <input type="text" class="form-control put_newdestinationfolder_name" value="">
        </div>
        <div class="add_new_file_section" style="display: none;">
          <label>Give a File Name</label>
          <input type="text" class="form-control put_newdestinationfile_name" value="">
          <div class="file_extension_radio">
            <label><input type="radio" class="file_extension" name="file_extension" value="html">.html</label>
            <label><input type="radio" class="file_extension" name="file_extension" value="css">.css</label>
            <label><input type="radio" class="file_extension" name="file_extension" value="js">.js</label>
            <label><input type="radio" class="file_extension" name="file_extension" value="php">.php</label>
          </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary create-new-files-btn" _data-dismiss="modal">Create</button>
      </div>
    </div>
  </div>
</div>




<script>

$(".create-new-files-btn").click(function(){
    //console.log("fdfdf");

    // put data in field
    var button_name_for_create = $(".button_name_for_create").val();
    var designmainsubfolder_name_for_create = $(".put_designmainsubfolder_name").val();
    var destinationfolder_name_for_create = $(".put_destinationfolder_name").val();
    var newdestinationfolder_name = $(".put_newdestinationfolder_name").val();
    var newdestinationfile_name = $(".put_newdestinationfile_name").val();

    console.log(button_name_for_create);

    if(button_name_for_create == 'quick_add_folder'){

      if(newdestinationfolder_name == ''){
        $("#file_folder_created_msg").html('<div class="alert alert-danger">Please Give a Folder Name</div>');
      }else{
        if(/^[a-zA-Z0-9- ]*$/.test(newdestinationfolder_name) == false) {
          //alert('Your search string contains illegal characters.');
          $("#file_folder_created_msg").fadeIn(500);
          $("#file_folder_created_msg").html('<div class="alert alert-danger">Special Charecter are not allowed. Exclude (-) sign.</div>');
          $("#file_folder_created_msg").delay(2000).fadeOut(500);
        }else{
          $.post('action.php', { button_name_for_create:button_name_for_create, designmainsubfolder_name_for_create:designmainsubfolder_name_for_create, destinationfolder_name_for_create:destinationfolder_name_for_create, newdestinationfolder_name:newdestinationfolder_name, newdestinationfile_name:newdestinationfile_name }, function(data){
            //console.log(button_name_for_create);
            $("#file_folder_created_msg").fadeIn(500);
            $("#file_folder_created_msg").html(data);
            $("#file_folder_created_msg").delay(2000).fadeOut(500);
          });
        }
      }

    }else if(button_name_for_create == 'quick_add_file'){

      if(newdestinationfile_name == ''){
        $("#file_folder_created_msg").html('<div class="alert alert-danger">Please Give a File Name</div>');
      }else{
        if(/^[a-zA-Z0-9- ]*$/.test(newdestinationfile_name) == false) {
          //alert('Your search string contains illegal characters.');
          $("#file_folder_created_msg").fadeIn(500);
          $("#file_folder_created_msg").html('<div class="alert alert-danger">Special Charecter are not allowed. Exclude (-) sign.</div>');
          $("#file_folder_created_msg").delay(2000).fadeOut(500);
        }else{
          $.post('action.php', { button_name_for_create:button_name_for_create, designmainsubfolder_name_for_create:designmainsubfolder_name_for_create, destinationfolder_name_for_create:destinationfolder_name_for_create, newdestinationfolder_name:newdestinationfolder_name, newdestinationfile_name:newdestinationfile_name }, function(data){
            //console.log(button_name_for_create);
            $("#file_folder_created_msg").fadeIn(500);
            $("#file_folder_created_msg").html(data);
            //$("#file_folder_created_msg").delay(2000).fadeOut(500);
          });
        }
      }

    }

    

  });
</script>



