<?php include("include/header.php") ?>
<?php if(isset($_SESSION['login_user'])){ ?>
<?php include("include/header-menu.php") ?>
 
<span class="msg"></span>
<div class="form-group">
<label>Design Folder Name</label>
<input id="folder_name" class="form-control" type="text">
</div>
<div class="form-group">
<input type="button" value="Create" class="btn btn-primary pull-right create-design-folder" />
</div>

<script>
$(".create-design-folder").click(function(){
	$(".msg").fadeIn(1000);
	$(".msg").html('<div class="alert alert-warning">Please wait.....</div>');
	var folder_name = $("#folder_name").val();
	$.post('action.php', {folder_name:folder_name}, function(data){
		$(".msg").fadeIn(2000);
		$(".msg").html(data);
		$(".msg").delay(3000).fadeOut(1000);
		//location.reload();
		});
	})
</script>


<?php include("include/footer.php") ?>
<?php }else{ ?>
<?php include("include/login.php") ?>
<?php include("include/footer.php") ?>
<?php } ?> 






