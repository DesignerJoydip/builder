<?php $FLDNAME=$_GET['FLDNAME']; ?>

<!-- Modal -->
<div class="modal fade" id="add_images_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">List of Images files</h4>
      </div>
      
      
      <div id="load_external_images_file_link"></div>
      
      
      
    </div>
  </div>
</div>

<script>
$(document).ready(function(){


// load HTML file from "css" folder
function auto_load_external_images_file_link(){
        $.ajax({
          url: "load-files/add-extrenal-images-file-link.php",
          cache: false,
          success: function(data){
             $("#load_external_images_file_link").html(data);
          } 
        });
}



// auto load all directory files
$(document).ready(function(){
	auto_load_external_images_file_link();
	
	$("#add_images_modal_btn").click(function(){
		auto_load_external_images_file_link();
	});
	
});
 
//Refresh auto_load() function after 10000 milliseconds
//setInterval(auto_load_external_images_file_link,1000);	





});
</script>
