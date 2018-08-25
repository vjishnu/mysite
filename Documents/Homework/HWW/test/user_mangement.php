<?php include('../php/admin_server.php'); 

     //if user is not logged in, they can't access this page
    if(empty($_SESSION['admin_name']))
    {
        header('location: login.php');
    }


      if(isset($_GET['del']))
    {
        $id=$_GET['del'];
        
        $result=mysqli_query($connection,"DELETE FROM user_details WHERE user_id='$id'");
    }


   
    $host="localhost";
    $user="root";
    $pass="password";
    $db_name="homework";
    $conn=mysqli_connect("localhost","root","password","homework") or die("could not connect to database");
    if(isset($_POST['Search']))
    {
    $valueToSearch=$_POST['valueToSearch'];
    $query="SELECT * FROM user_details WHERE CONCAT(user_id,user_name,mobile_no,password,service_area,street,city,state,category) LIKE '%".$valueToSearch."%'";
    $search_result=filterTable($query);
    }
    
    else{
    $query="SELECT * FROM user_details";
    $search_result=filterTable($query);
    }
    
    function filterTable($query)
    {
        $conn=mysqli_connect("localhost","root","password","homework") or die("could not connect to database");
        $filter_Result=mysqli_query($conn,$query);
        return $filter_Result;
    
    }
    
    
    
    
    ?>







<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>


    <link rel="stylesheet" href="tmcss.css">

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../test/test.css">



    <style>
        body {
            background-image: url(../images/background_7.jpg);
            background-size: contain;
            background-repeat: repeat;


        }

        .side-nav ul {
            margin-left: 37px;



        }

        .side-nav {
            margin-left: -4px;
        }

        .box4 {
            font-size: 24px;
            font-weight: 100;
            width: 520px;

        }

        .box4 label {
            float: left;
            font-family:  'century  Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin-left: 40px;
            font-size: 18px;

        }

        


        .box4 h2 a {
            background-color: #041ca2;
            display: block;
            width: 120px;
            margin: 0 auto;
            margin-top: 8px;
            padding: 8px;
            border-radius: 8px;
            border: 1px solid #041ca2;
            transition: all ease .5s;
        }

        .box4 h2 a:hover {
            background-color: white;
            color: #041ca2;
        }

        .modal {
            color: black;
            position: relative;
        }

        .modal a {
            text-decoration: none;
        }

        .modal-header button {
            font-size: 20px;
            height: 25px;
            width: 25px;
            color: white;
            background-color: red;
            position: absolute;
            top: 5px;
            right: 5px;
        }
        table
        {
            margin-left:60px;
        }
        .caps{
            text-transform: uppercase;
            font-size: 18px;
        }
        
        .filter {
            margin-left:40%;
            
            


        }
        .filter input {
            background:transparent;
            color:#fff;
            letter-spacing:2px;
            font-size:24px;
            padding:10px;
        }
        .filter input[type='submit']:hover {
            
            cursor:pointer;
            background:#ff0111;
            color:#000;
        }
        .filter input[type='submit']{
            margin-left:110px;
        }

    </style>

</head>

<body>
    <div id="header">

        <center> <img src="../css/500_F_112091769_vWEmDiwVIpO4H1plGuhYgnmduTuiGUh2.jpg" alt="adminlogo" id="adminlogo"><br>
            <h1> Welcome
                <?php echo $_SESSION['admin_name']  ?>
            </h1>
        </center>
    </div>

    <nav class="navbar">
        <span class="open-slide">
        <a href="#" onclick="openSideMenu()">
        <svg width="30">
            
        <path d="M0,5,30,5" stroke="#fffcfc"
              stroke-width="4"/> 
            <path d="M0,14,30,14" stroke="#fffcfc"
              stroke-width="4"/>  
             <path d="M0,23,30,23" stroke="#fffefe"
              stroke-width="4"/>  
         </svg>
        
        </a></span>


    </nav>
    <div id="side-menu" class="side-nav">

        <a href="#" class="btn-close" onclick="closeSideMenu()">&times;</a>
        <ul>
            <li><a href="test.php">Home</a></li>
            <li><a href="user_mangement.php">User Managment</a></li>
            <li><a href="reference.php">References</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="../admin/login.php?logout='1'">Logout</a></li>
        </ul>
    </div>
    <div id="main">
<div class="filter">
    <form method="post" action="user_mangement.php">
    <input type="text" name="valueToSearch" placeholder="value to search"><br>
    <br>
    <input type="submit" name="Search" value="filter"><br><br></div>
    </form>
  
  <?php
    
        $result=mysqli_query($connection,"SELECT * FROM user_details");
    
    
    ?>
            <?php while($row=mysqli_fetch_array($search_result)) {?>
            <div class="box4">
            <table>
            
                <tr><th><h1><label>Name</label></th>
                    <td><div class="caps"> <?php echo $row['user_name'];?></div> </h1></td></tr>
                    
                <tr><th> <h1><label>Ph</label></th>
                    <td><div class="caps"> <?php echo $row['mobile_no'];?></div> </h1></td></tr>
               
                <tr><th> <h1><label>Service area</label></th>
                    <td><div class="caps"><?php echo $row['service_area'];?></div></h1></td></tr>
               
                 <tr><th> <h1><label>Street</label></th>
                    <td><div class="caps"> <?php echo $row['street'];?> </div></h1></td></tr>
                
                <tr><th> <h1><label>City</label></th>
                     <td><div class="caps"><?php echo $row['city'];?></div></h1></td></tr>
                
                 <tr><th><h1><label>State</label></th>
                 <td> <div class="caps"> <?php echo $row['state'];?> </div></h1></td></tr>

               <tr><th><h1><label>Category</label></th>

               <td> <div class="caps"><?php echo $row['category'];?></div> </h1></td></tr></table>

                <!--<h2> <a href="user_management.php?del=<?php echo $row[ 'user_id'];?>">Delete</a></h2>-->

                <h2> <a href="javascript:void(0)" data-toggle="modal" data-target="#DelUser<?php echo $row['user_id'];?>">DELETE</a></h2>
            </div>


            <!-- .................................................................. -->


            <!-- Modal for clearing all feedbacks-->
            <div class="modal fade" id="DelUser<?php echo $row['user_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete
                            <?php echo $row['user_name']; ?>?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-danger" href="user_mangement.php?del=<?php echo $row[ 'user_id'];?>">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- .................................................................. -->



            <?php }?>
    </div>








    <script>
        function openSideMenu() {
            document.getElementById('side-menu').style.width = '250px';
            document.getElementById('main').style.marginLeft = '250px';

        }

        function closeSideMenu() {
            document.getElementById('side-menu').style.width = '0px';
            document.getElementById('main').style.marginLeft = '0px';

        }

    </script>

    <script src="jquery-3.2.1.min.js"></script>

    <script src="tmjs.js"></script>
