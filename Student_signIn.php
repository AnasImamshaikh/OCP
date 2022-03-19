<?php


$login = false;
$showerr=false;

if($_SERVER['REQUEST_METHOD']=='POST'){
    
    $server = 'localhost';
    $username = "id16679203_ocp_user";
    $Password = "tNa}[knCS1*MFW=N";
    $database = "id16679203_ocp";
    $conn = mysqli_connect($server,$username,$Password,$database);

// Teacher parameters
    $S_Email = $_POST['s-email'];
    $S_password = $_POST['s-password'];

    if(!$conn){
        die("Connection failed". mysqli_connect_error());
    }

    $existSql = "SELECT * FROM `student` WHERE s_email = '$S_Email' ";
    $result = mysqli_query($conn,$existSql);
    $num = mysqli_num_rows($result);


    if($num == 1){
        while($row = mysqli_fetch_assoc($result)){
        //    if(isset($row['pwd'])){}
            if (password_verify($S_password, $row['S_Password'])){
                $login = true;
                session_start();
                $_SESSION['loggedIn'] = true;
                $_SESSION['name'] = $row['s_name'];
                $_SESSION['email'] = $row['s_email'];
                $_SESSION['S_id'] = $row['S_id'];
                $_SESSION['S_phone'] = $row['s_contact'];
                $_SESSION['S_Age'] = $row['s_age'];
                $_SESSION['S_DOB'] = $row['s_DOB'];
                header("Location: Student/index.php");
            }
            else{
                $showError = "Invalid Credentials";
                header("location: signIn.php");
            }
          }

    }
    else{
        $showerr = "Invalid Credentials.";
    }

}

?>