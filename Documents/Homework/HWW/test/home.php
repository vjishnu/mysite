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
     

    <link rel="stylesheet" href="../css/home.css">

</head>

<body>
    
    
 <div id="header">
                
               <center> <img  src="../css/500_F_112091769_vWEmDiwVIpO4H1plGuhYgnmduTuiGUh2.jpg" alt="adminlogo" id="adminlogo"><br><h1> Welcome Admin</h1></center></div>
    

    <div class="nav">
        
        
       
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="../admin/user_man.php">User Managment</a></li>
            <li><a href="refer.php">References</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="../admin/login.php?logout='1'">Logout</a></li>
        </ul> 
            </div>


<script src="js/jquery-3.2.1.js" type="text/javascript">
         function toggleSidebar(){
             document.getElementById("nav").classList.toggle('active');
         }
         
         
    </script>


</body>

</html>
