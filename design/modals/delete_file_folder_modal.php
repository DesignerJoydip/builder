<?php //$FLDNAME=$_GET['FLDNAME']; 
//echo $FLDNAME;

?>

<!-- Modal -->
<div class="modal fade" id="delete_file_folder_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <input type="hidden" class="form-control button_name_for_create" value="">
        <input type="hidden" class="form-control put_designmainsubfolder_name" value="">
        <input type="hidden" class="form-control put_destinationfolder_name" value="">
        <h4 class="modal-title text-center" style="margin-top:20px;">Delete File / Folder </h4>
        <h3 class="text-center put_destinationfolder_show"></h3>
        <!-- delete_file_folder_section open -->
        <div class="delete_file_folder_section">
          <h2 class="text-center">Are you want to Delete ?</h2>  
          <div id="file_folder_deleted_msg" class="text-center"></div>
          <div class="text-center">
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-danger delete-file-folder-button">Yes</button>
          </div>
        </div>
        <!-- delete_file_folder_section closed -->

        <!-- delete_final_folder_section open -->
        <div class="delete_final_folder_section" style="display: none;">
        <div id="file_folder_deleted_msg" class="text-center"></div>
          ffffffffffffffff
        </div>
        <!-- delete_final_folder_section closed -->

      </div>
    </div>
  </div>
</div>




<script>

$(".delete-file-folder-button").click(function(){

    //console.log("fdfdf");

    // put data in field
    var button_name_for_delete = $(".button_name_for_create").val();
    var designmainsubfolder_name_for_delete = $(".put_designmainsubfolder_name").val();
    var destinationfolder_name_for_delete = $(".put_destinationfolder_name").val();

    //$('#delete_final_folder_modal').modal();

    //console.log(button_name_for_create);

    $.post('action.php', { button_name_for_delete:button_name_for_delete, designmainsubfolder_name_for_delete:designmainsubfolder_name_for_delete, destinationfolder_name_for_delete:destinationfolder_name_for_delete  }, function(data){
      //console.log(button_name_for_create);
      $("#file_folder_deleted_msg").show();
      $("#file_folder_deleted_msg").fadeIn(500);
      $("#file_folder_deleted_msg").html(data);
      //$("#file_folder_deleted_msg").delay(2000).fadeOut(500);
    });

    
  });



</script>



