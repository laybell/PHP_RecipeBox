<?php
 require("includes/constants.php");



// Create and connect to database
$connection = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($connection->connect_error) {
    die('Database connection failed: ' . mysqli_error());
}
else {
$statusMsg= '';

// File upload path
$targetDir="uploads/";
$fileName=basename($_FILES["file"]["name"]);
$targetFilePath=$targetDir.$fileName;
$fileType=pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"])&&(!empty($_FILES["file"]["name"]))){
    $allowTypes=array('jpg','png','jpeg','gif','pdf',
                        'JPG', 'PNG', 'JPEG', 'GIF', 'PDF');
    if(in_array($fileType,$allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"],$targetFilePath)){
                // Insert image file name into database
                
                $query="INSERT into images(file_name,uploaded_on) VALUES('".$fileName."',NOW())";
                
                $insert=mysqli_query($connection, $query);
                if($insert){
                    $statusMsg = "The file ".$fileName." has been uploaded successfully.";
                }else{
                    $statusMsg="File upload failed, please try again.";
                    }
        } else{$statusMsg= "Sorry, there was an error uploading your file.";
        }

    }else{$statusMsg='Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
    

}else { $statusMsg = 'Please select a file to upload.';
    
}

    // Display status message
    echo $statusMsg;


}

?>