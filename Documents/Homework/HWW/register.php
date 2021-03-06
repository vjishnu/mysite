<?php include('php/connect.php'); ?>
<?php include('php/login_reg.php'); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HomeWork | Register</title>

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">


    <style>
        .loginbox {
            width: 50%;
            height: auto;
            margin-bottom: 50px;
            background: rgba(1, 6, 18, 0.87);
            color: #e0d2d3;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 15px;
            margin-bottom: 15px;
        }

        .sec1 {
            width: 50%;
            float: left;
        }

        .sec2 {
            width: 50%;
            float: left;
        }

        form input[type="text"],
        form input[type="password"],
        form input[type="number"] {
            margin-top: 10px;
            margin-bottom: 15px;
            
            border-bottom: 1px solid #bfa8a8;
            background: transparent;
            color: #bfa8a8;
            font-size: 20px;
            width: 95%;
            margin-left: 15px;
            margin-top: 15px;
        }

        form input[type="submit"] {
            width: 300px;
        }

        

        .select input {
            background-color: rgba(1, 6, 18, 0.87);
            color: white;
            padding:10px;
            letter-spacing:2px;
            font-size:24px;
        }



        .loginbox a {
            margin-bottom: 35px;


        }

        @media (max-width:768px) {
            .loginbox {
                width: 85%;

            }}
            
            footer {
    width: 100%;
    background-color: black;
    height: 60px;
    position:absolute;
    bottom: 0;

}

footer p {
    color: white;
    padding: 18px;
    font-size: 18px;
    text-align: center
}


    </style>


</head>

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



        <h1>Create Your Account</h1>
        <form method="post" action="register.php">

            <div class="sec1">
                <input type="text" name="name" placeholder="Enter Username" required autocomplete="off">

                <input type="text" name="phone" placeholder="Enter Mobile No" maxlength="10" required autocomplete="off">

                <input type="password" name="pass1" placeholder="Enter password" required autocomplete="off">

                <input type="password" name="pass2" placeholder="Confirm password" required autocomplete="off">


            </div>


            <div class="sec2">
                <input type="text" name="area" placeholder="Enter Service Area" required autocomplete="off">

                <input type="text" name="street" placeholder="Enter Street Name" required autocomplete="off">

                <input type="text" name="city" placeholder="Enter City Name" required autocomplete="off">
                <input type="text" name="state" placeholder="Enter State" required autocomplete="off">

            </div>


<div class="select">

            <input type="text" name="category" placeholder="Enter category" required autocomplete="off">
</div>

            <?php if(isset($pass_error)):?>
            <div class="error">
                <p>
                    <?php echo $pass_error; ?>
                </p>
            </div>

            <?php endif ?>

            <?php if(isset($name_error)):?>
            <div class="error">
                <p>
                    <?php echo $name_error; ?>
                </p>
            </div>

            <?php endif ?>

            <input type="submit" name="register" value="REGISTER" onclick="register()">
            <script>
                function register(){
                    alert("Registration Sucessfull");
                }
            
            </script>

            <p class="dont">Already have an account ?</p>
            <a href="login.php">Login Now</a>

        </form>
    </div>



    <footer>
        <p>Copyright &copy; Homework 2018 | All rights reserved</p>
    </footer>

</body>

</html>
