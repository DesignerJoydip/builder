<?php $FLDNAME=$_GET['FLDNAME']; ?>

<!-- Modal -->
<div class="modal fade" id="upload_image_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Upload Images</h4>
      </div>
      <div class="modal-body">
      <!-- form open -->
      <form id='uploadImage' action='modals/uploads_image_code.php' method='post' enctype='multipart/form-data'>
      <input type="hidden" name="project_name" value="<?php echo $FLDNAME; ?>" />
      <div class="form-group">
 <input type='file' name='photo' class="form-control" />
 </div>
 <div class="form-group">
 <button class="btn btn-success">Upload Image</button>
 </div>
 </form>
 
<p id='uploadImagemsg'></p>
      <!-- form closed -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
//Adding a submit function to the form 
$('#uploadImage').submit(function(e){
	e.preventDefault();
	$.ajax({
		url: $(this).attr('action'),
		type: "POST",
		data: new FormData(this),
		contentType: false,
		cache: false,
		processData: false,
		success: function(data){
			$('#uploadImagemsg').html(data);
			$('#uploadImage input[type=file]').val('');
		},
		error: function(){}
	});
});
</script>

