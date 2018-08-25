<?php 

    session_start();

    // Creating the database connection
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
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

    $admin_name="";
    $password="";
    $errors=array();


    // log user

    if(isset($_POST['login'])){
        $admin_name=$_POST['admin_name'];
        $password=$_POST['password'];
        
        
        if(count($errors)==0)
        {           
            $query="SELECT * FROM admin_details WHERE admin_name='$admin_name' AND password='$password'";
            $result=mysqli_query($connection,$query);
            
            if(mysqli_num_rows($result)==1)
            {
                //log user in
                $_SESSION['admin_name']=$admin_name;
                $_SESSION['success']="You are now logged in";
                header('location: ../test/test.php'); // redirect to admin_page                
            }
            else
            {
                array_push($errors, "The Admin ID and Password does not match!!");                
            }
        
        
        
        
        }
        
    }






    //logout
    if(isset($_GET['logout']))
    {
        session_destroy();
        unset($_SESSION['admin_name']);
        header('location: login.php');
        
    }



?>
