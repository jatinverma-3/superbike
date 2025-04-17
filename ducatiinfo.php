<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperBike Information</title>
    <link rel="stylesheet" href="ducatiinfo.css">
</head>
<body>

    <div class="container">
        <nav class="nav">
            <img src="bmw.jpeg" class="logo">
            <p class="logo"><h1>DUCATI</h1></p>
            <a href="h2rinfo.php" class="btn">Next Bike</a>
        </nav>

        <div id="war">

        </div>
       <div class="content">
            <h2>THE DUCATI PANIGALE</h2><h1>V4 R</h1>
            <br>
            <h3>Specifications</h3>
            <p>
                <span><b>Engine</b> : </span>998 cc
            </p>
            <p>
                <span><b>Engine Type</b> : </span>Desmosedici Stradale 90° V4, Rotating Crankshaft,4 Desmodromically Actuated Valves Per Cylinder, Liquid-cooled
            </p>
            <p>
                <span><b>Power</b> : </span>220 PS 15250 rpm
            </p>
            <p>
                <span><b>Torque</b> : </span>112 Nm @ 11500 rpm
            </p>
            <p>
                <span><b>Fuel Capacity</b> : </span>16L
            </p>
            <p>
                <span><b>Mileage</b> : </span>13.1 Kmpl
            </p>
            <p>
                <span><b>Kerb Weight</b> : </span>193 kg
            </p>
            <p>
                <span><b>Brakes</b> : </span>Double Disc
            </p>
            <img src="img/bike3.jpeg" height="500px" width="600px" style="float:right;position:absolute;right:100px;top:200px">
            <h3>Features</h3>
            <p>
                <span>ABS : </span>Dual Channel
            </p>
            <p>
                <span>Riding Modes : </span>Road,Dynamic,Rain
            </p>
            <p>
                <span>Speedometer : </span>Digital
            </p>
            <p>
                <span>Odometer : </span>Digital
            </p>
            <p>
                <span>Tripmeter : </span>Digital
            </p>
            <p>
                <span>Traction Control</span>
            </p>
            <p>
                <span>Quick Shifter</span>
            </p>
            <p>
                <span>LED Tail Light</span>
            </p>
            <p>
                <span>Power Modes</span>
            </p>
            <p>
                <span>Fuel Gauge</span>
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

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
    $s = is_rented("Ducatti Panigale V4 R");
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
}

?>
</html>