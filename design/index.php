<?php include("include/header.php") ?>
<?php if(isset($_SESSION['login_user'])){ ?>
<?php include("include/header-menu.php") ?>


<div class="bs-callout bs-callout-warning">      
<?php
//Get a list of file paths using the glob function.
$fileList = glob('design-folders/*');
$total_items  = count( $fileList, GLOB_ONLYDIR );
if($total_items == 0){
        echo "<h4 style='display:block; clear:both; margin:0px;'><a href='create-design-folder.php'>Create a Design</a></h4>"; 
}else{
       //Loop through the array that glob returned.
       foreach($fileList as $filename){
                //Simply print them out onto the screen.
                $trimed_design_folder_name =  trim($filename,"design-folders/");
                echo "<h4 style='display:block; clear:both;'>".$trimed_design_folder_name."<a href='edit-design-html.php?FLDNAME=".$trimed_design_folder_name."' class='btn btn-xs btn-danger pull-right' style='margin:0px 0px 10px 10px;'>EDIT</a>
                <a target='_blank' href='view-design.php?FLDNAME=".$trimed_design_folder_name."' class='btn btn-xs btn-info pull-right' style='margin-bottom:10px;'>VIEW</a></h4>"; 
        }
}
?>
</div>


<?php include("include/footer.php") ?>
<?php }else{ ?>
<?php include("include/login.php") ?>
<?php include("include/footer.php") ?>
<?php } ?> 
