<?php include('php/connect.php'); ?>
<?php include('php/login_reg.php'); 

    //if user is not logged in, they can't access this page
    if(empty($_SESSION['name']))
    {
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HomeWork | user</title>

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/user.css">

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


        .edit_d {
            clear: both;
            width: 500px;
            position: absolute;
            top: 650px;
            margin-left: 50%;
            transform: translate(-50%);
            margin-bottom: 55px;
        }


        .edit_d h3 {
            color: white;
        }

        .edit_d form {
            width: 450px;
            margin: 0 auto;
            padding-top: 25px;
        }

        .edit_d label {
            float: left;
            font-size: 20px;
            color: white;
            padding:20px;
            width: 300px;
        }

        .edit_d input[type=text] {
            float: right;
            width: 300px;
            height: 25px;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size:24px;

            background:transparent;
            color:white;
            padding:20px;

        }

        .edit_d input[type=submit] {
            
            width: 80px;
            height: 50px;
            
            margin: 0 auto;
            background-color: green;
            color: white;
            padding: 0px;
            border: 1px solid green;
            border-radius: 5px;
        }


        .edit_d input[type=submit]:hover {
            background-color: #054305;
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


                <!--                if the user is logged in, this will show the user name and logout button -->
                <?php if(isset($_SESSION['name'])): ?>
                <?php 
                        $user_msg=$_SESSION['name'];
                        $login_url="#";
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


    <div class="user">
        <div class="box2">
            <img src="css/500_F_112091769_vWEmDiwVIpO4H1plGuhYgnmduTuiGUh2.jpg" class="userpro">


            <?php 
            
                if(isset($_SESSION['name']))
                    $name=$_SESSION['name'];
                    
                $user_details=mysqli_query($connection,"SELECT * FROM user_details WHERE user_name='$name'" );
            
            ?>

            <?php while($row=mysqli_fetch_array($user_details)){ ?>

            <h1><br><span>
                <?php echo $row['user_name']; ?><br>
                </span>
                <?php echo $row['category']; ?>
            </h1>
            <div class="left">
                <h2><br><br>PH:
                    <?php echo $row['mobile_no']; ?><br><br>SERVICE AREA :
                    <?php echo $row['service_area']; ?>
                </h2>
            </div>
            <div class="right">

            
                <h3><br><br>STREET:
                    <?php echo $row['street']; ?><br><br>CITY:
                    <?php echo $row['city'] ;?><br><br>STATE:
                    <?php echo $row['state']; ?>
                </h3>
            </div>

            <?php } ?>


        </div>
    </div>



    <?php 
    
        $phone_no="";
    $serv_area="";
    $street="";
    $city="";
    $state="";
    
       $u_name=$_SESSION['name'];
    
    if(isset($_POST['edit_details']))
    {
    $phone_no=$_POST['phone_no'];
    $serv_area=$_POST['serv_area'];
    $street=$_POST['street'];
    $city=$_POST['city'];
    $state=$_POST['state'];
        
    mysqli_query($connection,"UPDATE user_details SET mobile_no='$phone_no', service_area='$serv_area', street='$street', city='$city', state='$state' WHERE user_name='$u_name'");
        
    header('location: user.php');
        
        
        
    }
    
    
    
    
    
    ?>



    <?php
    
    
    $u_name=$_SESSION['name'];
    
    $res=mysqli_query($connection,"SELECT * FROM user_details WHERE user_name='$u_name'");   
    
    ?>


        <div class="edit_d">

            <h3>Edit Details</h3>
            <hr>
            <form action="user.php" method="post">


                <?php while($row=mysqli_fetch_array($res)){?>

                <label for="phone">Phone No</label>
                <input type="text" value="<?php echo $row['mobile_no']; ?>" name="phone_no" required autocomplete="off" maxlength="10">
                <br><br>
                <label for="serv_area">Service Area</label>
                <input type="text" value="<?php echo $row['service_area']; ?>" name="serv_area" required autocomplete="off">
                <br><br>
                <label for="street">Street</label>
                <input type="text" value="<?php echo $row['street']; ?>" name="street" required autocomplete="off">
                <br><br>
                <label for="city">City</label>
                <input type="text" value="<?php echo $row['city']; ?>" name="city" required autocomplete="off">
                <br><br>
                <label for="State">State</label>
                <input type="text" value="<?php echo $row['state']; ?>" name="state" required autocomplete="off">
                <br><br>
                <div class="sub1">
                <input type="submit" value="Update" name="edit_details"></div>

                <?php } ?>

            </form>







        </div>






</body>

</html>
