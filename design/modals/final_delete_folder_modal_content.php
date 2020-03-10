
<h2 class="text-center">This Folder is not empty</h2>
<h3 class="text-center">Are you sure?</h3>  
            <div id="delete_file_folder_section" class="text-center"></div>
            <div class="text-center">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger delete-final-folder-button" data-dismiss="modal">Delete</button>
            </div>
			

<script>
    $(".delete-final-folder-button").click(function(){
        //console.log("final");
        get_designmainsubfolder_name_for_delete = $(".put_designmainsubfolder_name").val();
        get_destinationfolder_name_for_delete = $(".put_destinationfolder_name").val();
        //console.log(get_destinationfolder_name_for_delete);
        //$('#delete_final_folder_modal').modal('show');
        //$('#delete_file_folder_modal').modal('hide');
        $.post('action.php', { get_designmainsubfolder_name_for_delete:get_designmainsubfolder_name_for_delete, get_destinationfolder_name_for_delete:get_destinationfolder_name_for_delete  }, function(data){
            //console.log(button_name_for_create);
            console.log(data);
        });
    })
</script>