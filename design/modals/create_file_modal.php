<?php $FLDNAME=$_GET['FLDNAME']; ?>

<!-- Modal -->
<div class="modal fade" id="create_file_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create File</h4>
      </div>
      <div class="modal-body">
      <div id="create_file_msg"></div>
      <!-- form open -->
      <input type="hidden" value="<?php echo $FLDNAME; ?>" id="create_file_mainFolder">
      <div class="form-group">
    <label>File name</label>
    <input type="text" class="form-control" placeholder="File Name" id="create_file_name">
  </div>
  <div class="form-group">
    <label>File Type</label>
    <select class="form-control create_file_type" id="">
    <option value="0" selected="selected">Select</option>
    <option value="html">HTML</option>
    <option value="php">PHP</option>
    <option value="css">CSS</option>
    <option value="js">JS</option>
    </select>
  </div>
  <div class="form-group">
    <button type="button" class="btn btn-success create_file_modal_button" id="">Create</button>
  </div>
 

      <!-- form closed -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
$(".create_file_modal_button").click(function(){
var create_file_mainFolder=$("#create_file_mainFolder").val();
var create_file_name=$("#create_file_name").val();
var create_file_type=$(".create_file_type").val();
if(create_file_name=='' || create_file_type=='0'){
//alert("required");
	$("#create_file_name").css("border","#ff0000 solid 1px");
	$("#create_file_type").css("border","#ff0000 solid 1px");
	
}else{
	$("#create_file_name").css("border","#000 solid 1px");
	$("#create_file_type").css("border","#000 solid 1px");
	$.post("action.php",{ create_file_mainFolder:create_file_mainFolder, create_file_name:create_file_name, create_file_type:create_file_type }, function(data){
		$("#create_file_msg").fadeIn();
		$("#create_file_msg").html(data);
		$("#create_file_msg").delay(2000).fadeOut();
		})
}
	});
</script>

