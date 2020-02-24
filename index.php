<?php include("include/header.php") ?>
<?php if(isset($_SESSION['login_user'])){ ?>
<?php include("include/header-menu.php") ?>


<div class="bs-callout bs-callout-warning">
<?php
$log_directory = 'projects/';

$results_array = array();

if (is_dir($log_directory))
{
        if ($handle = opendir($log_directory))
        {
                //Notice the parentheses I added:
                while(($file = readdir($handle)) !== FALSE)
                {
                        $results_array[] = $file;
                }
                closedir($handle);
        }
}

//Output findings
$i=1;
foreach($results_array as $value)
{
	//$i++;
	//if($i>1){
	
	echo "<h4 style='display:block; clear:both;'>".$value."<a href='edit-project.php?FLDNAME=".$value."' class='btn btn-xs btn-danger pull-right' style='margin:0px 0px 10px 10px;'>EDIT</a>
	</h4>";
	//}
}
?>
</div>








<?php include("include/footer.php") ?>
<?php }else{ ?>
<?php include("include/login.php") ?>
<?php include("include/footer.php") ?>
<?php } ?> 
