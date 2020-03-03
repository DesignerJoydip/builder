<?php

$dir = $design_template_dir.$design_folder_name;
function listFolderFiles($dir)
{
    $designMainFolder = $_SESSION['LoadedDesignFolderName'];
    $trimed_designMainSubFolder =  trim($dir,"design-folders\\".$designMainFolder."\\");
    echo '<div class="design-folder-list"><ul>';
    foreach (new DirectoryIterator($dir) as $fileInfo) {
        if (!$fileInfo->isDot()) {
            //echo $fileInfo->getFilename();
            if (preg_match('/^.*\.([^.]+)$/D', $fileInfo)) {
                //echo "$fileInfo\n";
                //echo 'is a file';
                // <a href="'. $dir."/".$fileInfo->getFilename().'"></a>
                echo '<li><img width="20px" src="https://image.flaticon.com/icons/svg/1001/1001259.svg">' . $fileInfo->getFilename();
                if ($fileInfo->isDir()) {
                    listFolderFiles($fileInfo->getPathname());
                }
                //echo ' ---- is a file';
                echo '<div class="quick_action_box">
                <span class="quick_btn quick_delete"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                <span class="quick_btn quick_duplicate"><i class="fa fa-clone" aria-hidden="true"></i></span>
                </div>
                </li>';
            }else{
                echo '<li class="dirLi" data-designmainfoldername="'.$designMainFolder.'" data-designmainSubFolder="'.$dir.'" data-designsubfoldername="'.$fileInfo->getFilename().'"><img width="20px" src="https://image.flaticon.com/icons/svg/891/891094.svg">' . $fileInfo->getFilename();
                //echo ' ---- is a dir';
                if ($fileInfo->isDir()) {
                    listFolderFiles($fileInfo->getPathname());
                }
                echo '<span class="toggleArrow"><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                <div class="quick_action_box">
                <span class="quick_btn quick_add" data-toggle="modal" data-target="#create_new_file_modal"><i class="fa fa-plus" aria-hidden="true"></i></span>
                <span class="quick_btn quick_delete"><i class="fa fa-trash-o" aria-hidden="true"></i></span>
                <span class="quick_btn quick_duplicate"><i class="fa fa-clone" aria-hidden="true"></i></span>
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
    width:100%; max-width:200px; display: inline-block; position: relative; z-index: 9;
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


