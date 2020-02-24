<?php include("include/header.php") ?>
<?php if(isset($_SESSION['login_user'])){ ?>
<?php include("include/header-menu.php") ?>

<?php if(isset($_GET['FLDNAME'])){ 
$FLDNAME=$_GET['FLDNAME'];
//session_start();
$_SESSION['LoadedDesignFolderName'] = $FLDNAME;



if(isset($FLDNAME)){ 
?>
<div class="form-group">
<!--<input name="" type="button" class="btn btn-primary btn-sm" id="add_css_code_button" value="Add CSS File" data-toggle="modal" data-target="#add_css_modal">
<input name="" type="button" class="btn btn-success btn-sm" value="Add JS File" data-toggle="modal" data-target="#add_js_modal">
<input name="" type="button" class="btn btn-warning btn-sm" value="Add Images" data-toggle="modal" data-target="#add_images_modal">-->


<!-- add file links open -->
<div class="btn-group">
  <button type="button" class="btn btn-danger btn-sm">Add links</button>
  <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="javascript:void(0);" data-toggle="modal" id="add_css_modal_btn" data-target="#add_css_modal">Add CSS link</a></li>
    <li><a href="javascript:void(0);" data-toggle="modal" id="add_js_modal_btn" data-target="#add_js_modal">Add JS link</a></li>
    <li><a href="javascript:void(0);" data-toggle="modal" id="add_images_modal_btn" data-target="#add_images_modal">Add Images link</a></li>
  </ul>
</div>
<!-- add file links closed -->

<!-- upload button group open -->
<div class="btn-group">
  <button type="button" class="btn btn-danger btn-sm">Upload Files</button>
  <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#upload_css_modal">Upload CSS Files</a></li>
    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#upload_js_modal">Upload JS Files</a></li>
    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#upload_image_modal">Upload Images</a></li>
  </ul>
</div>
<!-- upload button group closed -->

<!--<a href="javascript:void(0);" data-toggle="modal" data-target="#create_file_modal" class="btn btn-warning btn-sm">Create Files</a>-->

<a href="javascript:void(0);" data-toggle="modal" title="<?php echo $FLDNAME; ?>" id="load_files" data-target="#load_files_modal" class="btn btn-warning btn-sm">Create / load Files</a>

<a href="javascript:void(0);" data-toggle="modal" data-target="#add_tags_modal" class="btn btn-warning btn-sm">Add Tags</a>

<a href="edit-design-css.php?FLDNAME=<?php echo $FLDNAME; ?>" class="btn btn-warning btn-sm">Edit CSS</a>

<a href="<?php echo "design-folders/".$FLDNAME; ?>" target="_blank" class="btn btn-warning btn-sm pull-right">View live</a>
</div>


<div class="design_veiw_file"></div>



<!-- modal -->
<?php $FLDNAME=$_GET['FLDNAME']; ?>
<?php include("modals/add_css_modal.php") ?>
<?php include("modals/add_js_modal.php") ?>
<?php include("modals/add_images_modal.php") ?>
<?php include("modals/upload_css_modal.php") ?>
<?php include("modals/upload_js_modal.php") ?>
<?php include("modals/upload_image_modal.php") ?>
<?php include("modals/load_files_modal.php") ?>
<?php include("modals/add_tags_modal.php") ?>


<?php }else{
header("location:index.php");	

?>

<?php } } ?>




<script>
$(document).ready(function(){
	$("#code_msg").fadeOut(500);
	$("#update_code_button").click(function(){
		var folder_nm = $("#folder_nm").val();
	var edit_code = $("#edit_code").val();
	$.post('action.php', { folder_nm:folder_nm, edit_code:edit_code }, function(data){
		$("#code_msg").fadeIn(500);
		$("#code_msg").html(data);
		$("#code_msg").delay(2000).fadeOut(500);
	});
		});
});
</script>


<?php include("include/footer.php") ?>
<?php }else{ ?>
<?php include("include/login.php") ?>
<?php include("include/footer.php") ?>
<?php } ?> 



