<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>HomeWork | Home</title>

    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">


</head>

<body>



    <a href="index.php" id="page_name"><img src="images/smpl.png" alt=""></a>
    <nav>

        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php#topsec">Categories</a></li>
            <li><a href="index.php#contactus">Contact Us</a></li>
            <li><a href="login.php">Login | Sign Up</a></li>
        </ul>

    </nav>




    <style>
        body {
            background-image: url(images/slide1.jpg);
            background-size: cover;
        }

        .whole {
            width: 80%;
            margin: 0 auto;
            text-transform:uppercase;
        }

        table {
            margin: 0 auto;
            margin-left: 0px;
            width: 100%;
            margin-top: 100px;
            float: right;


        }

        table,
        th,
        td {
            color: #fff;
            border-collapse: collapse;
            border: 1px dotted white;
            text-align: center;
            font-family: serif;


        }

        th {
            color: darkturquoise;
            font-size: 20px;
            font-weight: 200;
            font-family: sans-serif;
            text-transform: uppercase;
            padding: 17px;

        }

        td {
            padding: 17px 20px;
            font-size: 17px;
            font-family: sans-serif;

        }

        th:nth-child(even) {
            background-color: #181b2f
        }

        tr:nth-child(even) {
            background-color: #181b2f
        }

        tr:nth-child(odd) {
            background-color: #000
        }

    </style>


    <?php include('php/connect.php'); ?>

    <div class="whole">
        <?php        
     if(isset($_POST['search'])){
       
         
         $category=$_POST['category'];
         $service_area=$_POST['service_area'];
        
         $query="SELECT * FROM user_details WHERE category='$category' AND service_area='$service_area'";
         $result=mysqli_query($connection,$query) or die('error getting data');
         
         $count=mysqli_num_rows($result);

        if($count>0)
         {
             echo"<table>";
         echo "<tr> <th>User Name</th>
         <th>Mobile Number</th> 
         <th>Service Area</th> 
         <th>Street</th> 
         <th>City</th> 
         <th>State</th>
         <th style='text-align:right'>Category</th> </tr>";
         echo "<tr> </tr>";
         }
         elseif($count==0)
         {
            header('location:null2.php');
            echo "<center>SORRY! PLEASE ENTER LOCATION AND CATEGORY<br>";

         }
         else{
            header('location:null.php');
         }
         
         
         while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
          
           echo "<tr><td>";
             echo $row['user_name'];
             echo "</td><td>";
             echo $row['mobile_no'];
             echo "</td><td>";
             echo $row['service_area'];
             echo "</td><td>";
             echo $row['street'];
             echo "</td><td>";
             echo $row['city'];
             echo "</td><td>";
             echo $row['state'];
             echo "</td><td>";
             echo $row['category'];
             echo "</td></tr>";
             
             
             
         }
         
         
               
          echo"</table>";
     } 

        
 ?>

    </div>


</body>

</html>
