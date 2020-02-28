<?php 
session_start();
$FLDNAMEE=$_SESSION['LoadedDesignFolderName'] 
?>
<div class="bs-callout bs-callout-warning file_list"> 
<?php
/*$dir = '../design-folders/'.$FLDNAMEE.'/js/';
foreach (glob($dir."*.*") as $filename) {
    echo "<a href='#' title='".base64_encode($filename.'|'.$FLDNAMEE)."'  data-dismiss='modal'>".$filename."</a><br>";
}*/
?>
<?php

$dir='../design-folders/'.$FLDNAMEE.'/js/';
$files = scandir($dir); 
foreach($files as $file)
{
    if(is_file($dir.$file)){
		 echo "<a href='#' class='".$file."' title='".base64_encode($dir.$file.'|'.$FLDNAMEE)."'  data-dismiss='modal'>".$file."</a><br>";
      } 
   }
?>
</div>

<script>
	// load file
	$(document).ready(function(){
	$(".file_list a").each(function(){
		$(this).click(function(){
		var design_file_list_name =$(this).attr("title");
		var design_file_class=$(this).attr("class");
		//alert(design_file_list_name);
		$.post('select-design-file-action.php', { design_file_list_name:design_file_list_name, design_file_class:design_file_class }, function(data){
			$(".design_veiw_file").html(data);
			});
		});
	});
	
	
	});
	
	
	
</script>
