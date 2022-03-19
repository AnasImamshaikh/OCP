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

    // $sql = "INSERT INTO fileUpload(Title,Other,file) VALUES ('$filename','$other','$pname')";
    // session_start();
    // $t_id = $_SESSION['t_id'];
    // $sql1 = "SELECT C_name FROM courses WHERE EXISTS (SELECT t_id FROM teacher WHERE courses.t_id = teacher.t_id And t_id='$t_id')";
    $C_name = $_GET['course'];
    $sql = "INSERT INTO `course_section` (`Title`, `Description`, `File`, `C_id`) VALUES ('$filename', '$other', '$pname', (SELECT C_id FROM courses WHERE C_name = '$C_name'))";

    if(mysqli_query($conn,$sql)){
        // header("Location : http://localhost/OCP/Teacher/Courses/Teacher/Courses_page.php");
    }
    else{
        echo "error". mysqli_error($conn);
    }

    
}

?>