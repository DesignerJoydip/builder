<?php
if(isset($_POST['folder_name'])){
	$folder_name=$_POST['folder_name'];
	
	if($folder_name==''){
		echo '<div class="alert alert-warning">Please give a name</div>';
	}else{
		
		$final_folder_name = preg_replace('#[ -]+#', '-', $folder_name);
	
if (!file_exists("projects/".$final_folder_name)) {
    mkdir("projects/".$final_folder_name, 0777, true);
	mkdir("projects/".$final_folder_name."/css", 0777, true);
	mkdir("projects/".$final_folder_name."/js", 0777, true);
	mkdir("projects/".$final_folder_name."/images", 0777, true);
	mkdir("projects/".$final_folder_name."/fonts", 0777, true);
	copy("template/jquery.min.js", "projects/".$final_folder_name."/js/jquery.min.js");
	$indexFile = fopen("projects/".$final_folder_name."/index.html", "w") or die("Unable to open file!");
	$indexFileContent = '<!DOCTYPE html>
<html>
<html dir="ltr" lang="en">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="" />

<title>:'.$final_folder_name.':</title>

<!-- Favicon and Touch Icons -->
<link href="images/favicon.png" rel="shortcut icon" type="image/png">
<link href="images/apple-touch-icon.png" rel="apple-touch-icon">
<link href="images/apple-touch-icon-72x72.png" rel="apple-touch-icon" sizes="72x72">
<link href="images/apple-touch-icon-114x114.png" rel="apple-touch-icon" sizes="114x114">
<link href="images/apple-touch-icon-144x144.png" rel="apple-touch-icon" sizes="144x144">

<!-- theme css -->
<link href="css/'.$final_folder_name.'.css" rel="stylesheet">

<!-- min script file -->
<script src="js/jquery.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js does not work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
hi, this is your template.
</body>
</html>';
	fwrite($indexFile, $indexFileContent);
	
	$styleFile = fopen("projects/".$final_folder_name."/css/".$final_folder_name.".css", "w") or die("Unable to open file!");
	//$styleFileContent = 'body{ background:#ccc;}';
	//fwrite($styleFile, $styleFileContent);
	
/*	$headerFile = fopen("design-folders/".$final_folder_name."/header.php", "w") or die("Unable to open file!");
	$headerFileContent = '<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:'.$final_folder_name.':</title>
<!-- theme css -->
<link href="css/'.$final_folder_name.'.css" rel="stylesheet">

<!-- min script file -->
<script src="js/jquery.min.js"></script>
</head>
<body>';
fwrite($headerFile, $headerFileContent);

$footerFile = fopen("design-folders/".$final_folder_name."/footer.php", "w") or die("Unable to open file!");
$footerFileContent = '</body>
</html>';
fwrite($footerFile, $footerFileContent);*/
		
	echo '<div class="alert alert-success">successfully created.</div>';
	?>
<script>window.location.href = '<?php echo "view-project.php?FLDNAME=".$final_folder_name; ?>';</script>
<?php
}else{
	echo '<div class="alert alert-danger">Folder already exists.</div>';
}	
	}

die();
}
?>
<?php
// zip

if(isset($_POST['zip_folder_name'])){
	$zip_folder_name=$_POST['zip_folder_name'];

$the_folder = 'design-folders/'.$zip_folder_name;
$zip_file_name = "zip/".$zip_folder_name.'.zip';

echo '<a href="zip/'.$zip_folder_name.'.zip" class="btn btn-xs btn-danger pull-right create_design_zip_button" style="margin-top:-2px; margin-right:10px;">Download</a>';


$download_file= true;
//$delete_file_after_download= true; doesnt work!!


class FlxZipArchive extends ZipArchive {
    /** Add a Dir with Files and Subdirs to the archive;;;;; @param string $location Real Location;;;;  @param string $name Name in Archive;;; @author Nicolas Heimann;;;; @access private  **/

    public function addDir($location, $name) {
        $this->addEmptyDir($name);

        $this->addDirDo($location, $name);
     } // EO addDir;

    /**  Add Files & Dirs to archive;;;; @param string $location Real Location;  @param string $name Name in Archive;;;;;; @author Nicolas Heimann
     * @access private   **/
    private function addDirDo($location, $name) {
        $name .= '/';
        $location .= '/';

        // Read all Files in Dir
        $dir = opendir ($location);
        while ($file = readdir($dir))
        {
            if ($file == '.' || $file == '..') continue;
            // Rekursiv, If dir: FlxZipArchive::addDir(), else ::File();
            $do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
            $this->$do($location . $file, $name . $file);
        }
    } // EO addDirDo();
}

$za = new FlxZipArchive;
$res = $za->open($zip_file_name, ZipArchive::CREATE);
if($res === TRUE) 
{
    $za->addDir($the_folder, basename($the_folder));
    $za->close();
}
else  { //echo 'Could not create a zip archive';
}

if ($download_file)
{
    ob_get_clean();
    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private", false);
    header("Content-Type: application/zip");
    header("Content-Disposition: attachment; filename=" . basename($zip_file_name) . ";" );
    header("Content-Transfer-Encoding: binary");
    header("Content-Length: " . filesize($zip_file_name));
    //readfile($zip_file_name);
	echo '<a href="zip/'.$zip_folder_name.'.zip" class="btn btn-xs btn-danger pull-right create_design_zip_button" style="margin-top:-2px; margin-right:10px;">Download</a>';

}

die();
}

?>


<?php
if(isset($_POST['folder_nm'], $_POST['edit_code'])){
	$folder_nm = $_POST['folder_nm'];
	$edit_code = $_POST['edit_code'];
	
$oldMessage = file_get_contents('design-folders/'.$folder_nm.'/index.html');

$txt=$edit_code;
$deletedFormat = $txt;

//read the entire string
$str=file_get_contents('design-folders/'.$folder_nm.'/index.html');

//replace something in the file string - this is a VERY simple example
$str=str_replace("$oldMessage", "$deletedFormat",$str);

//write the entire string
file_put_contents('design-folders/'.$folder_nm.'/index.html', $str);
	
echo "<div class='alert alert-success'>Sucessfully Updated.</div>";	

die();
}
?>



<?php
// load css file
if(isset($_POST['css_file_name'])){
	$css_file_name=$_POST['css_file_name'];
	$css_folder_name =substr($css_file_name, 0, strpos($css_file_name, "|"));
	$css_only_file_name =substr(strstr($css_file_name, '|'), strlen('|'));
	
	$load_css_file=file_get_contents('design-folders/'.$css_folder_name.'/css/'.$css_only_file_name);
echo '<h3>File Name:'.$css_only_file_name.'</h3><div id="code_css_msg"></div><input type="hidden" name="folder_nm" id="folder_nm_css" value="'.$css_folder_name.'"><input type="hidden" name="folder_only_css_file_nm" id="folder_only_css_file_nm" value="'.$css_only_file_name.'"><div class="form-group"><textarea class="form-control" id="edit_code_css">'.$load_css_file.'</textarea></div><div class="form-group">
<input name="" type="submit" class="btn btn-danger pull-right" id="update_code_css_button" value="UPDATE">
</div>';	
?>
<script>
$(document).ready(function(){
	//$("#code_css_msg").fadeOut(500);
	
	$("#update_code_css_button").click(function(){
	var folder_nm_css = $("#folder_nm_css").val();
	var folder_only_css_file_nm = $("#folder_only_css_file_nm").val();
	var edit_code_css = $("#edit_code_css").val();
	
	$.post('action.php', { folder_nm_css:folder_nm_css, folder_only_css_file_nm:folder_only_css_file_nm, edit_code_css:edit_code_css }, function(data){
		$("#code_css_msg").fadeIn(500);
		$("#code_css_msg").html(data);
		$("#code_css_msg").delay(2000).fadeOut(500);
	});
		});
});
</script>
<?php	
	
die();	
}
?>

<?php
// add and updata css
if(isset($_POST['folder_nm_css'], $_POST['folder_only_css_file_nm'], $_POST['edit_code_css'])){
	$folder_nm_css = $_POST['folder_nm_css'];
	$folder_only_css_file_nm = $_POST['folder_only_css_file_nm'];
	$edit_code_css = $_POST['edit_code_css'];
	$design_folder_with_file_name='design-folders/'.$folder_nm_css.'/css/'.$folder_only_css_file_nm;
		
//$oldMessage = file_get_contents('design-folders/'.$folder_nm_css.'/css/'.$folder_only_css_file_nm);

//$txt=$edit_code_css;
//$deletedFormat = $txt;

//read the entire string
//$str=file_get_contents('design-folders/'.$folder_nm_css.'/css/'.$folder_only_css_file_nm);

//replace something in the file string - this is a VERY simple example
//$str=str_replace("$oldMessage", "$deletedFormat",$str);

//write the entire string
//file_put_contents('design-folders/'.$folder_nm_css.'/css/'.$folder_only_css_file_nm, $str);

file_put_contents($design_folder_with_file_name, $edit_code_css);
	
echo "<div class='alert alert-success'>Sucessfully Updated.</div>";	

die();
}
?>


<?php
// create new file
//create_file_name:create_file_name, create_file_type:create_file_type
if(isset($_POST['create_file_mainFolder'], $_POST['create_file_name'], $_POST['create_file_type'])){
	echo $create_file_mainFolder=$_POST['create_file_mainFolder'];
	echo $create_file_name=$_POST['create_file_name'];
	echo $create_file_type=$_POST['create_file_type'];
	
if($create_file_type=='html'){
	$htmlFile = fopen("design-folders/".$create_file_mainFolder."/".$create_file_name.".html", "w") or die("Unable to open file!");
}elseif($create_file_type=='php'){
	$phpFile = fopen("design-folders/".$create_file_mainFolder."/".$create_file_name.".php", "w") or die("Unable to open file!");
}elseif($create_file_type=='css'){
	$phpFile = fopen("design-folders/".$create_file_mainFolder."/css/".$create_file_name.".css", "w") or die("Unable to open file!");
}elseif($create_file_type=='js'){
	$phpFile = fopen("design-folders/".$create_file_mainFolder."/js/".$create_file_name.".js", "w") or die("Unable to open file!");
}
//$styleFile = fopen("design-folders/".$final_folder_name."/css/".$final_folder_name.".css", "w") or die("Unable to open file!");	
	
	
	
echo "<div class='alert alert-success'>Sucessfully Updated.</div>";
die();
}

?>

<?php
// edit code action
if(isset($_POST['design_folder_name'], $_POST['design_file_name'], $_POST['design_file_code'])){
$design_folder_name=$_POST['design_folder_name'];
$design_file_name=$_POST['design_file_name'];
$design_file_code=$_POST['design_file_code'];

file_put_contents($design_file_name, $design_file_code);

echo '<div class="alert alert-success">Code successfully updated.</div>';	
die();

}

?>




