<?php

$showalert = false;
$exist = false;
$showerr=false;

if($_SERVER['REQUEST_METHOD']=='POST'){
    $server = 'localhost:3307';
    $username = "root";
    $Password = "";
    $database = "OCP";
    $conn = mysqli_connect($server,$username,$Password,$database);

// Teacher parameters
    // $Email = $_POST['email'];
    // $username = $_POST['username'];
    // $password = $_POST['password'];
    // $confirm_password = $_POST['confirm-password'];
    // $phone_no = $_POST['Phone'];
    // $experience = $_POST['experience'];
    // $RI = $_POST['RI'];

// Student parameters
    $S_Email = $_POST['s-email'];
    $S_username = $_POST['s-username'];
    $S_password = $_POST['s-password'];
    $S_confirm_password = $_POST['s-confirm-password'];
    $S_phone_no = $_POST['s-Phone'];
    $S_DOB = $_POST['dob'];
    $S_Age = $_POST['age'];



if(!$conn){
    die("Connection failed". mysqli_connect_error());
}

    $existSql = "SELECT * FROM `student` WHERE s_email = '$S_Email' ";
    $result = mysqli_query($conn,$existSql);
    $numrow = mysqli_num_rows($result);

if($numrow > 0){
    $showerr = "Email-Id Already Exists.";
}
else{
    if(($S_password == $S_confirm_password) && $exist == false){
        $passhash = password_hash($S_password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `student` (`s_name`, `s_contact`, `s_email`,`s_DOB`,`s_age`,`s_Password`) VALUES ('$S_username', '$S_phone_no', '$S_Email','$S_DOB','$S_Age','$passhash')";
        $result = mysqli_multi_query($conn, $sql);
        if($result){
            $showalert = true;
        }
        header("Location:signIn.php");
    }
    else{
        $showerr = "Password do not match.";
    }

    // if(($password == $confirm_password) && $exist == false){
    //     $passhash = password_hash($password,PASSWORD_DEFAULT);
    //     $sql = "INSERT INTO `teacher` (`t_contact`, `t_email`, `t_exp`, `t_name`, `t_RI`, `t_Password`) VALUES ('$phone_no','$Email','$experience','$username','$RI','$passhash')";
    //     $result = mysqli_multi_query($conn, $sql);
    //     if($result){
    //         $showalert = true;
    //     }
    // }
    // else{
    //     $showerr = "Password do not match.";
    // }
}

}

?>