<!DOCTYPE html>
<html lang="en">
<?php
if(isset($_POST['submit'])){
    $email = (int)$_GET['email'];
    $id = (int)$_GET['id'];
    $SQL = "INSERT INTO registration information (email,name, age,password) SELECT email, name, age, password FROM registration information WHERE email = {$email}";
    $result = mysql_query($SQL);
    $email = (int)$_GET['email'];
$email = $_POST['email'];
$name = $_POST['name'];
$age = $_POST['age'];
$password = $_POST['password'];

$conn = new mysqli('localhost','root','','hms');
if($conn -> connect_error){
    die('Connection Failed: '. $conn -> connect_error);
}else{
    $stmt = $conn -> prepare("Insert into registration(email,name,age,password )
    values (?, ?, ?, ?)");
    $stmt -> bind_param("ssis", $email, $name, $age, $password);
    $stmt -> execute();
    echo "registered successfully...";
    $stmt -> close();
    $conn -> close();
}
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
    

        <h1 class="heading"> <span>Register</span>  </h1>  
        <a href="login.php" link text class="btn"> Back to Login </a>  
    
        <div class="row">
    
            <div class="image">
                <img src="image/book-img.svg" alt="">
            </div>
    
            <form action="test.php?email=<?php echo $readrow['email']; ?>" method="post">
                <h3>Register</h3>
                <input type="text" required placeholder="username" name="username" class="box">
                <input type="password" required placeholder="password" class="box" name="password">
                
                
                <input type="submit" value="Login" class="btn" name="submit">
            </form>
    
        </div>
    
    </section>
</body>