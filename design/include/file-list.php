<?php

$dir = $design_template_dir.$design_folder_name;
function listFolderFiles($dir)
{
    $designMainFolder = $_SESSION['LoadedDesignFolderName'];
    echo '<div class="design-folder-list"><ul>';
    foreach (new DirectoryIterator($dir) as $fileInfo) {
        if (!$fileInfo->isDot()) {
            //echo $fileInfo->getFilename();
            if (preg_match('/^.*\.([^.]+)$/D', $fileInfo)) {
                //echo 'is a file';
                // <a href="'. $dir."/".$fileInfo->getFilename().'"></a>
                echo '<li data-designmainfoldername="'.$designMainFolder.'" data-designmainsubfolder="'.$dir.'" data-designsubfoldername="'.$fileInfo->getFilename().'"><img width="20px" src="https://image.flaticon.com/icons/svg/1001/1001259.svg"><a href="javascript:void(0);" class="open_file_btn">' . $fileInfo->getFilename();
                if ($fileInfo->isDir()) {
                    listFolderFiles($fileInfo->getPathname());
                }
                //echo ' ---- is a file';
                echo '</a><div class="quick_action_box">
                <span class="quick_btn" data-filetype="file_type" data-buttonname="quick_duplicate" data-toggle="modal" data-target="#create_new_folder_file_modal"><i class="fa fa-clone" aria-hidden="true"></i></span>
                <span class="quick_btn" data-buttonname="quick_delete" data-toggle="modal" data-target="#delete_file_folder_modal"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                </div>
                </li>';
            }else{
                echo '<li class="dirLi" data-designmainfoldername="'.$designMainFolder.'" data-designmainsubfolder="'.$dir.'" data-designsubfoldername="'.$fileInfo->getFilename().'"><img width="20px" src="https://image.flaticon.com/icons/svg/891/891094.svg">' . $fileInfo->getFilename();
                //echo ' ---- is a dir';
                if ($fileInfo->isDir()) {
                    listFolderFiles($fileInfo->getPathname());
                }
                $innerfileslist = scandir($fileInfo->getPathname());
                $num_files = count($innerfileslist)-2;
                if($num_files != 0){ echo '<span class="toggleArrow"><i class="fa fa-angle-down" aria-hidden="true"></i></span>'; }
                echo '<div class="quick_action_box">
                <span class="quick_btn" data-buttonname="quick_add_folder" data-toggle="modal" data-target="#create_new_folder_file_modal"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                <span class="quick_btn" data-buttonname="quick_add_file" data-toggle="modal" data-target="#create_new_folder_file_modal"><i class="fa fa-plus" aria-hidden="true"></i></span>
                <span class="quick_btn" data-filetype="folder_type" data-buttonname="quick_duplicate" data-toggle="modal" data-target="#create_new_folder_file_modal"><i class="fa fa-clone" aria-hidden="true"></i></span>
                <span class="quick_btn" data-buttonname="quick_delete" data-toggle="modal" data-target="#delete_file_folder_modal"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                </div>
                </li>';
            }
        }
        
    }
    echo '</ul></div>';
}

echo "<div class='design-folder-list-main'>";
listFolderFiles($dir);
echo "</div>";


?>


<style>
.design-folder-list-main > .design-folder-list > ul > li.dirLi > .quick_action_box .quick_delete{
    display: none;
}
.design-folder-list{
    width:100%; max-width:300px; display: inline-block; position: relative; z-index: 9;
}
.design-folder-list ul{
    width:100%; list-style: none; padding: 0px;
}
.design-folder-list li{
    margin: 5px 0px 0px 0px; width:100%; display: inline-block; position: relative;
}
.design-folder-list li.dirLi{
    padding-left: 20px; margin-bottom:0px;
}
.design-folder-list li .toggleArrow{
    width:20px; height:20px; font-size: 20px; font-weight: 700; line-height: 12px; text-align: left; display: inline-block; cursor:pointer; position: absolute; left:0px; top:0px;
}
.design-folder-list li .toggleArrow.opened i{
    transform: rotate(180deg);
}
.design-folder-list ul .design-folder-list{
    display: none; 
}
.design-folder-list li img{
    margin-right:10px;
}
.design-folder-list li .quick_action_box{
    position: absolute; top:2px; right:0px; display: none; opacity: 0; transition: all ease-in-out 0.3s;
}
.design-folder-list li .quick_action_box .quick_btn{
    display: inline-block; margin:0px 3px; cursor:pointer;
}
.design-folder-list li:hover > .quick_action_box{
    display: block; opacity: 1;
}
.design-folder-list li > .toggleArrow.opened + .quick_action_box{
    display: block; opacity: 1;
}
</style>


<script>
   $(".toggleArrow").click(function(){
       $(this).toggleClass("opened");
       $(this).prev('div').toggleClass("opened").slideToggle();
   }); 

   
   $(".quick_btn").click(function(){
        $(".file_extension_radio .file_extension").prop("checked", false);
        var button_name = $(this).data("buttonname");
        console.log(button_name);
        $("#file_folder_deleted_msg").hide();

        // final delete event
        $(".delete_file_folder_section").show();
        $(".delete_final_folder_section").hide();

        if(button_name == "quick_add_folder"){
            $(".create_new_folder_file_modal_title").html("Create a New Folder");
            $(".create-new-files-btn").show();
            $(".add_new_folder_section").show();
            $(".add_new_file_section").hide();
            $(".duplicate-folders-files-btn").hide();
            $(".duplicate_folder_file_section").hide();
        }else if(button_name == "quick_add_file"){
            $(".create_new_folder_file_modal_title").html("Create a New File");
            $(".create-new-files-btn").show();
            $(".add_new_file_section").show();
            $(".add_new_folder_section").hide();
            $(".duplicate-folders-files-btn").hide();
            $(".duplicate_folder_file_section").hide();
        }else if(button_name == "quick_duplicate"){
            $(".create_new_folder_file_modal_title").html("Duplicate File or Folder");
            $(".duplicate-folders-files-btn").show();
            $(".duplicate_folder_file_section").show();
            $(".create-new-files-btn").hide();
            $(".add_new_folder_section").hide();
            $(".add_new_file_section").hide();
            var get_filetype=$(this).data("filetype");
            $(".put_filetype_name").val(get_filetype);
            //console.log(get_filetype);
        }


        var parent_list_selector = $(this).closest('li');

        // Get data from file-list.php
        var get_designmainfoldername = parent_list_selector.data("designmainfoldername");
        var get_designmainsubfolder = parent_list_selector.data('designmainsubfolder');
        var get_designsubfoldername = parent_list_selector.data('designsubfoldername');
        //console.log(get_designmainfoldername+'|'+get_designmainsubfolder+'|'+get_designsubfoldername);

        if(get_designsubfoldername == 'html'){
            $(".file_extension_radio .file_extension[value='html']").prop("checked", true);
        }else if(get_designsubfoldername == 'css'){
            $(".file_extension_radio .file_extension[value='css']").prop("checked", true);
        }else if(get_designsubfoldername == 'js'){
            $(".file_extension_radio .file_extension[value='js']").prop("checked", true);
        }else if(get_designsubfoldername == 'fonts'){
            $(".file_extension_radio .file_extension[value='fonts']").prop("checked", true);
        }else if(get_designsubfoldername == 'php'){
            $(".file_extension_radio .file_extension[value='php']").prop("checked", true);
        }else if(get_designsubfoldername == 'images'){
            $(".file_extension_radio .file_extension").prop("checked", false);
        }

        // put data in field
        var button_name_for_create = $(".button_name_for_create").val(button_name);
        var designmainsubfolder_name_for_create = $(".put_designmainsubfolder_name").val(get_designmainsubfolder);
        var destinationfolder_name_for_create = $(".put_destinationfolder_name").val(get_designsubfoldername);
        var destinationfolder_name_for_show = $(".put_destinationfolder_show").html(get_designsubfoldername);
        var destinationfolder_name_for_show_final = $(".put_destinationfolder_show_final").html(get_designsubfoldername);
        var button_name_for_create = button_name;
        // for duplicate function
        $(".put_old_destinationfolder_name_for_duplicate").val(get_designsubfoldername);
        var only_file_name_for_duplicate = get_designsubfoldername.split('.')[0];
        $(".new_designmainsubfolder_name_for_duplicate").val(only_file_name_for_duplicate);
        $(".overwrite_file_folder_name_for_duplicate").val(only_file_name_for_duplicate+'-copy');

    });


    $(".open_file_btn").click(function(){

        var parent_list_selector = $(this).closest('li');

        var get_designmainsubfolder = parent_list_selector.data('designmainsubfolder');
        var get_designsubfoldername = parent_list_selector.data('designsubfoldername');
        //console.log(get_designmainsubfolder+'|'+get_designsubfoldername);
        console.log(get_designmainsubfolder+'\\'+get_designsubfoldername);

        $.post('open-file-action.php', { get_designmainsubfolder:get_designmainsubfolder, get_designsubfoldername:get_designsubfoldername }, function(data){
            $("#design_file_load_section").fadeIn(500);
            $("#design_file_load_section").html(data);
            //$("#design_file_load_section").delay(2000).fadeOut(500);
        });
       
    });
 

   /*var data = [
            [
                {
                    text: "<i class='fa fa-cut site-cm-icon'></i>Cut（ctrl+x）",
                    action: function () {
                        console.log("Cut");
                    }
                },
                {
                    text: "<i class='fa fa-copy site-cm-icon'></i>Copy（ctrl+c）"
                },
                {
                    text: "<i class='fa fa-paste site-cm-icon'></i>Paste（ctrl+v）",
                    action: function () {
                        console.log("Paste");
                    }
                }
            ],
            [
                {
                    text: "<i class='fa fa-bold site-cm-icon'></i>Bold（ctrl+b）"
                },
                {
                    text: "<i class='fa fa-italic site-cm-icon'></i>Italic（ctrl+i）"
                },
                {
                    text: "<i class='fa fa-underline site-cm-icon'></i>Underline（ctrl+u）"
                }],
            [
                {
                    text: "<i class='fa fa-font site-cm-icon'></i> Font"
                }],
            [
                {
                    text: "<i class='fa fa-subscript site-cm-icon'></i>Subscript（ctrl+=）"
                },
                {
                    text: "<i class='fa fa-superscript site-cm-icon'></i>Superscript（ctrl+shift++）"
                }
            ]
        ];

        $(".dirLi_").contextMenu(data);*/
</script>


