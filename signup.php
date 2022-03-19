<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r121/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@0.5.21/dist/vanta.waves.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="registration.js"></script>
    <link rel="shortcut icon" href="https://img.icons8.com/color/50/000000/student-center.png" type="image/x-icon">
    <link rel="stylesheet" href="registration.css">
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
                                <form id="register-t-form" action="Teacher_signup.php" method="post" role="form" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" name="username" id="username" tabindex="1"
                                            class="form-control" placeholder="Username" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" id="email" tabindex="1" class="form-control"
                                            placeholder="Email Address" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" minlength="10" maxlength="10" name="Phone"
                                            class="form-control" placeholder="Your Phone *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="Experience" type="text"
                                            name="experience" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="Research Interest" type="text"
                                            name="RI" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" tabindex="2"
                                            class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirm-password" id="confirm-password"
                                            tabindex="2" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit"
                                                    tabindex="4" class="form-control btn btn-register"
                                                    value="Register Now">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form id="register-s-form" action="Student_Signup.php" method="post" role="form" style="display: none;">
                                    <div class="form-group">
                                        <input type="text" name="s-username" id="username" tabindex="1"
                                            class="form-control" placeholder="Username" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="s-email" id="email" tabindex="1" class="form-control"
                                            placeholder="Email Address" value="">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" minlength="10" maxlength="10" name="s-Phone"
                                            class="form-control" placeholder="Your Phone *" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="Date of Birth" type="text" onfocus="(this.type='date')"
                                            name="dob" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <input placeholder="Age" type="int"
                                            name="age" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="s-password" id="password" tabindex="2"
                                            class="form-control" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="s-confirm-password" id="confirm-password"
                                            tabindex="2" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                <input type="submit" name="register-submit" id="register-submit"
                                                    tabindex="4" class="form-control btn btn-register"
                                                    value="Register Now">
                                            </div>
                                        </div>
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