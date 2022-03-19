<?php

// include "database.php";
$server = 'localhost';
$username = "id16679203_ocp_user";
$Password = "tNa}[knCS1*MFW=N";
$database = "id16679203_ocp";
$conn = mysqli_connect($server,$username,$password,$database);

if(isset($_POST['upload'])){

    $subject = $_POST['SubName'];

    $title = $_POST['Title'];

    $QuizLink = $_POST['QuizLink'];

    // move_uploaded_file($tname,$upload_dir."/".$pname);

    $sql = "INSERT INTO quiz(Subject,Title,QuizLink) VALUES ('$subject','$title','$QuizLink')";

    if(mysqli_query($conn,$sql)){
        // echo "Uploaded successfully";
        header("Quiz_page.php");
    }
    else{
        echo "error";
    }

    
}
    


?>