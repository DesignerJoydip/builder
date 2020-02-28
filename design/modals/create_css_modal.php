<!-- Modal -->
<div class="modal fade" id="create_css_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create CSS</h4>
      </div>
      <div class="modal-body">
        <?php //echo $FLDNAME; ?>
        <div class="form-group">
        <label>class /ID name</label>
        <input type="text" class="" value="" id="css_classORid">
        </div>
        <div class="form-group">
        <label style="width:100%; display:block;">CSS Property</label>
            <div class="css_property_row checkbox">
            <label>
            <input class="css_property_Checkbox" type="checkbox" value="width" />
            <span>Width</span>
            <input type="text" class="property_field" value="">
            </label>
            </div>
            <div class="css_property_row checkbox padding">
            <label>
			<input class="css_property_Checkbox" type="checkbox" value="height" />
            <span>Height</span>
            <input type="text" class="property_field" value="">
            </label>
            </div>
            
            <div class="css_property_row checkbox">
            <label>
			<input class="css_property_Checkbox" type="checkbox" value="float" />
            <span>Float</span>
            <select class="property_field">
            	<option value="none">none</option><option value="left">left</option><option value="right">right</option>
            </select>
            </label>
            </div>
            <div class="css_property_row checkbox padding">
            <label>
			<input class="css_property_Checkbox" type="checkbox" value="background" />
            <span>Background</span>
            <input type="text" class="property_field" value="">
            </label>
            </div>
            
            <div class="css_property_row checkbox">
            <label>
			<input class="css_property_Checkbox" type="checkbox" value="background-color" />
            <span>Bg color</span>
            <input type="text" class="property_field" value="">
            </label>
            </div>
            <div class="css_property_row checkbox padding">
            <label>
			<input class="css_property_Checkbox" type="checkbox" value="background-image" />
            <span>Bg Image</span>
            <input type="text" class="property_field" value="url()">
            </label>
            </div>
            
            <div class="css_property_row checkbox">
            <label>
			<input class="css_property_Checkbox" type="checkbox" value="background-repeat" />
            <span>Bg repeat</span>
            <select class="property_field">
            	<option value="no-repeat">no-repeat</option><option value="repeat">repeat</option>
                <option value="repeat-x">repeat-x</option><option value="repeat-y">repeat-y</option>
            </select>
            </label>
            </div>
            <div class="css_property_row checkbox padding">
            <label>
			<input class="css_property_Checkbox" type="checkbox" value="background-position" />
            <span>Bg position</span>
            <select class="property_field">
            	<option value="bottom">bottom</option><option value="center">center</option>
                <option value="left">left</option><option value="right">right</option><option value="top">top</option>
            </select>
            </label>
            </div>
            
            <div class="css_property_row checkbox">
            <label>
			<input class="css_property_Checkbox" type="checkbox" value="background-size" />
            <span>Bg size</span>
            <select class="property_field">
            	<option value="auto">auto</option><option value="contain">contain</option>
                <option value="cover">cover</option>
            </select>
            </label>
            </div>
            <div class="css_property_row checkbox padding">
            <label>
			<input class="css_property_Checkbox" type="checkbox" value="background-attachment" />
            <span>Bg attach</span>
            <select class="property_field">
            	<option value="fixed">fixed</option><option value="scroll">scroll</option>
                <option value="local">local</option><option value="inherit">inherit</option>
            </select>
            </label>
            </div>
            
            <div class="css_property_row checkbox">
            <label>
			<input class="css_property_Checkbox" type="checkbox" value="z-index" />
            <span>z-index</span>
            <input type="text" class="property_field" value="">
            </label>
            </div>
            <div class="css_property_row checkbox padding">
            <label>
			<input class="css_property_Checkbox" type="checkbox" value="position" />
            <span>Position</span>
            <select class="property_field">
            	<option value="absolute">absolute</option><option value="relative">relative</option>
                <option value="fixed">fixed</option><option value="static">static</option>
                <option value="inherit">inherit</option>
            </select>
            </label>
            </div>
            
            <div class="css_property_row checkbox">
            <label>
			<input class="css_property_Checkbox" type="checkbox" value="border" />
            <span>Border</span>
            <input type="text" class="property_field" value="">
            </label>
            </div>
            <div class="css_property_row checkbox padding">
            <label>
			<input class="css_property_Checkbox" type="checkbox" value="border-color" />
            <span>border color</span>
            <input type="text" class="property_field" value="">
            </label>
            </div>
            
            
        </div>
        
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_css_property_button" data-dismiss="modal">Insert</button>
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
/*var caretPos = document.getElementById("edit_code_css").selectionStart;
var textAreaTxt = $("#edit_code_css").val();
var txtToAdd = css_classORid+"{\n"+sel_css_property+"; \n}\n";
$("#edit_code_css").val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );
 */
});

</script>