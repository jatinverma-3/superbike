<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style2.css">
    <title>SIGN IN</title>
</head>
<body bgcolor="black">
    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="signin.php" method="post">
                    <h2>SIGN IN</h2>
                    <div class="inputbox">
                        <ion-icon name="mail"></ion-icon>
                        <input type="email" name="email" required> 
                        <label for="email">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed"></ion-icon>
                        <input type="password" name="password" required>
                        <label for="password">Password</label>
                    </div>
                    <div class="forget">
                        <label for="">
                            <input type="checkbox">Remember Me &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="#">Forget Password</a></label>
                    </div>
                    <button>Log in</button>
                    <div class="register">
                    </form>
                </div>
            </div>
        </section>
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js">
        </script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js">
        </script>

<?php

function verify_record($email,$password)
{
    $conn=mysqli_connect("localhost" , "root" , "" , "superbikes");
    if(!$conn)
    {
        die("Unable to connect");
    }  
    $sql="SELECT email,password from registration WHERE email='" . $email . "' and password='" . $password . "'";  
    $result = mysqli_query($conn, $sql);  
    if($result!==NULL && $result->num_rows==1)
    {
        mysqli_close($conn);
        return true; //success
    }
    else
    {
        mysqli_close($conn);
        return false;
    }
}

function retrive_name($email)
{
    $conn = mysqli_connect('localhost','root','','superbikes');   // Database connection
    if(!$conn)
    {
        die("Could not connect");
    }
    $sql="SELECT fullname FROM registration WHERE email='" . $email . "';";
    $res=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_row($res))
    {
        $name=$row[0];
    }
    return $name;
}

session_start();

// Check if the user is already logged in, if yes, redirect them to the dashboard
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
    header("location: dashboard.php");
    exit;
}

if($_SERVER['REQUEST_METHOD']=="POST")
{
    if(empty($_POST['email']) || empty($_POST['password']))
    {
        echo "<script>alert('Please fill all details');</script>";
    }
    
    if(!empty($_POST['email']) && !empty($_POST['password']))
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $status=verify_record($email,$password);
        if($status == false)
        {
            echo "<script>alert('Invalid email or password');</script>";
        }
        if($status == true)
        {
            $_SESSION["loggedin"] = true;
            $_SESSION["email"] = $email;  
            $_SESSION["name"] =  retrive_name($email);                                   
            // Redirect user to dashboard page
            echo "<script>console.log('" . $_SESSION['name'] . "');</script>";
            echo '<script type="text/javascript">window.location.href = "index.php";</script>';
        }
    }
}

/*if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    $conn = mysqli_connect('localhost','root','','superbikes');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed : ". $conn->connect_error);
    }

    // Check if the user exists
    $check_query = "SELECT * FROM registration WHERE email='$email' AND password='$password'";
    $check_result = mysqli_query($conn, $check_query);
    if(mysqli_num_rows($check_result) > 0) {

    // User exists, start session
        $_SESSION['email'] = $email;
        echo "Login successful...";
    header("Location: index.html");
    exit();
    } else {
        echo "Invalid email or password.";
    }

    mysqli_close($conn);
}*/

?>

</body>
</html>