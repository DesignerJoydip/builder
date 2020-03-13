<?php
if(isset($_POST['get_designmainsubfolder'])){

    echo $get_designmainsubfolder = $_POST['get_designmainsubfolder'];
    echo $get_designsubfoldername = $_POST['get_designsubfoldername'];
    $file_extension_name = strstr($get_designsubfoldername, '.');
    $onlyfile_extension_name = str_replace(".", "", $file_extension_name);
   
?>



<h2><?php echo $get_designsubfoldername; ?></h2>
<div id="design_msg"></div>
<input name="" type="text" id="design_folder_name_new_edit" value="<?php echo $get_designmainsubfolder; ?>" />
<input name="" type="text" id="design_file_name_new_edit" value="<?php echo $get_designsubfoldername; ?>" />
<input name="" type="text" id="design_file_extension_new_edit" value="<?php echo $onlyfile_extension_name; ?>" />
<div class="form-group">
<textarea class="form-control" id="design_file_code"><?php echo file_get_contents($get_designmainsubfolder."\\".$get_designsubfoldername); ?></textarea>
</div>
<div class="form-group">
<input name="" type="button" class="btn btn-danger pull-right" id="update_design_code_button" value="UPDATE">
</div>



<script>
$(document).ready(function(){

	
// code save	
	$("#update_design_code_button").click(function(){
		//alert();
		$("#design_msg").fadeIn(2000);
		var design_folder_name_new_edit = $("#design_folder_name_new_edit").val();
		var design_file_name_new_edit = $("#design_file_name_new_edit").val();
		var design_file_extension_new_edit = $("#design_file_extension_new_edit").val();
		//var value = editor.getValue();
		//console.log(value);
		var design_file_code_new_edit = editor.getValue();
		//alert(design_file_name);
		$.post("action.php", { design_folder_name_new_edit:design_folder_name_new_edit, design_file_name_new_edit:design_file_name_new_edit, design_file_code_new_edit:design_file_code_new_edit, design_file_extension_new_edit:design_file_extension_new_edit }, function(data){
			$("#design_msg").fadeIn(2000);
			$("#design_msg").html(data);
			$("#design_msg").delay(3000).fadeOut(1000);
		});

});
	
});


</script>

<script>
	/*var dummy = {
  attrs: {
    color: ["red", "green", "blue", "purple", "white", "black", "yellow"],
    size: ["large", "medium", "small"],
    description: null
  },
  children: []
};*/

var tags = {
  "!top": ["top"],
  "!attrs": {
    id: null,
    class: []
  },
  top: {
    attrs: {
      lang: ["en", "de", "fr", "nl"],
      freeform: null
    },
    children: ["animal", "plant"]
  },
  animal: {
    attrs: {
      name: null,
      isduck: ["yes", "no"]
    },
    children: ["wings", "feet", "body", "head", "tail"]
  },
  plant: {
    attrs: {name: null},
    children: ["leaves", "stem", "flowers"]
  },
  //wings: dummy, feet: dummy, body: dummy, head: dummy, tail: dummy,
  //leaves: dummy, stem: dummy, flowers: dummy
};


function completeAfter(cm, pred) {
  var cur = cm.getCursor();
  if (!pred || pred()) setTimeout(function() {
    if (!cm.state.completionActive)
      cm.showHint({completeSingle: false});
  }, 100);
  return CodeMirror.Pass;
}

function completeIfAfterLt(cm) {
  return completeAfter(cm, function() {
    var cur = cm.getCursor();
    return cm.getRange(CodeMirror.Pos(cur.line, cur.ch - 1), cur) == "<";
  });
}

function completeIfInTag(cm) {
  return completeAfter(cm, function() {
    var tok = cm.getTokenAt(cm.getCursor());
    if (tok.type == "string" && (!/['"]/.test(tok.string.charAt(tok.string.length - 1)) || tok.string.length == 1)) return false;
    var inner = CodeMirror.innerMode(cm.getMode(), tok.state).state;
    return inner.tagName;
  });
}



var nonEmpty = false;
window.editor = CodeMirror.fromTextArea(document.getElementById("design_file_code"), {
  //mode: "text/javascript",
  mode: "text/html",
  //mode: "xml",
  theme: 'vibrant-ink',
  styleActiveLine: true,
  lineNumbers: true,
  lineWrapping: true,
  foldGutter: true,
  matchTags: {bothTags: true},
  gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"],
  extraKeys: {
          "'<'": completeAfter,
          "'/'": completeIfAfterLt,
          "' '": completeIfInTag,
          "'='": completeIfInTag,
          "Ctrl-Space": "autocomplete"
        },
        hintOptions: {schemaInfo: tags}
});
</script>


<?php

die();
}