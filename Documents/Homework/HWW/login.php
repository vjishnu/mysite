<?php include('php/connect.php'); ?>
<?php include('php/login_reg.php'); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HomeWork | Login</title>

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">




</head>
    <style>
    footer1 {
    width: 100%;
    background-color: black;
    height: 60px;
    position:absolute;
    bottom: 0;

}

footer1 p {
    color: white;
    padding: 18px;
    font-size: 18px;
    text-align: center
}
.loginbox p{
    color: #ffffff;
}



    </style>

<body>


    <header>
        <a href="index.php" id="page_name"><img src="images/smpl.png" alt=""></a>
        <nav>

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#topsec">Categories</a></li>
                <li><a href="index.php#contactus">Contact Us</a></li>
            </ul>

        </nav>

    </header>

    <div class="loginbox">
        <img src="images/no_user.png" class="home">



        <h1>LOGIN HERE</h1>
        <form method="post" action="login.php">
            <p>Username</p>
            <div class="input1"> <input type="text" name="name" placeholder="Enter Username" required>
</div>

            <p>Password</p>
            <div class="input1"> <input type="password" name="pass" placeholder="Enter password" required>

            </div>

            <?php if(isset($login_error)):?>
            <div class="error">
                <p>
                    <?php echo $login_error; ?>
                </p>
            </div>

            <?php endif ?>

            <input type="submit" name="login" value="LOGIN" onclick="login()">
            <script>
                function login(){
                    alert("Login Sucessfull");
                }
            </script>

            <p class="dont">Don't have an account ?</p>
            <a href="register.php">Create Account</a>

        </form>
    </div>



    <footer1>
        <p>Copyright &copy; Homework 2018 | All rights reserved</p>
    </footer1>

</body>

</html>
