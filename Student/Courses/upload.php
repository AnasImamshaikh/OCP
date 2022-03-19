<?php

// include "database.php";
$server = 'localhost';
$username = "id16679203_ocp_user";
$Password = "tNa}[knCS1*MFW=N";
$database = "id16679203_ocp";
$conn = mysqli_connect($server,$username,$password,$database);

if(isset($_POST['upload'])){

    $filename = $_POST['filename'];

    $other = $_POST['Other'];

    $pname = $_FILES["file"]["name"];

    $tname = $_FILES["file"]["tmp_name"];

    $upload_dir = realpath(dirname(getcwd()));

    move_uploaded_file($tname,$upload_dir."/".$pname);

    $sql = "INSERT INTO fileUpload(Title,Other,file) VALUES ('$filename','$other','$pname')";

    if(mysqli_query($conn,$sql)){
        echo "Uploaded successfully";
        header("Courses_page.php");
    }
    else{
        echo "error";
    }

    
}
    


?>