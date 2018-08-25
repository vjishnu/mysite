<?php include('php/connect.php'); ?>
<?php include('php/login_reg.php'); ?>

<?php
    $user_msg="Login | Sign Up";
    $login_url="login.php";


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
    <link rel="stylesheet" href="../HW/css/profiles.css">
        <style>
            .boxxx h3{

    
    margin-top: 50px;
    text-align: center;
    font-family: 'century  Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-weight: 100;
    text-transform: uppercase;
    letter-spacing: 2px;
    
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

  
        
          <section class="sect2">


                <div id="contentt">
                    <ul>

                        <?php while($row=mysqli_fetch_array($result)){ ?>
                        

                        <li>
                            <div class="boxxx xop-boxx xop-1">
                               
                                
                                <a href="user1.php?id=<?php echo $row['user_id']; ?>">
                                    <h3>
                                   <div class="pro"><?php echo $row['user_name']; ?><br></div>
                                        
                                        <?php echo $row['mobile_no']; ?><br>
                                        <?php echo $row['service_area']; ?><br>
                                        
                                    </h3>
                                </a>
                        
                            </div>
                        </li>

                        <?php } ?>
                    </ul>
                </div>

            </section>
        </body>
         
       
    </html>

