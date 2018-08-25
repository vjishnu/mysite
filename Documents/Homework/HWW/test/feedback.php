<?php include('../php/admin_server.php'); 

     //if user is not logged in, they can't access this page
    if(empty($_SESSION['admin_name']))
    {
        header('location: login.php');
    }



    if(isset($_GET['del_f']))
    {
        $id=$_GET['del_f'];
        mysqli_query($connection,"DELETE FROM feedback_details WHERE f_id=$id");
        
    }

    if(isset($_POST['clear']))
            {

                $clear="DELETE FROM feedback_details";
                mysqli_query($connection,$clear);


                $resetid="ALTER TABLE feedback_details AUTO_INCREMENT=1";
                mysqli_query($connection,$resetid);

               

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

        .feedback_container {
            width: 50%;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border: 1px solid white;
        }

        th,
        tr,
        td {
            border: 1px solid black;
            background-color: aliceblue;
        }

        thead th {
            border: 1px solid white;
            background-color: black;
            color: white;
        }


        .del a {

            color: red;
            text-decoration: none;

        }

        .modal {
            color: black;

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



    <div class="feedback_container">


        <?php
            $results=mysqli_query($connection,"SELECT * FROM feedback_details");
            
            $count=mysqli_num_rows($results);
            ?>


            <h2>FEEDBACKS</h2>

            <div class="">
                <table class="table table-condensed">

                    <thead class="thead-dark ">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($row=mysqli_fetch_array($results)){ ?>
                        <tr>
                            <td>
                                <?php echo $row['name']; ?>
                            </td>
                            <td>
                                <?php echo $row['email']; ?>
                            </td>
                            <td>
                                <?php echo $row['message']; ?>
                            </td>

                            <td class="del">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#DelFeedback<?php echo $row['f_id'];?>">Delete</a>
                            </td>
                        </tr>

                        <!-- .................................................................. -->


                        <!-- Modal for deleting a feedback-->
                        <div class="modal fade" id="DelFeedback<?php echo $row['f_id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this feedback?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-danger" href="feedback.php?del_f=<?php echo $row['f_id'];?>">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- .................................................................. -->




                        <?php } ?>
                    </tbody>


                </table>


                <div class="contain_clear">
                    <button type="button" class="btn btn-outline-danger clear" data-toggle="modal" data-target="#ClearFeedback">
                          Clear
                        </button>

                </div>

            </div>

            <!-- .................................................................. -->


            <!-- Modal for clearing all feedbacks-->
            <div class="modal fade" id="ClearFeedback" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Clear</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to clear all feedbacks?
                        </div>
                        <div class="modal-footer">
                            <form action="feedback.php" method="post">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>




                                <button type="submit" class="btn btn-danger" name="clear">CLEAR</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <!-- .................................................................. -->



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
    <script src="tmjs.js "></script>


</body>

</html>
