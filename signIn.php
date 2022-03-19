<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vanta@0.5.21/dist/vanta.waves.min.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="shortcut icon" href="https://img.icons8.com/color/50/000000/student-center.png" type="image/x-icon">
  <link rel="stylesheet" href="login.css">
  <script src="login.js"></script>


</head>

<body id="body">

<div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="logo"><img src="image/logo.png" alt="logo" width=218px height=140px></div>
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="active" id="student-form-link">Student</a>
                            </div>
                            <div class="col-xs-6">
                                <a href="#" id="register-form-link">Teacher</a>
                            </div>
                        </div>
                        <hr>
                    </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
              <form id="register-t-form" action="Teacher_signIn.php" method="post" role="form" style="display: none;">
                                    
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control"
                                            placeholder="Email Address" value="">
                                    </div>
                                  
                                   
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2"
                                            class="form-control" placeholder="Password">
                                    </div>
                                    
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit"
                                                    tabindex="4" class="form-control btn btn-register"
                                                    value="Login">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group log-lnk">
                                        <a href="admin_login.php">Admin login</a>
                                        <a href="signup.php">Register here</a>
                                    </div>
                                </form>
                                <form id="register-s-form" action="Student_signIn.php" method="post" role="form" style="display: none;">
                                    
                                    <div class="form-group">
                                        <input type="email" name="s-email" id="email" tabindex="1" class="form-control"
                                            placeholder="Email Address" value="">
                                    </div>
                                   
                                   
                                    <div class="form-group">
                                        <input type="password" name="s-password" id="password" tabindex="2"
                                            class="form-control" placeholder="Password">
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit"
                                                    tabindex="4" class="form-control btn btn-register"
                                                    value="Login">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group log-lnk">
                                        <a href="admin_login.php">Admin login</a>
                                        <a href="signup.php">Register here</a>
                                    </div>
                                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    VANTA.WAVES({
      el: "#body",
      mouseControls: true,
      touchControls: true,
      gyroControls: false,
      minHeight: 200.00,
      minWidth: 200.00,
      scale: 1.00,
      scaleMobile: 1.00,
      color: 0x162531
    })
  </script>


</body>

</html>