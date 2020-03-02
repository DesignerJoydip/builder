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
        <div class="foldername" title="<?php echo $FLDNAMEE; ?>"></div>
        <!--tab open -->
        <div class="pop_tab_area">
          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#loadHtml" data-loadoption="html">Load HTML / PHP</a></li>
            <!--<li><a href="#loadphp" data-loadoption="php">Load php</a></li>-->
            <li><a href="#loadcss" data-loadoption="css">Load CSS</a></li>
            <li><a href="#loadjs" data-loadoption="js">Load JS</a></li>
          </ul>
          <div class="tab-content"> 
          
          <!-- form open -->
          <input type="hidden" value="<?php echo $FLDNAMEE; ?>" id="create_file_mainFolder">
          <div hidden>
      <select class="form-control" id="create_file_type"><option value="html">HTML</option><option value="php">PHP</option>
		<option value="css">CSS</option><option value="js">JS</option>
      </select>
      </div>
      <div class="form-group" style="margin-top:15px; margin-bottom:0px; width:100%; display:inline-block;">
      <div class="row">
    		<div class="col-sm-8"><input type="text" class="form-control" placeholder="File Name" id="create_file_name"></div>
            <div class="col-sm-4"><button type="button" class="btn btn-block btn-success" id="create_file_modal_button">Create</button></div>
            </div>
  	  </div>
  <!--<div class="form-group">
    <button type="button" class="btn btn-success" id="create_file_modal_button">Create</button>
  </div>-->
 

      <!-- form closed -->
          
          
          
          
            <!-- tab html content open -->
            <div class="tab-pane active" id="loadHtml">
              <div id="load_html_files"></div>
            </div>
            <!-- tab html content closed -->
            
            <!-- tab php content closed -->
           <!--<div class="tab-pane" id="loadphp">
              <div id="load_php_files"></div>
            </div>-->
            <!-- tab php content closed --> 
            
            <!-- tab css content closed -->
            <div class="tab-pane" id="loadcss">
              <div id="load_css_files"></div>
            </div>
            <!-- tab css content closed --> 
            
            <!-- tab js content closed -->
            <div class="tab-pane" id="loadjs">
              <div id="load_js_files"></div>
            </div>
            <!-- tab js content closed --> 
            
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
	$("#create_file_type").val("html");
// tab script
$('#myTab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
  var loadFileType =$(this).attr("data-loadoption");
  //alert(loadFileType);
  $("#create_file_type").val(loadFileType);
})

// load Folder name
/*var FolderName = $(".foldername").html();*/
var FolderName = $(".foldername").attr("title");
//alert(FolderName);

// load HTML file from "css" folder
function auto_load_html_file(){
        $.ajax({
          url: "load-files/load-html-files.php",
          cache: false,
          success: function(data){
             $("#load_html_files").html(data);
          } 
        });
}

// load HTML file from "php" folder
function auto_load_php_file(){
        $.ajax({
          url: "load-files/load-php-files.php",
          cache: false,
          success: function(data){
             $("#load_php_files").html(data);
          } 
        });
}

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

// load css file from "js" folder
function auto_load_js_file(){
        $.ajax({
          url: "load-files/load-js-files.php",
          cache: false,
          success: function(data){
             $("#load_js_files").html(data);
          } 
        });
}
	  
	  
// auto load all directory files
$(document).ready(function(){
	auto_load_html_file();
	auto_load_php_file();
	auto_load_css_file(); 
	auto_load_js_file();
});
 
//Refresh auto_load() function after 10000 milliseconds
setInterval(auto_load_html_file,1000);	
setInterval(auto_load_php_file,1000);
setInterval(auto_load_css_file,1000);	
setInterval(auto_load_js_file,1000);







$("#create_file_modal_button").click(function(){
var create_file_mainFolder=$("#create_file_mainFolder").val();
var create_file_name=$("#create_file_name").val();
var create_file_type=$("#create_file_type").val();
if(create_file_name=='' || create_file_type=='0'){
//alert("required");
	$("#create_file_name").css("border","#ff0000 solid 1px");
	$("#create_file_type").css("border","#ff0000 solid 1px");
	
}else{
	$("#create_file_name").css("border","#000 solid 1px");
	$("#create_file_type").css("border","#000 solid 1px");
	$.post("action.php",{ create_file_mainFolder:create_file_mainFolder, create_file_name:create_file_name, create_file_type:create_file_type }, function(data){
		
		$("#create_file_name").val('');
		$("#create_file_msg").fadeIn();
		$("#create_file_msg").html(data);
		$("#create_file_msg").delay(2000).fadeOut();
		})
}
	});
	
	
	
});


</script> 
