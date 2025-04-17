<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperBike Information</title>
    <link rel="stylesheet" href="hayabusainfo.css">
</head>
<body>

    <div class="container">
        <nav class="nav">
            <img src="bmw.jpeg" class="logo">
            <p class="logo"><h1>SUZUKI</h1></p>
            <a href="hondainfo.php" class="btn">Next Bike</a>
        </nav>
        <div id="war">

        </div>
       <div class="content">
            <h2>THE SUZUKI</h2><h1>HAYABUSA</h1>
            <br>
            <h3>Specifications</h3>
            <p>
                <span><b>Engine</b> : </span>1340 cc
            </p>
            <p>
                <span><b>Engine Type</b> : </span>4-stroke, Liquid-cooled, DOHC, in-line four
            </p>
            <p>
                <span><b>Power</b> : </span>190 PS @ 9700 rpm
            </p>
            <p>
                <span><b>Torque</b> : </span>150 Nm @ 7000 rpm
            </p>
            <p>
                <span><b>Fuel Capacity</b> : </span>16.5L
            </p>
            <p>
                <span><b>Mileage</b> : </span>17 Kmpl
            </p>
            <p>
                <span><b>Kerb Weight</b> : </span>266 kg
            </p>
            <p>
                <span><b>Brakes</b> : </span>Double Disc
            </p>
            <img src="img/bike6.png" height="500px" width="600px" style="float:right;position:absolute;right:100px;top:200px">
            <h3>Features</h3>
            <p>
                <span>ABS : </span>DUAL CHANNEL
            </p>
            <p>
                <span>Riding Modes : </span>Road,Rain,Dynamic
            </p>
            <p>
                <span>Speedometer : </span>Analogue
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
                <span>Quick Shifter</span>
            </p>
            <p>
                <span>LED Tail Light</span>
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
    
    $s = is_rented("Suzuki Hayabusa");
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