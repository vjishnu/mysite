<?php include('php/connect.php'); ?>
<?php include('php/login_reg.php'); ?>


<?php 

    $user_msg="Login | Sign Up";
    $login_url="login.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HomeWork | Home</title>

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style.css">

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


        .contact {

            text-align: center;
            height: 100vh;
            background-color: dimgray;
            background-image: url(css/awhCbhLqRceCdjcPQUnn_IMG_0249-1024x522.jpg);
            opacity:100;
            background-size: cover;
            position: relative;
            background-position: center;

        }


        .contactus {

            text-transform: uppercase;
            color: #fff;

        }

        h4 {

            font-size: 42px;
            font-family: monospace;

        }

        h5 {
            font-family: monospace;
            font-size: 20px;
            color: #020101;


        }

        .form-control {
            margin-top: 35px;
            width: 400px;
           
           border-top: 1px solid #000;
            border-bottom: 1px solid #000;
            border-left: 2px solid #000;
            border-right: 2px solid #000;
             color: #000;
            letter-spacing: 1px;
            font-size: 15px;
            margin-bottom: 26px;

        }
        
        }
        
        
        input {
            height: 40px;

        }

        .submit {
            background: #535353;
            border-color: transparent;
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            font-family: monospace;
            letter-spacing: 2px;
            margin-top: 20px;
            border-radius: 50px;
            cursor: pointer;


        }

        .submit:hover {
            color: black;
            background: gray;
            transform: scale(1.05);

        }

        footer {
            width: 100%;
            background-color: black;
            height: 60px;
            position: absolute;
            bottom: 0;

        }

        footer p {
            color: white;
            padding: 18px;
            font-size: 18px;
            text-align: center
        }

        }

        .contact select {
            margin-top: 35px;
            width: 400px;
            border: none;
            border-bottom: 1px solid #fdeaea;
            color: black;
            letter-spacing: 1px;
            font-size: 18px;
            margin-bottom: 26px;
        }

        section {
            width: 100%;
            padding-top: 15px;
        }

        section .feedback {
            width: 45%;
            float: left;
        }

        section .references {
            width: 45%;
            float: right;
        }
        .feedback h4{
            color:#fff;
        }
        .white input{
            background:transparent;
            opacity:10;
            color:#fff;
        }
        
        
      .landing select{
        text-transform: uppercase;
      }
      
        
    
       

    </style>

</head>

<body>


    <div class="landing">

        <h1>homework</h1>
        <p>Bulid your dream home</p>

        <form method="post" action="search1.php">
            <?php

$query1="SELECT DISTINCT category FROM user_details";
$query2="SELECT DISTINCT service_area FROM user_details";
$result1=mysqli_query($connection,$query1);
$result2=mysqli_query($connection,$query2);
?>

                <select name="category" onChange="getSelectValue();">
            <option value="cat" selected disabled hidden>Choose category</option>     
         <?php while($row1=mysqli_fetch_array($result1)){?>
        
         <option value="<?php echo $row1['category'];?>"><?php echo $row1['category'];?></option>
      
         
         <?php }?></select>


                <script>
                    function getSelectValue() {
                        var selectivevalue = document.getElementById("list");
                        console.log(selectedvalue);
                    }

                </script>



                <select name="service_area" id="location" onChange="getSelectValue();">
            <option value="loc" selected disabled hidden>Choose Location</option>     
         <?php while($row1=mysqli_fetch_array($result2)):;?>
         <option value="<?php echo $row1['service_area'];?>"><?php echo $row1['service_area'];?></option>
         <?php endwhile;?>
                   
                


         </select>

                <script>
                    function getSelectValue() {
                        var selectivevalue = document.getElementById("location");
                        console.log(selectedvalue);
                    }

                </script>

                <button name="search"><i class="fa fa-search" aria-hidden="true"></i></button>

        </form>




    </div>

    <header>

        <a href="index.php" id="page_name"><img src="images/smpl.png" alt=""></a>
        <nav>

            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="index.php#topsec">Categories</a></li>
                <li><a href="index.php#contactus">Contact Us</a></li>


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

                <?php endif ?>



            </ul>

        </nav>

        <?php if(isset($_SESSION['name'])): ?>
        <div class="logout">
            <a href="index.php?logout='1">Log Out</a>
        </div>

        <?php endif ?>


    </header>



    <section class="tops" id="topsec">
        <div class="gallery">
            <h1>CATEGORIES</h1>

            <div class="grid_section">

                <ul class="grid">

                    <li>
                        <div class="box img">
                            <a href="profile.php?serv=Electrician">
                               <img src="images/electrician.jpg" alt="">
                                <h3>Electrician</h3>  

                            </a>

                        </div>
                    </li>

                    <li>
                        <div class="box img">
                            <a href="profile.php?serv=Painter">
                               <img src="images/painter.jpg" alt="">
                                <h3>Painter</h3>  

                            </a>

                        </div>
                    </li>

                    <li>
                        <div class="box img">
                            <a href="profile.php?serv=Plumber">
                               <img src="images/plumber_authority_1-min.jpg" alt="">
                                <h3>Plumber</h3>  

                            </a>

                        </div>
                    </li>

                    <li>
                        <div class="box img">
                            <a href="profile.php?serv=Mason">
                               <img src="images/mason-500x500.png" alt="">
                                <h3>Mason</h3>  

                            </a>

                        </div>
                    </li>

                    <li>
                        <div class="box img">
                            <a href="profile.php?serv=Driver">
                               <img src="images/1_0x0_790x520_0x520_become_a_better_driver.jpg" alt="">
                                <h3>Driver</h3>  

                            </a>

                        </div>
                    </li>

                    <li>
                        <div class="box img">
                            <a href="profile.php?serv=Carpenter">
                               <img src="images/carpenter-500.jpg" alt="">
                                <h3>Carpenter</h3>  

                            </a>

                        </div>
                    </li>



                </ul>



            </div>





        </div>

    </section>


    <?php 
        
        // when user clicks the register button
    
        if(isset($_POST['refer']))
        {
            $name="";
            $number="";
            $service="";
            
            $name=$_POST['name']; 
            $number=$_POST['number']; 
            $service=$_POST['service'];            
            
            $query="INSERT INTO reference_details (re_name,mobile,service) VALUES ('$name','$number','$service')";
            mysqli_query($connection,$query);
            
        }
        
        ?>



    <?php
    
        $name="";
    $email="";
    $message="";
    
        if(isset($_POST['f_submit']))
        {
            $name=$_POST['name'];
            $email=$_POST['email'];
            $message=$_POST['message'];
            
            mysqli_query($connection,"INSERT INTO feedback_details (name,email,message) VALUES ('$name','$email','$message')");
            
            
        }
    
    ?>




        <section class="contact" id="contactus">

            <div class="feedback">

                <h4>FEEDBACK</h4>
                <!--<h5>PROVIDE YOUR VALUABLE FEEDBACKS!</h5>-->

                <form id="contact-form" method="post" action="index.php">
                    <div class="white">
              <input name="name" class="form-control" type="text" placeholder="Your name" required><br>
               
                 <input name="email" class="form-control" type="email" placeholder="Your Email" required><br>
                
                 <textarea name="message" class="form-control" placeholder="Message" rows="4" required></textarea><br>
    </div>
               <input type="submit" class="form-control submit" value="SEND MESSAGE" onclick="submit1();" name="f_submit">
               <script>
                        function submit1() {
                            alert ("Feedback Send to Admin Sucessfully");
                        }

                    </script>





                </form>



            </div>




            <!--..........................................-->

            <div class="references">

                <h4>DO YOU HAVE ANY REFERENCE?!</h4>
                

                <form id="contact-form" method="post" action="index.php">
                    <div class="white">
                    <input name="name" class="form-control" type="text" placeholder="Name" required><br>

                    <input name="number" class="form-control" type="text" maxlength="10" minlength="10" placeholder="Mobile no" required><br>

                    </div>
                    <div class="serback">
                    <br><input type="text" name="service" class="form-control" placeholder="ex:carpenter.."<br>
                    </div>
                    <input type="submit" class="form-control submit" value="SEND" onclick="submit2();" name="refer">
                   
                    
                    <script>
                        function submit2() {
                            alert ("Reference Send to Admin Sucessfully");
                        }

                    </script>

                </form>

            </div>

        </section>



        <footer>
            <p>Copyright &copy; Homework 2018 | All rights reserved</p>
        </footer>

</body>

</html>
