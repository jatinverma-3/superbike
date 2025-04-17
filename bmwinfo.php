<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperBike Information</title>
    <link rel="stylesheet" href="bmwinfo.css">
</head>
<body>

    <div class="container">
        <nav class="nav">
            <img src="bmw.jpeg" class="logo">
            <p class="logo"><h1>BMW MOTORRAD</h1></p>
            <a href="ducatiinfo.php" class="btn">Next Bike</a>
        </nav>
     <div id="war">

     </div>
       <div class="content">
            <h2>THE BMW</h2><h1>S1000 RR</h1>
            <br>
            <h3>Specifications</h3>
            <p>
                <span><b>Engine</b> : </span>999 cc
            </p>
            <p>
                <span><b>Engine Type</b> : </span>Water/oil-cooled 4 cylinder 4 stroke in-line engine
            </p>
            <p>
                <span><b>Power</b> : </span>212.91 PS @ 13750 rpm
            </p>
            <p>
                <span><b>Torque</b> : </span>113 Nm @ 11000 rpm
            </p>
            <p>
                <span><b>Fuel Capacity</b> : </span>16.5L
            </p>
            <p>
                <span><b>Mileage</b> : </span>15.62 Kmpl
            </p>
            <p>
                <span><b>Kerb Weight</b> : </span>197 kg
            </p>
            <p>
                <span><b>Brakes</b> : </span>Double Disc
            </p>
            <img src="bikebmw.jpeg" height="500px" width="600px" style="float:right;position:absolute;right:100px;top:200px">
            <h3>Features</h3>
            <p>
                <span>ABS : </span>Dual Channel
            </p>
            <p>
                <span>Mobile Connectivity : </span>Bluetooth
            </p>
            <p>
                <span>Riding Modes : </span>Road,Dynamic,Rain
            </p>
            <p>
                <span>Traction Control</span>
            </p>
            <p>
                <span>Cruise Control</span>
            </p>
            <p>
                <span>Launch Control</span>
            </p>
            <p>
                <span>Power Modes</span>
            </p>
            <p>
                <span>Navigation Assist</span>
            </p>
            <p>
                <span>Adjustable Windshield</span>
            </p>
            <p>
                <span>Low Battery Alert</span>
            </p>
        </div>
        <br><br><br>
        <div id="rent">
        <a href="legal_details.php" class="btn">Rent Now</a>
        </div>

    </div> 
</body>

<?php

function is_rented($bikename)
{
    $conn = mysqli_connect('localhost','root','','superbikes');   // Database connection
    if(!$conn)
    {
        die("Could not connect");
    }
    $sql = "SELECT bike_name FROM bike_details WHERE current_status='rented' AND bike_name='" . $bikename . "'";
    $r = mysqli_query($conn,$sql);
    if($r !== null && $r->num_rows>0)
    {
        mysqli_close($conn);
        return true;
    }else{
        mysqli_close($conn);
        return false;
    }
}


if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true)
{
    
    $s = is_rented("BMW S1000 RR");
    if($s == true)
    {
        echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
        <script>
        $(document).ready(function(){
            $('#war').html('<p>This bike is already on rent</p>');
            $('#war').css({ 'font-family' : '20px' , 'color' : 'red' });
            $('#rent').attr('hidden' , true);
        });
        </script>";
    }
    
}else{
    echo "<script>
    alert('Please login');
    window.location.href='signin.php';
    </script>";
}
?>


</html>