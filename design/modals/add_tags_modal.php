<?php $FLDNAME=$_GET['FLDNAME']; ?>

<!-- Modal -->
<div class="modal fade" id="add_tags_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">List of Tag and Attr</h4>
      </div>
      <div class="modal-body" id="add_css_phpcode">
      <div class="has-success">
      
      <div class="checkbox bg-success">
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='<div></div>'> div</label>
     <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='<span></span>'> span</label>
     <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='<small></small>'> small</label>
     <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='<h1></h1>'> h1</label>
     <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='<h2></h2>'> h2</label>
     <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='<h3></h3>'> h3</label>
     <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='<h4></h4>'> h4</label>
     <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='<h5></h5>'> h5</label>
     <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='<h6></h6>'> h6</label>
     <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='<p></p>'> p</label>
     <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='<header></header>'> header</label>
     <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='<footer></footer>'> footer</label>
     <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='<section></section>'> section</label>
     <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='<article></article>'> article</label>
     <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='<nav></nav>'> nav</label>
    </div>
      
      <div class="checkbox bg-success">
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value=' class=""'> class</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value=' id=""'> id</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value=' title=""'> title</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value=' href=""'> href</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value=' alt=""'> alt</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value=' border=""'> border</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value=' doc_data-value=""'> doc_data-value</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value=' if( ){ }else{ }'>if else</label>
    </div> 
    
    <div class="checkbox bg-success">
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='[ ]'> [ ]</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='{ }'> { }</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='<'> < </label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='>'> > </label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='?'> ?</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='php'> php</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='/'> /</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='\'> \</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='|'> |</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='_'> _</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='-'> -</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value=':'> :</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value=';'>;</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='""'> ""</label>
    <label> <input type="radio"  class="tag_Checkbox"  name="add_tag" value='%'> %</label>

    </div> 
        
   
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary add_tags"  data-dismiss="modal">Insert Tag</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
//alert();


	
$(".add_tags").on('click', function() {
// get value		
//var sel = $('input[type=radio].tag_Checkbox:checked').map(function(_, el) {
var sel = $('input[type=radio].tag_Checkbox:checked').map(function(_, el) {
	 return $(el).val();
}).get();
 //var sel = sel1.replace(/,\s*$/, '');
// paste into textarea	
var caretPos = document.getElementById("design_file_code").selectionStart;
var textAreaTxt = $("#design_file_code").val();
var txtToAdd = sel;
$("#design_file_code").val(textAreaTxt.substring(0, caretPos) + txtToAdd + textAreaTxt.substring(caretPos) );
});


});

</script>

