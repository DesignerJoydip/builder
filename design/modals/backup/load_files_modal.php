<?php //$FLDNAME=$_GET['FLDNAME']; ?>
<?php $FLDNAMEE=$_SESSION['LoadedDesignFolderName'] ?>
<!-- Modal -->

<div class="modal fade" id="load_files_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">List of files</h4>
      </div>
      <div class="modal-body" id="add_css_phpcode"> 
        <div class="foldername" title=""><?php echo $FLDNAMEE; ?></div>
        <!--tab open -->
        <div>
          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#loadHtml">Load HTML</a></li>
            <li><a href="#loadcss">Load CSS</a></li>
            <li><a href="#loadjs">Load JS</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="loadHtml">
              <!--<div class="bs-callout bs-callout-warning file_list ">--> 
                	<div id="load_css_files"></div>
                    
                    
                    <?php
/*$dir = 'design-folders/'.$FLDNAMEE.'/';
foreach (glob($dir."*.*") as $filename) {
    echo "<a href='#' title='".base64_encode($filename.'|'.$FLDNAMEE)."'  data-dismiss='modal'>".$filename."</a><br>";
}*/
?>
              <!--</div>-->
            </div>
            <!-- tab content closed -->
            <div class="tab-pane" id="loadcss">
              <div class="bs-callout bs-callout-warning file_list ">
                <?php
$dir = 'design-folders/'.$FLDNAME.'/css/';
foreach (glob($dir."*.*") as $filename) {
    echo "<a href='#' title='".base64_encode($filename.'|'.$FLDNAME)."'  data-dismiss='modal'>".$filename."</a><br>";
}
?>
              </div>
            </div>
            <!-- tab content closed --> 
            
            <!-- tab content closed -->
            <div class="tab-pane" id="loadjs">
              <div class="bs-callout bs-callout-warning file_list ">
                <?php
$dir = 'design-folders/'.$FLDNAME.'/js/';
foreach (glob($dir."*.*") as $filename) {
    echo "<a href='#' title='".base64_encode($filename.'|'.$FLDNAME)."'  data-dismiss='modal'>".$filename."</a><br>";
}
?>
              </div>
            </div>
            <!-- tab content closed --> 
            
          </div>
        </div>
        <!--tab closed --> 
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>

// select file from list on click
$(document).ready(function(){
	
// tab script
$('#myTab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
})
	
	

// load Folder name
var FolderName = $(".foldername").html();
//alert(FolderName);

// load css file from "css" folder
function auto_load_css_file(){
        $.ajax({
          url: "load-files/load-css-files.php",
          cache: false,
          success: function(data){
             $("#load_css_files").html(data);
          } 
        });
}
	  
	  
// auto load all directory files
$(document).ready(function(){
  auto_load_css_file(); //Call auto_load() function when DOM is Ready
});
 
//Refresh auto_load() function after 10000 milliseconds
setInterval(auto_load_css_file,1000);	
	
});


</script> 
