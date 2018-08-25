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
        header('location: reference.php');
    }
 
    $user_msg="Login | Sign Up";
    $login_url="login.html";

     if(isset($_GET['id']))
    {
        $id=$_GET['id'];
        
        $result=mysqli_query($connection,"SELECT * FROM user_details WHERE user_id='$id'");
    }

    $host="localhost";
    $user="root";
    $pass="password";
    $db_name="homework";
    $conn=mysqli_connect("localhost","root","password","homework") or die("could not connect to database");
    if(isset($_POST['Search']))
    {
    $valueToSearch=$_POST['valueToSearch'];
    $query="SELECT * FROM reference_details WHERE CONCAT(re_name,mobile,service) LIKE '%".$valueToSearch."%'";
    $search_result=filterTable($query);
    }
    
    else{
    $query="SELECT * FROM reference_details";
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
    <link rel="stylesheet" href="../test/test.css">
    <link rel="stylesheet" href="../css/home.css">

    <style>
        body {
            background-image: url(../images/background_7.jpg);
            background-size: cover;
        }

        .side-nav ul {
            margin-left: 37px;



        }

        .side-nav {
            margin-left: -4px;
        }

        #header h1 {
            margin-top: 3px;
            font-family: serif;
            font-size: 30px;

        }

        .references {
            width: 300px;
        }

        .references h2 a {
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

        .references h2 a:hover {
            background-color: white;
            color: #041ca2;
        }

        .modal {
            color: black;
            text-align: left;
            font-weight: normal;
        }

        .modal a {
            text-decoration: none;

        }

        .modal-header h5 {
            font-size: 20px;
        }


        .modal-body {
            font-size: 16px;
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
    <form method="post" action="reference.php">
    <input type="text" name="valueToSearch" placeholder="value to search"><br>
    <br>
    <input type="submit" name="Search" value="filter"><br><br></div>
    </form>
        <h1>
            <?php
    
        $result=mysqli_query($connection,"SELECT * FROM reference_details");
    ?>

                <?php while($row=mysqli_fetch_array($search_result)) { ?>

                <div class="references">
                    <h3><label>Name:</label>
                        <?php echo $row['re_name'];?> </h3>
                    <h3><label>Ph:</label>
                        <?php echo $row['mobile'];?> </h3>

                    <h3><label>Service:</label>
                        <?php echo $row['service'];?> </h3>

                    <!--<h2><a href="reference.php?del=<?php echo $row[ 'ref_id'];?>">Delete</a></h2>-->

                    <h2><a href="javascript:void(0)" data-toggle="modal" data-target="#DelRef<?php echo $row['ref_id'];?>">DELETE</a></h2>



                    <!-- .................................................................. -->


                    <!-- Modal for clearing all feedbacks-->
                    <div class="modal fade" id="DelRef<?php echo $row['ref_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <?php echo $row['re_name']; ?>?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-danger" href="reference.php?del=<?php echo $row[ 'ref_id'];?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- .................................................................. -->

                </div>
                <?php }?>
        </h1>
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

    <script src=jquery-3.2.1.min.js></script>
    <script src="tmjs.js"></script>


</body>

</html>
