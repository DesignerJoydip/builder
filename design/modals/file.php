<a class="btn btn-danger delete-final-folder-button" data-toggle="modal" data-target="#delete_final_folder_modal">Deletegggg</a>

<script>
    $(".delete-final-folder-button").click(function(){
        console.log("final");
        $('#delete_final_folder_modal').modal('show');
        //$('#delete_file_folder_modal').modal('hide');
    })
</script>