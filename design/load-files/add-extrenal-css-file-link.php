<?php 
session_start();
$FLDNAMEE=$_SESSION['LoadedDesignFolderName'] 
?>

      <div class="modal-body">
      <div class="has-success"> 
      <?php
	  echo $FLDNAMEE;
$count=1;
		$path = "../design-folders/".$FLDNAMEE."/css/";
$files = scandir($path);
foreach ($files as &$value) {
	if($count++<=2){}else{
	$count++;
    //echo "<a href='http://localhost/".$value."' target='_black' >".$value."</a><br/>";
	?>
    <div class="checkbox bg-success">
    <label> <input type="radio" class="css_Checkbox"  name="add_css" value="<?php echo $value; ?>"> <?php echo $value; ?></label>
    </div>
    <?php
} }
		?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_css_url"  data-dismiss="modal">Insert CSS</button>
      </div>





<script>
$(document).ready(function(){
//alert();
	
$(".add_css_url").on('click', function() {
// get value		
var sel = $('input[type=radio].css_Checkbox:checked').map(function(_, el) {
 return $(el).val();
 }).get();
 //alert(sel);
var streetaddress= /[^.]*/.exec(sel)[0]; 
//alert(streetaddress);
 
// paste into textarea	
var caretPos = document.getElementById("design_file_code").selectionStart;
var textAreaTxt = $("#design_file_code").val();
var txtToAdd = '<link href="css/'+sel+'" rel="stylesheet"/>';
$("#design_file_code").val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );

});


});

</script>