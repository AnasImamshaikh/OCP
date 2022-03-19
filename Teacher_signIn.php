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
    $Email = $_POST['email'];
    $password = $_POST['password'];

    if(!$conn){
        die("Connection failed". mysqli_connect_error());
    }

    $existSql = "SELECT * FROM `teacher` WHERE t_email = '$Email' ";
    $result = mysqli_query($conn,$existSql);
    $num = mysqli_num_rows($result);


    if($num == 1){
        while($row = mysqli_fetch_assoc($result)){
        //    if(isset($row['pwd'])){}
            if (password_verify($password, $row['t_Password'])){
                $login = true;
                session_start();
                $_SESSION['loggedIn'] = true;
                $_SESSION['name'] = $row['t_name'];
                $_SESSION['email'] = $row['t_email'];
                $_SESSION['t_id'] = $row['t_id'];
                $_SESSION['RI'] = $row['t_RI'];
                $_SESSION['exp'] = $row['t_exp'];
                $_SESSION['T_phone'] =$row['t_contact'];

                if($_SESSION['t_id']==1){
                    header("location: admin/admin_page.php");
                }
                header("location: Teacher/Home.php");
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