<?php include("include/header.php") ?>
<?php if(isset($_SESSION['login_user'])){ ?>
<?php include("include/header-menu.php") ?>

<?php if(isset($_GET['FLDNAME'])){ 
$FLDNAME=$_GET['FLDNAME'];
//session_start();
$_SESSION['LoadedDesignFolderName'] = $FLDNAME;

$design_template_dir = "design-folders\\";
$design_folder_name = $_SESSION['LoadedDesignFolderName'];





if(isset($FLDNAME)){ 
?>
<div class="form-group">
<!--<input name="" type="button" class="btn btn-primary btn-sm" id="add_css_code_button" value="Add CSS File" data-toggle="modal" data-target="#add_css_modal">
<input name="" type="button" class="btn btn-success btn-sm" value="Add JS File" data-toggle="modal" data-target="#add_js_modal">
<input name="" type="button" class="btn btn-warning btn-sm" value="Add Images" data-toggle="modal" data-target="#add_images_modal">-->


<!-- add file links open -->
<div class="btn-group">
  <button type="button" class="btn btn-danger btn-sm">Add links</button>
  <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="javascript:void(0);" data-toggle="modal" id="add_css_modal_btn" data-target="#add_css_modal">Add CSS link</a></li>
    <li><a href="javascript:void(0);" data-toggle="modal" id="add_js_modal_btn" data-target="#add_js_modal">Add JS link</a></li>
    <li><a href="javascript:void(0);" data-toggle="modal" id="add_images_modal_btn" data-target="#add_images_modal">Add Images link</a></li>
  </ul>
</div>
<!-- add file links closed -->

<!-- upload button group open -->
<div class="btn-group">
  <button type="button" class="btn btn-danger btn-sm">Upload Files</button>
  <button type="button" class="btn btn-danger btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="caret"></span>
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <ul class="dropdown-menu">
    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#upload_css_modal">Upload CSS Files</a></li>
    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#upload_js_modal">Upload JS Files</a></li>
    <li><a href="javascript:void(0);" data-toggle="modal" data-target="#upload_image_modal">Upload Images</a></li>
  </ul>
</div>
<!-- upload button group closed -->

<!--<a href="javascript:void(0);" data-toggle="modal" data-target="#create_file_modal" class="btn btn-warning btn-sm">Create Files</a>-->

<a href="javascript:void(0);" data-toggle="modal" title="<?php echo $FLDNAME; ?>" id="load_files" data-target="#load_files_modal" class="btn btn-warning btn-sm">Create / load Files</a>

<a href="javascript:void(0);" data-toggle="modal" data-target="#add_tags_modal" class="btn btn-warning btn-sm">Add Tags</a>

<a href="edit-design-css.php?FLDNAME=<?php echo $FLDNAME; ?>" class="btn btn-warning btn-sm">Edit CSS</a>

<a href="<?php echo "design-folders/".$FLDNAME; ?>" target="_blank" class="btn btn-warning btn-sm pull-right">View live</a>
</div>



<?php include("include/file-list.php"); ?>


<div class="design_veiw_file"></div>

<div class="code-previewer-area">
    <div class="btn-group btn-group-toggle" data-toggle="buttons">
        <label class="btn btn-primary active"><input type="radio" name="options" id="html" autocomplete="off" checked> HTML</label>
        <label class="btn btn-success"><input type="radio" name="options" id="css" autocomplete="off">CSS</label>
        <label class="btn btn-danger"><input type="radio" name="options" id="jquery" autocomplete="off"> Jquery</label>
    </div>
    <div class="code-previewer-content-area">
        <div data-tabContentName="html" class="code-previewer-content no-padding active">
            <!-- html section start -->
            <textarea class="form-control" id="design_html_code"><?php echo file_get_contents($design_template_dir.$design_folder_name.'\index.html'); ?></textarea>
            <!-- html section ended -->
        </div>
        <div data-tabContentName="css" class="code-previewer-content no-padding">
            <!-- css section start -->
            <textarea id="code_for_css" name="code_for_css">
              <?php echo file_get_contents($design_template_dir.$design_folder_name.'\assets\css\\'.$design_folder_name.'.css'); ?>
            </textarea>
            <!-- css section ended -->
        </div>
        <div data-tabContentName="jquery" class="code-previewer-content no-padding">
            <!-- jquery section start -->
            <textarea id="code_for_js" name="code_for_js"></textarea>
            <!-- jquery section ended -->
        </div>
    </div>
</div>




<!-- <textarea id="code_for_css" name="code_for_css">
.class-name{
  width:100%;
  color:#ff0000;
}
</textarea>

<textarea id="code_for_js" name="code_for_js">
function name(){
  var variable = $('selector').val();
}
</textarea> -->



<!-- modal -->
<?php $FLDNAME=$_GET['FLDNAME']; ?>
<?php include("modals/add_css_modal.php") ?>
<?php include("modals/add_js_modal.php") ?>
<?php include("modals/add_images_modal.php") ?>
<?php include("modals/upload_css_modal.php") ?>
<?php include("modals/upload_js_modal.php") ?>
<?php include("modals/upload_image_modal.php") ?>
<?php include("modals/load_files_modal.php") ?>
<?php include("modals/add_tags_modal.php") ?>
<?php //include("modals/edit-design-html.php") ?>
<?php include("modals/create_new_file_modal.php") ?>


<?php }else{
header("location:index.php");	

?>

<?php } } ?>




<script>
$(document).ready(function(){
	$("#code_msg").fadeOut(500);
	$("#update_code_button").click(function(){
		var folder_nm = $("#folder_nm").val();
	var edit_code = $("#edit_code").val();
	$.post('action.php', { folder_nm:folder_nm, edit_code:edit_code }, function(data){
		$("#code_msg").fadeIn(500);
		$("#code_msg").html(data);
		$("#code_msg").delay(2000).fadeOut(500);
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
window.editor_html = CodeMirror.fromTextArea(document.getElementById("design_html_code"), {
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


window.editor_css = CodeMirror.fromTextArea(document.getElementById("code_for_css"), {
  mode: "text/css",
  theme: 'erlang-dark',
  autoCloseBrackets: true,
  styleActiveLine: true,
  lineNumbers: true,
  lineWrapping: true,
  foldGutter: true,
  matchTags: {bothTags: true},
  gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"]
});


window.editor_js = CodeMirror.fromTextArea(document.getElementById("code_for_js"), {
  mode: "javascript",
  theme: 'erlang-dark',
  autoCloseBrackets: true,
  styleActiveLine: true,
  lineNumbers: true,
  lineWrapping: true,
  foldGutter: true,
  matchBrackets: true
});




/*
var modeInput = document.getElementById("mode");
var val = modeInput.value, m, mode, spec;
if (m = /.+\.([^.]+)$/.exec(val)) {
    var info = CodeMirror.findModeByExtension(m[1]);
    if (info) {
      mode = info.mode;
      spec = info.mime;
    }
  } else if (/\//.test(val)) {
    var info = CodeMirror.findModeByMIME(val);
    if (info) {
      mode = info.mode;
      spec = val;
    }
  } else {
    mode = spec = val;
  }
  if (mode) {
    editor.setOption("mode", spec);
    CodeMirror.autoLoadMode(editor, mode);
  } else {
    alert("Could not find a mode corresponding to " + val);
  }
*/


</script>


<?php include("include/footer.php") ?>
<?php }else{ ?>
<?php include("include/login.php") ?>
<?php include("include/footer.php") ?>
<?php } ?> 



