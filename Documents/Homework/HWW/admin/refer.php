<?php include('../php/admin_server.php'); 
 //if user is not logged in, they can't access this page
    if(empty($_SESSION['admin_name']))
    {
        header('location: login.php');
    }


     //deleting records
    if(isset($_GET['del']))
    {
        $id=$_GET['del'];
        mysqli_query($connection,"DELETE FROM reference_details WHERE ref_id=$id");
        header('location: refer.php');
    }


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin | References</title>
    <link rel="stylesheet" href="../css/home.css">

</head>

<body>
     <div id="header">
                
               <center> <img  src="../css/500_F_112091769_vWEmDiwVIpO4H1plGuhYgnmduTuiGUh2.jpg" alt="adminlogo" id="adminlogo"><br><h1> Welcome Admin</h1></center></div>



    <div class="nav">
        <ul>
            <li><a href="test.php">Home</a></li>
            <li><a href="user_man.php">User Managment</a></li>
            <li><a href="refer.php">References</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="login.php?logout='1'">Logout</a></li>
        </ul>
    </div>



    <?php
    
        $result=mysqli_query($connection,"SELECT * FROM reference_details");
    
    
    ?>


     <?php while($row=mysqli_fetch_array($result)) { ?>

       <div class="references">
       <h3> <?php echo $row['re_name'];?> </h3>
       <h3> <?php echo $row['mobile'];?> </h3>
       
      <h3> <?php echo $row['service'];?> </h3>
      
      <h2> <a href="user_man.php?del=<?php echo $row[ 'ref_id'];?>">Delete</a></h2>
               
    </div>
     <?php }?>

           




    



</body>

</html>
