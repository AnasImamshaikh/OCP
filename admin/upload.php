<?php

// include "database.php";
$server = 'localhost';
$username = "id16679203_ocp_user";
$Password = "tNa}[knCS1*MFW=N";
$database = "id16679203_ocp";
$conn = mysqli_connect($server,$username,$password,$database);

if(isset($_POST['upload'])){

    $Course_Name = $_POST['Course_name'];
    $Course_img = $_POST['Course_img'];
    $Teacher_ID = $_POST['t_id'];

    $sql = "INSERT INTO `courses` ( `C_name`, `C_image` , `t_id`) VALUES ('$Course_Name', '$Course_img','$Teacher_ID')";

    if(mysqli_query($conn,$sql)){        
        $sql = "SELECT C_name FROM `courses`";

                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_array($result)){
                        session_start();
                         $_SESSION['C_name'] = $row['C_name'];
                    }
        header("Location: http://localhost/OCP/admin/admin_page.php");
    }
    else{
        echo "error";
    }

    
}
    


?>