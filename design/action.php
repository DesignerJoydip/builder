<?php
if(isset($_POST['folder_name'])){
	$folder_name=$_POST['folder_name'];
	
	if($folder_name==''){
		echo '<div class="alert alert-warning">Please give a name</div>';
	}else{
		
		$final_folder_name = preg_replace('#[ -]+#', '-', $folder_name);
	
if (!file_exists("design-folders/".$final_folder_name)) {
    mkdir("design-folders/".$final_folder_name, 0777, true);
	mkdir("design-folders/".$final_folder_name."/assets/css", 0777, true);
	mkdir("design-folders/".$final_folder_name."/assets/js", 0777, true);
	mkdir("design-folders/".$final_folder_name."/assets/images", 0777, true);
	mkdir("design-folders/".$final_folder_name."/assets/fonts", 0777, true);
	copy("template/jquery.min.js", "design-folders/".$final_folder_name."/assets/js/jquery.min.js");
	$indexFile = fopen("design-folders/".$final_folder_name."/index.html", "w") or die("Unable to open file!");
	$indexFileContent = '<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:'.$final_folder_name.':</title>
<!-- theme css -->
<link href="css/'.$final_folder_name.'.css" rel="stylesheet">

<!-- min script file -->
<script src="js/jquery.min.js"></script>
</head>

<body>
hi, this is your template.
</body>
</html>';
	fwrite($indexFile, $indexFileContent);
	
	$styleFile = fopen("design-folders/".$final_folder_name."/assets/css/".$final_folder_name.".css", "w") or die("Unable to open file!");
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
<script>window.location.href = '<?php echo "view-design.php?FLDNAME=".$final_folder_name; ?>';</script>
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


<?php
if(isset($_POST['button_name_for_create'])){

	//, $_POST['designmainsubfolder_name_for_create'], $_POST['destinationfolder_name_for_create'], $_POST['button_name_for_create'], $_POST['newdestinationfolder_name'], $_POST['newdestinationfile_name']

	$button_name_for_create = $_POST['button_name_for_create'];
	$designmainsubfolder_name_for_create = $_POST['designmainsubfolder_name_for_create'];
	$destinationfolder_name_for_create = $_POST['destinationfolder_name_for_create'];
	$newdestinationfolder_name = $_POST['newdestinationfolder_name'];
	$newdestinationfile_name = $_POST['newdestinationfile_name'];
	$file_extensin_name = $_POST['file_extensin_name'];

	if($button_name_for_create == 'quick_add_folder'){

		if($newdestinationfolder_name == ''){
			echo '<div class="alert alert-danger">Please give a Folder name.</div>';
		}else{
			//echo "folder name:<br>";
			$new_folder_name = preg_replace('#[ -]+#', '-', $newdestinationfolder_name);

			$folder_full_root = $designmainsubfolder_name_for_create.'\\'.$destinationfolder_name_for_create.'\\'.$new_folder_name;

			if (!file_exists($folder_full_root)) {
				echo '<div class="alert alert-success">Folder created</div>';
				mkdir($folder_full_root, 0777, true);
				?>
				<script>$('#create_new_file_modal').modal('hide');</script>
				<?php
			}else{
				echo '<div class="alert alert-danger">Folder name already esits</div>';
			}	
		}
	}elseif($button_name_for_create == 'quick_add_file'){
		//echo "file name:<br>";
		$new_file_name = preg_replace('#[ -]+#', '-', $newdestinationfile_name);

		$file_full_root = $designmainsubfolder_name_for_create.'\\'.$destinationfolder_name_for_create.'\\'.$new_file_name;
		//echo "<br>";

		if($destinationfolder_name_for_create != 'html' && $destinationfolder_name_for_create != 'css' && $destinationfolder_name_for_create != 'js' && $destinationfolder_name_for_create != 'php'){

			//echo $file_full_root = $designmainsubfolder_name_for_create.'\\'.$destinationfolder_name_for_create.'\\'.$new_file_name;
			echo '<div class="alert alert-success">file created</div>';
			fopen($file_full_root.".".$file_extensin_name, "w") or die("Unable to open file!");

		}else{
			echo $file_full_root = $designmainsubfolder_name_for_create.'\\'.$destinationfolder_name_for_create.'\\'.$new_file_name;
			if (!file_exists($file_full_root)) {
				echo '<div class="alert alert-success">file created</div>';
				fopen($file_full_root.".".$file_extensin_name, "w") or die("Unable to open file!");
				?>
				<script>//$('#create_new_file_modal').modal('hide');</script>
				<?php
			}else{
				echo '<div class="alert alert-danger">file name already esits</div>';
			}
		}

		
	}

die();
}
?>




<?php

if(isset($_POST['filetype_name_for_duplicate'])){

	$filetype_name_for_duplicate = $_POST['filetype_name_for_duplicate'];
	$designmainsubfolder_name_for_duplicate = $_POST['designmainsubfolder_name_for_duplicate'];
	$old_destinationfolder_name_for_duplicate = $_POST['old_destinationfolder_name_for_duplicate'];
	$new_designmainsubfolder_name_for_duplicate = $_POST['new_designmainsubfolder_name_for_duplicate'];
	$overwrite_file_folder_name_for_duplicate = $_POST['overwrite_file_folder_name_for_duplicate'];
	$overwrite_trim_file_folder_name_for_duplicate = preg_replace('#[ -]+#', '-', $overwrite_file_folder_name_for_duplicate);

	

	echo "extension:-----".$filetype_name_for_duplicate."<br>";
	echo "desitination Folder:------".$designmainsubfolder_name_for_duplicate."<br>";
	echo "old file/folder name:------".$old_destinationfolder_name_for_duplicate."<br>";
	echo "New file/folder name:-------".$new_designmainsubfolder_name_for_duplicate."<br>";
	

	if (preg_match('/^.*\.([^.]+)$/D', $old_destinationfolder_name_for_duplicate)) {
		//echo 'is a file<br>';
		$only_file_name = strstr($old_destinationfolder_name_for_duplicate, '.', true);
		//echo '-----------------';
		$only_file_extension = pathinfo($old_destinationfolder_name_for_duplicate, PATHINFO_EXTENSION);

		$duplicate_file_full_root = $designmainsubfolder_name_for_duplicate.'\\'.$new_designmainsubfolder_name_for_duplicate.'.'.$only_file_extension;

		if($overwrite_file_folder_name_for_duplicate == ''){
			echo $new_duplicate_file_full_root = $designmainsubfolder_name_for_duplicate.'\\'.$new_designmainsubfolder_name_for_duplicate.'-copy.'.$only_file_extension;

			if (!file_exists($new_duplicate_file_full_root)) {
				echo '<div class="alert alert-success">Duplicate Done</div>';
				fopen($new_duplicate_file_full_root, "w") or die("Unable to open file!");
			}else{
				echo '<div class="alert alert-danger">File already Exist. You can Change the File Name</div>';
			}
		}else{
			echo $new_overwrite_duplicate_file_full_root = $designmainsubfolder_name_for_duplicate.'\\'.$overwrite_trim_file_folder_name_for_duplicate.'.'.$only_file_extension;
			if (!file_exists($new_overwrite_duplicate_file_full_root)) {
				echo '<div class="alert alert-success">Duplicate Done</div>';
				fopen($new_overwrite_duplicate_file_full_root, "w") or die("Unable to open file!");
			}else{
				echo '<div class="alert alert-danger">File already Exist. You can Change the File Name</div>';
			}
		}

		
	}else{
		if($overwrite_file_folder_name_for_duplicate == ''){
			//echo "is a folder<br>";
			echo $old_duplicate_file_full_root = $designmainsubfolder_name_for_duplicate.'\\'.$new_designmainsubfolder_name_for_duplicate;
			echo "<br>";
			echo $new_duplicate_folder_full_root = $designmainsubfolder_name_for_duplicate.'\\'.$new_designmainsubfolder_name_for_duplicate.'-copy';
			//mkdir($new_duplicate_folder_full_root, 0777, true);

			if (!file_exists($new_duplicate_folder_full_root)) {
				echo '<div class="alert alert-success">Duplicate Done</div>';
				function custom_copy($old_duplicate_file_full_root, $new_duplicate_folder_full_root) {  
					// open the source directory 
					$dir = opendir($old_duplicate_file_full_root);  
				
					// Make the destination directory if not exist 
					@mkdir($new_duplicate_folder_full_root);  
				
					// Loop through the files in source directory 
					foreach (scandir($old_duplicate_file_full_root) as $file) {  
						if (( $file != '.' ) && ( $file != '..' )) {  
							if ( is_dir($old_duplicate_file_full_root . '/' . $file) )  
							{  
								// Recursively calling custom copy function 
								// for sub directory  
								custom_copy($old_duplicate_file_full_root . '/' . $file, $new_duplicate_folder_full_root . '/' . $file);  
							}  
							else {  
								copy($old_duplicate_file_full_root . '/' . $file, $new_duplicate_folder_full_root . '/' . $file);  
							}  
						}  
					}  
					closedir($dir); 
				} 
				custom_copy($old_duplicate_file_full_root, $new_duplicate_folder_full_root); 
			}else{
				echo '<div class="alert alert-danger">Folder already Exist. You can Change the folder Name</div>';
			}
		}else{
			echo $old_duplicate_file_full_root = $designmainsubfolder_name_for_duplicate.'\\'.$new_designmainsubfolder_name_for_duplicate;
			echo "<br>";
			echo $new_overwrite_duplicate_folder_full_root = $designmainsubfolder_name_for_duplicate.'\\'.$overwrite_trim_file_folder_name_for_duplicate;

			if (!file_exists($new_overwrite_duplicate_folder_full_root)) {
				echo '<div class="alert alert-success">Duplicate Done</div>';
				function custom_copy($old_duplicate_file_full_root, $new_overwrite_duplicate_folder_full_root) {  
					// open the source directory 
					$dir = opendir($old_duplicate_file_full_root);  
				
					// Make the destination directory if not exist 
					@mkdir($new_overwrite_duplicate_folder_full_root);  
				
					// Loop through the files in source directory 
					foreach (scandir($old_duplicate_file_full_root) as $file) {  
						if (( $file != '.' ) && ( $file != '..' )) {  
							if ( is_dir($old_duplicate_file_full_root . '/' . $file) )  
							{  
								// Recursively calling custom copy function 
								// for sub directory  
								custom_copy($old_duplicate_file_full_root . '/' . $file, $new_overwrite_duplicate_folder_full_root . '/' . $file);  
							}  
							else {  
								copy($old_duplicate_file_full_root . '/' . $file, $new_overwrite_duplicate_folder_full_root . '/' . $file);  
							}  
						}  
					}  
					closedir($dir); 
				} 
				custom_copy($old_duplicate_file_full_root, $new_overwrite_duplicate_folder_full_root);
			}else{
				echo '<div class="alert alert-danger">Folder already Exist. You can Change the folder Name</div>';
			}
		}
		



	}
	die();
}
?>




<?php
//button_name_for_delete:button_name_for_delete, designmainsubfolder_name_for_delete:designmainsubfolder_name_for_delete, destinationfolder_name_for_delete:destinationfolder_name_for_delete
if(isset($_POST['button_name_for_delete'])){
	$button_name_for_delete = $_POST['button_name_for_delete'];
	$designmainsubfolder_name_for_delete = $_POST['designmainsubfolder_name_for_delete'];
	$destinationfolder_name_for_delete = $_POST['destinationfolder_name_for_delete'];

	//echo $designmainsubfolder_name_for_delete."\\".$destinationfolder_name_for_delete;
	
	if (preg_match('/^.*\.([^.]+)$/D', $destinationfolder_name_for_delete)) {
		echo "Delete File";
		unlink($designmainsubfolder_name_for_delete."\\".$destinationfolder_name_for_delete);
		?>
			<script>$('#delete_file_folder_modal').modal('hide');</script>
		<?php
	}else{
		$innerfileslist = scandir($designmainsubfolder_name_for_delete."\\".$destinationfolder_name_for_delete);
		$num_files = count($innerfileslist)-2;
		if($num_files != 0){
			echo '<div class="alert alert-danger">This Folder is not Empty.</div>';
			//include("modals/file.php");
			?>
				<script>
				//alert("hi");
				$("#delete_final_folder_modal").delay(5000).modal('show');
					
					setTimeout(function(){
						//$('#delete_file_folder_modal').modal('hide');
					}, 3000);
					$("#file_folder_deleted_final_msg").fadeIn(500);
				</script>
			<?php
		}else{
			echo "Delete Folder";
			rmdir($designmainsubfolder_name_for_delete."\\".$destinationfolder_name_for_delete);
			?>
				<script>$('#delete_file_folder_modal').modal('hide');</script>
			<?php
		}
		
	}

	die();
}
?>




