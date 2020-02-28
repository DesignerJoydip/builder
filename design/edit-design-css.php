<?php include("include/header.php"); ?> 
<?php include("include/header-menu.php"); ?>
<?php if(isset($_GET['FLDNAME'])){ 
$FLDNAME=$_GET['FLDNAME'];
if(isset($FLDNAME)){ 
?>
<div class="form-group">

<a href="edit-design-html.php?FLDNAME=<?php echo $FLDNAME; ?>" class="btn btn-primary btn-sm">Edit HTML</a>
<input name="" type="button" class="btn btn-success btn-sm" value="Load CSS File"  data-toggle="modal" data-target="#load_css_modal">
<input name="" type="button" class="btn btn-warning btn-sm" value="Create CSS"  data-toggle="modal" data-target="#create_css_modal">
<a href="javascript:void(0);" data-toggle="modal" data-target="#create_css_file_modal" class="btn btn-warning btn-sm">Create CSS Files</a>

<a href="<?php echo "design-folders/".$FLDNAME; ?>" target="_blank" class="btn btn-warning btn-sm pull-right">View live</a>

</div>




<input type="hidden" id="loadFolder" value="<?php echo $FLDNAME; ?>">
<div id="load_form"></div>


<!-- modal -->
<?php $FLDNAME=$_GET['FLDNAME']; ?>
<?php include("modals/upload_css_modal.php") ?>
<?php include("modals/upload_js_modal.php") ?>
<?php include("modals/upload_image_modal.php") ?>
<?php include("modals/create_css_modal.php"); ?>
<?php include("modals/load_css_modal.php"); ?>
<?php include("modals/create_css_file_modal.php") ?>


<?php }else{
header("location:index.php");	
?>

<?php } } ?>





<script>
$(document).ready(function(){
	var loadFolder = $("#loadFolder").val();
	var loadCssFile = $(".css_file_list a:nth-last-child(2)").text();
	//alert(loadFolder+loadCssFile);
	var textfile = loadFolder+"|"+loadCssFile;
	$.post('action.php', { css_file_name:textfile }, function(data){ $("#load_form").html(data); });
	
$('.css_file_list a').each(function(){
	$(this).click(function(){
		var textfile = $(this).attr('title');
		//alert(textfile);
		$.post('action.php', { css_file_name:textfile }, function(data){ $("#load_form").html(data); });
	});
});







});
</script>

<?php include("include/footer.php"); ?>  



