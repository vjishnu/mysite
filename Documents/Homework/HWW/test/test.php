<?php include('../php/admin_server.php'); 

     //if user is not logged in, they can't access this page
    if(empty($_SESSION['admin_name']))
    {
        header('location: login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="../test/test.css">
    <style>
        .side-nav {
            margin-left: 0px;
            margin-top: 0px;
        }

    </style>

</head>

<body>
    <div id="header">


        <center> <img src="../css/500_F_112091769_vWEmDiwVIpO4H1plGuhYgnmduTuiGUh2.jpg" alt="adminlogo" id="adminlogo"><br>
            <h1> Welcome
                <?php echo $_SESSION['admin_name']  ?>
            </h1>
        </center>
    </div>

    <nav class="navbar">
        <span class="open-slide">
        <a href="#" onclick="openSideMenu()">
        <svg width="30">
            
        <path d="M0,5,30,5" stroke="#fffcfc"
              stroke-width="4"/> 
            <path d="M0,14,30,14" stroke="#fffcfc"
              stroke-width="4"/>  
             <path d="M0,23,30,23" stroke="#fffefe"
              stroke-width="4"/>  
         </svg>
        
        </a></span>


    </nav>
    <div id="side-menu" class="side-nav">

        <a href="#" class="btn-close" onclick="closeSideMenu()">&times;</a>
        <ul>
            <li><a href="../test/test.php">Home</a></li>
            <li><a href="../test/user_mangement.php">User Managment</a></li>
            <li><a href="../test/reference.php">References</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="../admin/login.php?logout='1'">Logout</a></li>
        </ul>
    </div>
    <div id="main">
        <h1>You are Welcome!
        </h1>
    </div>
    <script>
        function openSideMenu() {
            document.getElementById('side-menu').style.width = '250px';
            document.getElementById('main').style.marginLeft = '250px';

        }

        function closeSideMenu() {
            document.getElementById('side-menu').style.width = '0px';
            document.getElementById('main').style.marginLeft = '0px';

        }

    </script>
