<?php include("include/header.php") ?>
<?php if(isset($_SESSION['login_user'])){ ?>
<?php include("include/header-menu.php") ?>

<?php if(isset($_GET['FLDNAME'])){ 
$FLDNAME=$_GET['FLDNAME'];
//session_start();
$_SESSION['LoadedDesignFolderName'] = $FLDNAME;



if(isset($FLDNAME)){ 
?>


<?php

$dir    = 'projects/'.$FLDNAME;

function getAllContentOfLocation($loc)
{   
    $scandir = scandir($loc);

    $scandir = array_filter($scandir, function($element){

        return !preg_match('/^\./', $element);

    });

    if(empty($scandir)) echo '<li style="color:red">Empty Dir</li>';

    foreach($scandir as $file){

        $baseLink = $loc . DIRECTORY_SEPARATOR . $file;

        echo '<ol class="filefolderList">';
        if(is_dir($baseLink))
        {
            echo '<li style="font-weight:bold;color:blue">'.$file.' <a class="addFileinlist" href="'.$baseLink.'">Add File</a> | <a>Add Folder</a></li>';
            getAllContentOfLocation($baseLink);

        }else{
            echo '<li>'.$file.'</li>';
        }
        echo '</ol>';
    }
}
//Call function and set location that you want to scan 
getAllContentOfLocation($dir);

?>

<style>
ol{ padding-left:20px; }
.filefolderList{ width:100%; display:inline-block; }
</style>



<div class="design_veiw_file"></div>



<!-- modal -->
<?php //$FLDNAME=$_GET['FLDNAME']; ?>



<?php }else{
header("location:index.php");	

?>

<?php } } ?>




<script>
$(document).ready(function(){
	$(".addFileinlist").click(function(){
        var getProjectFileName = $(this).attr("class");

    });
});
</script>


<?php include("include/footer.php") ?>
<?php }else{ ?>
<?php include("include/login.php") ?>
<?php include("include/footer.php") ?>
<?php } ?> 



