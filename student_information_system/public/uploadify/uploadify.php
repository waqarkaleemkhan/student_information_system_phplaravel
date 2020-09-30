<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination

/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = 'img/';

if (!empty($_FILES) ) {

        $tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $targetFolder;
        
        $targetFile = rtrim($targetPath,'/') . '/' .$_FILES['Filedata']['name'] ;
        
	// Validate the file type
	$fileTypes = array("gif", "jpeg", "jpg", "png"); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
             move_uploaded_file($tempFile,$targetFile);
//             print_r("img/".$_FILES['Filedata']['name']);
            if(rename("img/".$_FILES['Filedata']['name'] , "img/bg-01.jpg" )){
                    
            }else{
                
            }
                
	} else {
		
	}
        echo $targetFile;
}
?>