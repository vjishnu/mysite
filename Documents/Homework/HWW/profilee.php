<?php include('php/connect.php'); ?>
<?php include('php/login_reg.php'); ?>

<?php
    $user_msg="Login | Sign Up";
    $login_url="login.html";


    if(isset($_GET['serv']))
    {
        $service=$_GET['serv'];
        
        $result=mysqli_query($connection,"SELECT * FROM user_details WHERE category='$service'");
    }


?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>HomeWork | Home</title>

        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/profile.css">

        <style>
            .logout {
                width: 100px;
                display: block;
                clear: both;
                float: right;
                background-color: #ce420f;
                padding: 5px;
                border: 2px solid #ce420f;
                border-radius: 10px;
                text-align: center;
                margin-right: 45px;
                transition: all ease .5s;
            }

            .logout a {
                text-decoration: none;
                color: white;
            }

            .logout:hover {
                background-color: white;
                border: 2px solid #ce420f;

            }

            .logout:hover a {

                color: #ce420f;
            }

        </style>


    </head>


    <body>


        <div class="landing">



            <section class="sect1">


                <div id="content">
                    <ul>

                        <?php while($row=mysqli_fetch_array($result)){ ?>

                        <li>
                            <div class="xop-box xop-1">
                                <a href="user1.php?id=<?php echo $row['user_id']; ?>">
                                    <h3 id="ab">
                                        <?php echo $row['user_name']; ?>
                                    </h3>
                                </a>
                            </div>
                        </li>

                        <?php } ?>
                    </ul>
                </div>

            </section>
        </div>


        <header>
            <a href="index.html" id="page_name"><img src="images/smpl.png" alt=""></a>
            <nav>

                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#topsec">Top Searches</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>


                <!--                if the user is logged in, this will show the user name and logout button -->
                <?php if(isset($_SESSION['name'])): ?>
                <?php 
                        $user_msg=$_SESSION['name'];
                        $login_url="user.php";
                ?>
                <li>
                    <a href="<?php echo $login_url ?>">
                        <?php echo $user_msg; ?>
                    </a>
                </li>
                <?php endif ?>

                <!-- if the user is not logged in, this will show the login option -->
                <?php if(!isset($_SESSION['name'])): ?>
                <li>
                    <a href="<?php echo $login_url ?>">
                        <?php echo $user_msg; ?>
                    </a>
                </li>


            </nav>

            <?php endif ?>
            <?php if(isset($_SESSION['name'])): ?>
            <div class="logout">
                <a href="index.php?logout='1">Log Out</a>
            </div>

            <?php endif ?>

        </header>






    </body>

    </html>
