<?php 

    // Creating the database connection
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="password";
    $dbname="homework";
    $connection=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    // testing if connection occurred
    if(mysqli_connect_errno())
    {
        die("Database connection failed : ").
            mysqli_connect_error().
            " (".mysqli_connect_errno().")" ;
    }
?>


<?php 

    $name="";
 $phone_no=""; $pass1=""; $pass2=""; $service_area=""; $street=""; $city=""; $state="";
$category="";

$pass_error="";
$login_error=""; 
// registering new user
 if(isset($_POST['register']))
    {
        
        $name=$_POST['name'];
        $phone_no=$_POST['phone'];
         $pass1=$_POST['pass1'];
         $pass2=$_POST['pass2'];
         $service_area=$_POST['area'];
         $street=$_POST['street'];
         $city=$_POST['city'];
         $state=$_POST['state'];
        
        if (isset($_POST['category'])) 
            $category= $_POST['category'];

     
        // to check if the user name entered already exist in the database
        $check_name="SELECT * FROM user_details WHERE user_name='$name'";
        $res_name=mysqli_query($connection,$check_name) or die(mysqli_error($connection));
     
     
        if(mysqli_num_rows($res_name)>0)
        {
            $name_error="This User name is taken"; 
        }
        else  
        {
            if($pass1===$pass2)
            {
                session_start();
                    //inserting
               $query="INSERT INTO user_details (user_name,mobile_no,password,service_area,street,city,state,category) VALUES ('$name','$phone_no','$pass1','$service_area','$street','$city','$state','$category')"; mysqli_query($connection,$query);
                
                $_SESSION['name']=$name;
            header('location: user.php');
            }
            else{
                $pass_error="The passwords do not match";
                
            }
            
            
     
       
            
        
            
        }
     
     
                     
            
        
    }




    //loging in existitng user
 if(isset($_POST['login']))
 {
    
     
     $name=$_POST['name'];
     $pass1=$_POST['pass'];
     
     $query="SELECT user_name,password FROM user_details";
    $result=mysqli_query($connection,$query);
     
     
     while($row=mysqli_fetch_array($result))
     {
         $db_name=$row['user_name'];         
         $db_password=$row['password'];
         
         
         if($name==$db_name && $pass1==$db_password)
         {
             session_start();
               //log user in
             $_SESSION['name']=$db_name;  
             
     
            
                header('location: user.php');             
             
         }
         else
         {
            $login_error="Invalid E-Mail/Password Combination"; 
         }
     } 
     
 }

 // logout user

    if(isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION['name']);
        header('location: index.php');
    }




   





?>
