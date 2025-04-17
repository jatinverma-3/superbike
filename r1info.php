<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperBike Information</title>
    <link rel="stylesheet" href="r1info.css">
</head>
<body>

    <div class="container">
        <nav class="nav">
            <img src="bmw.jpeg" class="logo">
            <p class="logo"><h1>YAMAHA</h1></p>
            <a href="bmwinfo.php" class="btn">Next Bike</a>
        </nav>

        <div id="war">

        </div>
       <div class="content">
            <h2>THE YAMAHA</h2><h1>R1</h1>
            <br>
            <h3>Specifications</h3>
            <p>
                <span><b>Engine</b> : </span>998 cc
            </p>
            <p>
                <span><b>Engine Type</b> : </span>4-stroke, liquid-cooled, forward-inclined parallel 4-cylinder, 4-valves, DOHC Engine
            </p>
            <p>
                <span><b>Power</b> : </span>200 PS @ 13500 rpm
            </p>
            <p>
                <span><b>Torque</b> : </span>112.4 Nm @ 11500 rpm
            </p>
            <p>
                <span><b>Fuel Capacity</b> : </span>17L
            </p>
            <p>
                <span><b>Mileage</b> : </span>12 Kmpl
            </p>
            <p>
                <span><b>Kerb Weight</b> : </span>200 kg
            </p>
            <p>
                <span><b>Brakes</b> : </span>Double Disc
            </p>
            <img src="img/bike5.png" height="500px" width="600px" style="float:right;position:absolute;right:100px;top:200px">
            <h3>Features</h3>
            <p>
                <span>ABS : </span>Dual Channel
            </p>
            <p>
                <span>Riding Modes : </span>Road,Rain,Sports
            </p>
            <p>
                <span>Speedometer : </span>Digital
            </p>
            <p>
                <span>Odometer : </span>Digital
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
                <span>LED Tail Light</span>
            </p>
            <p>
                <span>Quick Shifter</span>
            </p>
        </div>
        <br><br><br>
        <a href="legal_details.php" class="btn">Rent Now</a>
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
    
    $s = is_rented("Yamaha R1");
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