<?php

// include "database.php";
$server = 'localhost';
$username = "id16679203_ocp_user";
$Password = "tNa}[knCS1*MFW=N";
$database = "id16679203_ocp";
$conn = mysqli_connect($server,$username,$password,$database);

if(isset($_POST['upload'])){

    $notice_date = $_POST['Notice_date'];

    $notice_title = $_POST['Notice_Title'];

    $notice = $_POST['notice'];

    // move_uploaded_file($tname,$upload_dir."/".$pname);

    $sql = "INSERT INTO notice(notice_date,Notice_title,Notice) VALUES ('$notice_date','$notice_title','$notice')";

    if(mysqli_query($conn,$sql)){
        // echo "Uploaded successfully";
        // header("Quiz_page.php");
    }
    else{
        echo "error";
    }

    
}
    


?>