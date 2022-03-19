<?php

// include "database.php";
$server = '	fdb20.awardspace.net:3306';
$username = "3820301_ocp";
$Password = "9{Y6A;5%1s9?fJpt";
$database = "3820301_ocp";
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