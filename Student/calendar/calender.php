<?php
    include "../Courses/database.php";
    session_start();
    if (!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != true) {
    header("location: http://localhost/OCP/signIn.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <link href='fullcalendar/packages/core/main.css' rel='stylesheet' />
    <link href='fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
    <link href='fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
    <link href='fullcalendar/packages/list/main.css' rel='stylesheet' />
    <link href='../../Style.css' rel='stylesheet' />
    <script src='fullcalendar/packages/core/main.js'></script>
    <script src='fullcalendar/packages/interaction/main.js'></script>
    <script src='fullcalendar/packages/daygrid/main.js'></script>
    <script src='fullcalendar/packages/timegrid/main.js'></script>
    <script src='fullcalendar/packages/list/main.js'></script>
    <script src='https://unpkg.com/popper.js/dist/umd/popper.min.js'></script>
    <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>
    <link rel="shortcut icon" href="https://img.icons8.com/color/50/000000/student-center.png" type="image/x-icon">
    <title>OnlineCollegePortal</title>
    <style>
        /*
        tooltip css
        */

        .popper,
        .tooltip {
            position: absolute;
            z-index: 9999;
            background: #FFC107;
            color: black;
            width: 150px;
            border-radius: 3px;
            box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
            padding: 10px;
            text-align: center;
        }

        .style5 .tooltip {
            background: #1E252B;
            color: #FFFFFF;
            max-width: 200px;
            width: auto;
            font-size: .8rem;
            padding: .5em 1em;
        }

        .popper .popper__arrow,
        .tooltip .tooltip-arrow {
            width: 0;
            height: 0;
            border-style: solid;
            position: absolute;
            margin: 5px;
        }

        .tooltip .tooltip-arrow,
        .popper .popper__arrow {
            border-color: #FFC107;
        }

        .style5 .tooltip .tooltip-arrow {
            border-color: #1E252B;
        }

        .popper[x-placement^="top"],
        .tooltip[x-placement^="top"] {
            margin-bottom: 5px;
        }

        .popper[x-placement^="top"] .popper__arrow,
        .tooltip[x-placement^="top"] .tooltip-arrow {
            border-width: 5px 5px 0 5px;
            border-left-color: transparent;
            border-right-color: transparent;
            border-bottom-color: transparent;
            bottom: -5px;
            left: calc(50% - 5px);
            margin-top: 0;
            margin-bottom: 0;
        }

        .popper[x-placement^="bottom"],
        .tooltip[x-placement^="bottom"] {
            margin-top: 5px;
        }

        .tooltip[x-placement^="bottom"] .tooltip-arrow,
        .popper[x-placement^="bottom"] .popper__arrow {
            border-width: 0 5px 5px 5px;
            border-left-color: transparent;
            border-right-color: transparent;
            border-top-color: transparent;
            top: -5px;
            left: calc(50% - 5px);
            margin-top: 0;
            margin-bottom: 0;
        }

        .tooltip[x-placement^="right"],
        .popper[x-placement^="right"] {
            margin-left: 5px;
        }

        .popper[x-placement^="right"] .popper__arrow,
        .tooltip[x-placement^="right"] .tooltip-arrow {
            border-width: 5px 5px 5px 0;
            border-left-color: transparent;
            border-top-color: transparent;
            border-bottom-color: transparent;
            left: -5px;
            top: calc(50% - 5px);
            margin-left: 0;
            margin-right: 0;
        }

        .popper[x-placement^="left"],
        .tooltip[x-placement^="left"] {
            margin-right: 5px;
        }

        .popper[x-placement^="left"] .popper__arrow,
        .tooltip[x-placement^="left"] .tooltip-arrow {
            border-width: 5px 0 5px 5px;
            border-top-color: transparent;
            border-right-color: transparent;
            border-bottom-color: transparent;
            right: -5px;
            top: calc(50% - 5px);
            margin-left: 0;
            margin-right: 0;
        }
    </style>

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
                },
                editable: false,
                navLinks: true, // can click day/week names to navigate views
                eventLimit: true, // allow "more" link when too many events
                eventRender: function (info) {
                    var tooltip = new Tooltip(info.el, {
                        title: info.event.extendedProps.description,
                        placement: 'top',
                        trigger: 'hover',
                        container: 'body'
                    });
                },
                events: {
                    url: 'events.php',
                    failure: function () {
                        document.getElementById('script-warning').style.display = 'block'
                    }
                },
                loading: function (bool) {
                    document.getElementById('loading').style.display =
                        bool ? 'block' : 'none';
                }
            });

            calendar.render();
        });

    </script>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        #script-warning {
            display: none;
            background: #eee;
            border-bottom: 1px solid #ddd;
            padding: 0 10px;
            line-height: 40px;
            text-align: center;
            font-weight: bold;
            font-size: 12px;
            color: red;
        }

        #loading {
            display: none;
            position: absolute;
            top: 10px;
            right: 10px;
        }

        #calendar {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 10px;
        }
    </style>
</head>

<body>

    <navbar>
        <div id="navbar">
            <div>

                <div id="navbar-content">
                    <div id="logo">
                        <img src="../../image/logo.png" alt="">
                    </div>

                    <ul>
                        <li><a href="../index.php">HOME</a></li>
                        <li><a href="#">CALENDER</a></li>
                        <li><a href="../Profile/Profile.php">PROFILE</a></li>
                        <li><a href="../../signIn.php">LOGOUT</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </navbar>

    <hr>

    <nav>

    <div id="my-side-nav" class="Side-nav">
            <div id="side-profile">
            <?php
                        $s_name = $_SESSION['name'];
                        $sql1 = "SELECT `s_image` FROM `student` WHERE s_name='$s_name'";
                        $result = mysqli_query($conn,$sql1);
                        while($row = mysqli_fetch_array($result)){

                            $img = $row['s_image'];
                            if(empty($img)){
                                echo "<img src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ12nrZzihNnucandf2BnaYVDeg7M04_nCRtA&usqp=CAU' alt=''>";
                            }
                            else{
                                echo "<img src='../Profile/upload/{$img}' alt=''>";
                            }
                            
                            
                        }
                ?>
                <div id="side-profile-content">
                    <?php
                        echo "<h2>{$_SESSION['name']}</h2>
                        <p>{$_SESSION['email']}</p>";
    
                    ?>
                </div>
            </div>

            <hr>

            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><img
                    src="https://img.icons8.com/ios/50/000000/close-window.png" /></a>
            <a href="../Courses/Course.php">COURSES</a>
            <a href="../Quiz/Teacher/Quiz_page.php">QUIZ</a>
            <a href="#">CALENDAR</a>
            <a href="../Notice/Notice_page.php">NOTICE</a>
            <a href="../../signIn.php">LOG OUT</a>
        </div>

        <span onclick="openNav()"><img src="https://img.icons8.com/ios-glyphs/24/000000/menu--v2.png" /></span>

        <div id="main">
            <h4>Dashboard</h4>
        </div>

    </nav>

    <!-- <div id='script-warning'>
        <code>php/get-events.php</code> must be running.
    </div> -->

    <div id='loading'>loading...</div>

    <div id='calendar'></div>

    <footer>
        <p> &#169; Copyright by IFAK || 2021</p>
    </footer>

    <script>
        function openNav() {
            document.getElementById("my-side-nav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("my-side-nav").style.width = "0";
        }
    </script>

</body>

</html>