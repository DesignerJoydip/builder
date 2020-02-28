<?php 
session_start();
$FLDNAMEE=$_SESSION['LoadedDesignFolderName'] 
?>

<div class="modal-body">
      <div class="has-success">
        <?php
		$count=1;
		$path = "../design-folders/".$FLDNAMEE."/js/";
$files = scandir($path);
foreach ($files as &$value) {
	if($count++<=2){}else{
	$count++;
    //echo "<a href='http://localhost/".$value."' target='_black' >".$value."</a><br/>";
	?>
    <div class="checkbox bg-success">
	<input type="radio" name="add_js" class="js_Checkbox" value="<?php echo $value; ?>"> <?php echo $value; ?>
    </div>
    <?php
} }
		?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_js_url"  data-dismiss="modal">Insert Js</button>
      </div>

<script>
$(document).ready(function(){
//alert();
	
$(".add_js_url").on('click', function() {
// get value		
var sel = $('input[type=radio].js_Checkbox:checked').map(function(_, el) {
 return $(el).val();
 }).get();
// paste into textarea	
var caretPos = document.getElementById("design_file_code").selectionStart;
var textAreaTxt = $("#design_file_code").val();
//var txtToAdd = '<link href="css/'+sel+'" rel="stylesheet"/>';
var txtToAdd = '<script src="js/'+sel+'"></'+'script>';
$("#design_file_code").val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );
});

});

</script>