<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legal Details - Rent Your Superbike</title>
    <link rel="stylesheet" href="styles.css">
    <style>
    </style>
</head>
<body>
   <br><br><br>
   <center>
   <div class="background">
    <div class="booking-form" style="background-color:AntiqueWhite;border:1px solid brown;">
    <h1>Some more information....</h1>
    <p>We need some more information about you, so you can continue renting the bikes. Fill up the form below</p>
   <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
   <label for="aadhar">Aadhar Card Number:</label>
    <input type="text" name="aadhar" id="aadhar"  placeholder="1111 2222 3333" required>
    <br>
    <label for="pan">Pan Card Number:</label>
    <input type="text" name="pan" id="pan"  placeholder="AFZPK7190K" required>
    <br>
    <label for="license">Driving License Number:</label>
    <input type="text" name="license" id="license"  placeholder="MH12 YYYY1111111" required><br><br>
    <input type="Submit" class="btn">
    <br><br>
    </div>
</div>
    </center>
    <br><br><br>
</body>

<?php

function isrecord($name)
{
    $conn = mysqli_connect('localhost','root','','superbikes');   // Database connection
    if(!$conn)
    {
        die("Could not connect");
    }
    $sql="SELECT * FROM legal_details WHERE name='" . $name . "';";
    $result=mysqli_query($conn,$sql);
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

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
    $conn = mysqli_connect('localhost','root','','superbikes');   // Database connection
    if(!$conn)
    {
        die("Could not connect");
    }
    $ispresent=isrecord($_SESSION['name']);
    if($ispresent == true)
    {
        echo '<script type="text/javascript">
        window.location.href = "rent_bike.php";</script>';
    }
    else if($ispresent == false)
    {
        if(!empty($_POST['aadhar']) && !empty($_POST['pan']) && !empty($_POST['license']))
        {
           $aadhar=$_POST['aadhar'];
           $pan=$_POST['pan'];
           $license=$_POST['license'];
           $conn = mysqli_connect('localhost','root','','superbikes');   // Database connection
           if(!$conn)
           {
           die("Could not connect");
           }
           $sql1="INSERT INTO legal_details VALUES('" . $name . "','" . $aadhar . "','" . $pan . "','" . $license . "');";
           if(mysqli_query($conn,$sql1))
           {
           echo '<script type="text/javascript">window.location.href = "rent_bike.php";</script>'; 
           }else{
           echo "<script>alert('Error in entering records, try again');</script>";
           }
        }else{
           echo "<script>alert('Please fill all the details!');</script>";
        }
    }
}
else
{
    echo "<script>alert('Please login to continue');</script>";
    echo '<script type="text/javascript">window.location.href = "signin.php";</script>';
}



?>

</html>