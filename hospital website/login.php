<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();//start session
    $con= mysqli_connect ("localhost","root","","DB_NAME");//connect to database
    if(isset($_POST['submit'])){
        $username=($_POST['username']);
        $password=md5($_POST['password']);//encrypt password using php md5
        
        $sql = "SELECT Username,Password,UserType,u_id,Status FROM users
        WHERE Username='$username' AND Password='$password' AND Status='existing'";
        $result = mysqli_query($con,$sql);
        $OUTPUT = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
    //setup session data
    if(mysqli_num_rows($result)==1){
        if($OUTPUT["UserType"]=="Administrator"){
        $_SESSION["USERTYPE"]= $OUTPUT["UserType"];
        $_SESSION["USERNAME"]= strtoupper($OUTPUT["Username"]);
        header("location: viewPatient.php"); 
        }
        else if($OUTPUT["UserType"]=="Doctor"){
        $_SESSION["USERTYPE"]= $OUTPUT["UserType"];
        $_SESSION["USERNAME"]= strtoupper($OUTPUT["Username"]);
        $_SESSION["USERID"]= $OUTPUT["u_id"];
        header("location: viewPatient.php");
        }
        else if($OUTPUT["UserType"]=="Nurse"){
        $_SESSION["USERTYPE"]= $OUTPUT["UserType"];
        $_SESSION["USERNAME"]= strtoupper($OUTPUT["Username"]);
        $_SESSION["USERID"]= $OUTPUT["u_id"];
        header("location: viewPatient.php");
        }
        else if($OUTPUT["UserType"]=="Receptionist"){
        $sql2 = "SELECT r_id,r_name FROM receptionist
        WHERE r_id='$OUTPUT[u_id]' ";
        $result2 = mysqli_query($con,$sql2);
        $OUTPUT2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
        $_SESSION["USERTYPE"]= $OUTPUT["UserType"];
        $_SESSION["USERNAME"]= strtoupper($OUTPUT["Username"]);
        $_SESSION["USERID"]= $OUTPUT["u_id"];
        $_SESSION["USER"]= $OUTPUT2["r_name"];
        header("location: viewPatient.php");
        }
    }
        //throw error if login is incorrect
    else if(mysqli_num_rows($result)<1){
        echo '<script>alert("Invalid User! Please Re-Check Your Credentials!");</script>';
    } 
        else echo '<script>alert("No such Data!");</script>';
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medcare - Hospital Management System </title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <section class="book" id="book">
   
        <h1 class="heading"> <span>Login</span>  </h1>   
         
    
        <div class="row">
    
            <div class="image">
                <img src="image/book-img.svg" alt="">
            </div>
    
            <form action="">
                <h3>Login</h3>
                <input type="text" required placeholder="Email / Username" class="box">
                <input type="password" required placeholder="password" class="box">
                <p> Dont have an account? Register now! </p>
                
                <input type="submit" value="Login" class="btn">
                
                <a href="register.php" link text class="btn"> Register </a>
            </form>
    
        </div>
    
    </section>
    