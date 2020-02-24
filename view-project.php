<?php include("include/header.php") ?>
<?php if(isset($_SESSION['login_user'])){ ?>
<?php include("include/header-menu.php") ?>


<?php if(isset($_GET['FLDNAME'])){ 
$FLDNAME=$_GET['FLDNAME'];
if(isset($FLDNAME)){ 
?>
<div class="panel panel-primary"> <div class="panel-heading"> 
<h3 class="panel-title"><?php echo $FLDNAME; ?><a href="<?php echo "projects/".$FLDNAME; ?>" class="btn btn-xs btn-default pull-right" target="_blank" style="color:#333; margin-top:-2px;">View Live</a>
<a href="edit-project.php?FLDNAME=<?php echo $FLDNAME; ?>" class="btn btn-xs btn-danger pull-right" style="margin-top:-2px; margin-right:10px;">Edit Code</a>
<div class="zzz pull-right"><a href="javascript:void(0);" data-doc_value="<?php echo $FLDNAME; ?>" class="btn btn-xs btn-danger pull-right create_design_zip_button" style="margin-top:-2px; margin-right:10px;">Generate Zip</a></div>

</h3> 
</div> 
<div class="panel-body">
<iframe width="100%" height="500px" scrolling="auto" src="<?php echo "projects/".$FLDNAME; ?>" frameborder="0"></iframe>
</div> 
</div>
<?php }else{
header("location:index.php");	
?>

<?php } } ?>

<script>
$(document).ready(function() {
    $(".create_design_zip_button").click(function(){
		var design_zip_name = $(this).attr("data-doc_value");
		//alert(design_zip_name);
		$.post('action.php', { zip_folder_name:design_zip_name }, function(data){
			$(".zzz").html(data);
			});
	});
});
</script>


<?php include("include/footer.php") ?>
<?php }else{ ?>
<?php include("include/login.php") ?>
<?php include("include/footer.php") ?>
<?php } ?> 



