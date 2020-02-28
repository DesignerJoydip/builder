<?php
// file name list 
if(isset($_POST['design_file_list_name'], $_POST['design_file_class'])){
$design_file_list_name=base64_decode($_POST['design_file_list_name']);	
$design_file_class=$_POST['design_file_class'];

$design_file_list_name;
$design_file_name = substr($design_file_list_name, 0, strpos($design_file_list_name, '|'));
$design_folder_name_with_dash = strstr($design_file_list_name, '|');
$design_folder_name=substr($design_folder_name_with_dash, 1);

// updated
$only_file_name= strstr($design_file_name, '/');
$file_get_contents = substr($only_file_name, 1);
$file_name = $file_get_contents;

?>
<h2><?php echo $design_file_class; ?></h2>
<div id="design_msg"></div>
<input name="" type="hidden" id="design_folder_name" value="<?php echo $design_folder_name; ?>" />
<input name="" type="hidden" id="design_file_name" value="<?php echo $file_name; ?>" />
<div class="form-group">
<textarea class="form-control" id="design_file_code"><?php echo file_get_contents($file_get_contents); ?></textarea>
</div>
<div class="form-group">
<input name="" type="button" class="btn btn-danger pull-right" id="update_design_code_button" value="UPDATE">
</div>



<script>
$(document).ready(function(){

	
// code save	
	$("#update_design_code_button").click(function(){
		//alert();
		$("#design_msg").fadeIn(2000);
		var design_folder_name = $("#design_folder_name").val();
		var design_file_name = $("#design_file_name").val();
		var design_file_code = $("#design_file_code").val();
		//alert(design_file_name);
		$.post("action.php", { design_folder_name:design_folder_name, design_file_name:design_file_name, design_file_code:design_file_code }, function(data){
			$("#design_msg").fadeIn(2000);
			$("#design_msg").html(data);
			$("#design_msg").delay(3000).fadeOut(1000);
			});

});
	
});


</script>


<?php
die();	
}
?>
