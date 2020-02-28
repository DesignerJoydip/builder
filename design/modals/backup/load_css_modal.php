<!-- Modal -->
<div class="modal fade" id="load_css_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Load CSS files</h4>
      </div>
      <div class="modal-body">
        
        <div class="css_file_list">
<?php
$log_directory = 'design-folders/'.$FLDNAME.'/css/';

$results_array = array();

if (is_dir($log_directory))
{
        if ($handle = opendir($log_directory))
        {
                //Notice the parentheses I added:
                while(($file = readdir($handle)) !== FALSE)
                {
                        $results_array[] = $file;
                }
                closedir($handle);
        }
}

//Output findings
$count=1;
foreach($results_array as $value)
{ 
//echo $value . '<br />';
$count++;
if($count>3){
?>
<a data-dismiss="modal" title="<?php echo $FLDNAME."|".$value ?>"><?php echo $value ?></a><br>   
 <?php }else{ ?>
 
<?php } } ?>
</div>
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<script>
$(".add_css_property_button").on('click', function() {
// get value
var css_classORid = $("#css_classORid").val();
var sel_css_property = $(".css_property_row").find('input[type=checkbox].css_property_Checkbox:checked').map(function(_, el) {
 return $(el).val()+":"+$(this).parent().find(".property_field").val();
 }).get().join('; ');
 //alert(sel_css_property+";");
 
// paste into textarea	
var caretPos = document.getElementById("edit_code_css").selectionStart;
var textAreaTxt = $("#edit_code_css").val();
var txtToAdd = css_classORid+"{\n"+sel_css_property+"; \n}\n";
$("#edit_code_css").val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );
 
});

</script>