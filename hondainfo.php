<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SuperBike Information</title>
    <link rel="stylesheet" href="hondainfo.css">
</head>
<body>

    <div class="container">
        <nav class="nav">
            <img src="bmw.jpeg" class="logo">
            <p class="logo"><h1>HONDA</h1></p>
            <a href="r1info.php" class="btn">Next Bike</a>
        </nav>
        <div id="war">

        </div>
       <div class="content">
            <h2>THE HONDA</h2><h1>CBR 1000 RR-R</h1>
            <br>
            <h3>Specifications</h3>
            <p>
                <span><b>Engine</b> : </span>1000 cc
            </p>
            <p>
                <span><b>Engine Type</b> : </span>Liquid-cooled 4 stroke 16 valve DOHC Inline 4
            </p>
            <p>
                <span><b>Power</b> : </span>217.5 PS @ 14500 rpm
            </p>
            <p>
                <span><b>Torque</b> : </span>113 Nm @ 12500
            </p>
            <p>
                <span><b>Fuel Capacity</b> : </span>16.1L
            </p>
            <p>
                <span><b>Mileage</b> : </span>18 Kmpl
            </p>
            <p>
                <span><b>Kerb Weight</b> : </span>201 kg
            </p>
            <p>
                <span><b>Brakes</b> : </span>Double Disc
            </p>
            <img src="img/bike4.jpeg" height="500px" width="600px" style="float:right;position:absolute;right:100px;top:200px">
            <h3>Features</h3>
            <p>
                <span>ABS : </span>Dual Channel
            </p>
            <p>
                <span>Riding Modes : </span>Road,Dynamic,Rain
            </p>
            <p>
                <span>Quick Shifter</span>
            </p>
            <p>
                <span>LED Tail Light</span>
            </p>
            <p>
                <span>Speedometer</span>
            </p>
            <p>
                <span>Odometer</span>
            </p>
            <p>
                <span>Tripmeter</span>
            </p>
            <p>
                <span>Tachometer</span>
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
    
    $s = is_rented("Honda CBR1000 RR-R");
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