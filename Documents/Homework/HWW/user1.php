<?php include('php/connect.php'); 
    
    $user_msg="Login | Sign Up";
    $login_url="login.html";

     if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        
        $result=mysqli_query($connection,"SELECT * FROM user_details WHERE user_id='$id'");
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
        .box2{
            
        }
		.capital1{
			
			text-transform:uppercase;
			

		}    </style>

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


            <?php while($row=mysqli_fetch_array($result)){ ?>

            <h1><br><span>
			<div class="capital1">
          <?php echo $row['user_name']; ?><br></div>
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
</body>

</html>
