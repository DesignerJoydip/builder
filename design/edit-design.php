<?php include("include/header.php") ?>
<?php if(isset($_SESSION['login_user'])){ ?>
<?php include("include/header-menu.php") ?>

<?php if(isset($_GET['FLDNAME'])){ 
$FLDNAME=$_GET['FLDNAME'];
if(isset($FLDNAME)){ 
?>


<div class="form-group">


<div class="btn-group">
  <button type="button" class="btn btn-success btn-sm">Add Files</button>
  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#add_css_modal">Add CSS Files</a></li>
    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#add_js_modal">Add JS Files</a></li>
    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#add_images_modal">Add Images</a></li>
  </ul>
</div>

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

<a href="javascript:void(0);" data-toggle="modal" data-target="#create_file_modal" class="btn btn-warning btn-sm">Create Files</a>

<input name="" type="button" class="btn btn-info btn-sm" value="Load Files" data-toggle="modal" data-target="#load_files_modal">
<input name="" type="button" class="btn btn-danger btn-sm" value="Add Tags" data-toggle="modal" data-target="#add_tags_modal">
<input name="" type="button" class="btn btn-danger btn-sm" value="Create CSS" data-toggle="modal" data-target="#create_css_modal">

<!--<a href="<?php //echo "design-folders/".$FLDNAME; ?>" class="btn btn-danger btn-sm pull-right" target="_blank" style="margin-top:-2px;">View Live</a>
<a href="view-project.php?FLDNAME=<?php //echo $FLDNAME; ?>" class="btn btn-default btn-sm pull-right" style="margin-top:-2px; margin-right:10px;">View Layout</a>-->
</div>

<!-- buttons area closed -->

<!--<textarea name="" cols="" rows="" class="textarea"></textarea>-->

<script>
/*$.get("http://localhost/codestore/project/project-folders/<?php echo $FLDNAME; ?>", function (data) { 
	$(".textarea").val(data);
});*/ 

</script>


<div class="design_veiw_file"></div>











<!-- modal -->
<?php $FLDNAME=$_GET['FLDNAME']; ?>
<?php include("modals/add_css_modal.php") ?>
<?php include("modals/add_js_modal.php") ?>
<?php include("modals/add_images_modal.php") ?>
<?php //include("modals/add_tags_modal.php") ?>
<?php include("modals/load_files_modal.php") ?>
<?php include("modals/upload_css_modal.php") ?>
<?php include("modals/upload_js_modal.php") ?>
<?php include("modals/upload_image_modal.php") ?>
<?php include("modals/create_file_modal.php") ?>
<?php include("modals/create_css_modal.php") ?>

<?php }else{
header("location:index.php");	
?>

<?php } } ?>



<?php include("include/footer.php") ?>
<?php }else{ ?>
<?php include("include/login.php") ?>
<?php include("include/footer.php") ?>
<?php } ?> 



