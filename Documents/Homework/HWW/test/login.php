<?php include('../php/admin_server.php'); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>

    <link rel="stylesheet" href="../css/admin.css">
    
</head>
    

<body>
    <header>
        <a href="../index.php" id="page_name"><img src="../images/smpl.png" alt=""></a>
        <nav>

            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../index.php#topsec">Categories</a></li>
                <li><a href="../index.php#contactus">Contact Us</a></li>
                
            </ul>

        </nav>

    </header>


    <div class="form_container">
        
        <form action="login.php" method="post">
            <?php   include('../php/errors.php'); ?>

            <h1>ADMIN LOGIN HERE</h1>
            <p>Username</p>

            <input type="text" name="admin_name">
            <br>


             <p>Password</p>
            <input type="password" name="password">
            <br>
            <br>
            <input type="submit" value="submit" name="login">
        </form>
    </div>

<footer>
        <p>Copyright &copy; Homework 2018 | All rights reserved</p>
    </footer>


</body>

</html>
