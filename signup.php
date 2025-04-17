<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style1.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="wrapper">
        <form action="signup.php" method="post">
            <h1>SIGN UP</h1>

            <div class="input-box">
                <div class="input-field">
                    <input type="text" id="fullname" name="fullname" placeholder="Full Name" required>
                <i class='bx bxs-user'></i>
                </div>
                <div class="input-field">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                <i class='bx bxs-user-circle'></i>
                </div>
            </div>

            <div class="input-box">
                <div class="input-field">
                    <input type="email" id="email" name="email" placeholder="Email" required>
            <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-field">
                    <input type="number" id="phonenumber" name="phonenumber" placeholder="Phone Number" required>
            <i class='bx bxs-phone'></i>
                </div>
            </div>

            <div class="input-box">
                <div class="input-field">
                    <input type="password" id="password" name="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt'></i>
                </div>
                <div class="input-field">
                    <input type="password" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required>
            <i class='bx bxs-lock'></i>
                </div>
            </div>

            <label><input type="checkbox">
                I attest that the information presented above is accurate and verifiable.
            </label>

            <button type="submit" class="btn"> SIGN UP </button>

        </form>
    </div>

<?php

function checkforrecords($name,$username)
{
    $conn=mysqli_connect("localhost" , "root" , "" , "superbikes");
    if(!$conn)
    {
        die("Couldn't Connect");
    }
    $sql="SELECT * FROM registration WHERE fullname='" . $name . "' AND username='" . $username . "';";
    $result=mysqli_query($conn,$sql);
    if($result != null && $result->num_rows>0)
    {
        mysqli_close($conn);
        return true;  //user doesnt exist
    }else{
        mysqli_close($conn);
        return false; //user exists
    }
}

function check_passwords($pass1,$pass2)
{
    if ($pass1 === $pass2) 
    {
        return 1;   //true
    } else {
        return 0;
    }
}

if($_SERVER['REQUEST_METHOD']=="POST")
{
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phonenumber = $_POST['phonenumber'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword']; //fetch records

        $userexists=checkforrecords($fullname,$username);

        if($userexists == true)
        {
            echo "<script>alert('This user already exists');</script>";
            echo '<script type="text/javascript">window.location.href = "signup.php";</script>'; 
        }
        else if($userexists == false)
        {
            $pass=check_passwords($password,$confirmpassword);
            if($pass == 0)
            {
                echo "<script>alert('Passwords don't match');</script>";
            }
            else if($pass == 1)
            {
                $conn = mysqli_connect('localhost','root','','superbikes');   // Database connection
                if(!$conn)
                {
                    die("Could not connect");
                }
                $stmt = "INSERT INTO registration VALUES ('" . $fullname . "','" . $username . "','" . $email . "'," . $phonenumber . ",'" . $password . "');";
                if(mysqli_query($conn,$stmt))
                {
                    echo "<script>alert('Registration successful! Login to continue');</script>";
                    echo '<script type="text/javascript">window.location.href = "signin.php";</script>'; 
                }else{
                    echo "<script>alert('Error in entering records, try again');</script>";
                }
                mysqli_close($conn);
            }
        }
}


?>

</body>

</html>