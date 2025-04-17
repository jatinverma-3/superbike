<?php
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent your bike - RentSuperbikes</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <div class="background">
       <div class="booking-form">
        <h1>Rent your Superbike... <br>Ride like a pro</h1>
        <h2>Fill out the below details</h2>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <table>
            <tr><td>Select your bike:</td>
            <td><select name="biketype">
                <option id="1">BMW S1000 RR</option>
                <option id="2">Kawasaki Ninja H2R</option>
                <option id="3">Ducatti Panigale V4 R</option>
                <option id="4">Honda CBR1000 RR-R</option>
                <option id="5"> Yamaha R1</option>
                <option id="6">Suzuki Hayabusa</option>
            </select></td></tr>
            <tr><td><b>Note:</td><td><p style="color:red">Only Available Bikes are shown in the drop-down list<p></td></tr>
            <tr><td>Your Location:</td><td><input type="text" name="location" placeholder="Ex. Pune" value="<?php if(isset($_POST['location'])){ echo $_POST['location']; } ?>"></td></tr>
            <tr><td>Pickup Date:</td><td><input type="date" name="pickup"></td></tr>
            <tr><td>Return Date:</td><td><input type="date" name="return"></td></tr>
            <tr><td>Rent Bike for:</td><td><input type="text" name="renthr" placeholder="1 Day"></td></tr>
            <tr><td><input type="radio" name="type" value="hours">Hours</td><td><input type="radio" name="type" value="days">Days</td></tr>
        </table><br>
        <center><input type="submit" value="Proceed to Payment" style="width:500px;background-color:Orange"></center>
        </form>
        
       </div>
    </div> <!--Background -->
</body>

<?php

function retrive_hr($bikename,$rentalhr)
{
    $conn = mysqli_connect('localhost','root','','superbikes');   // Database connection
    if(!$conn)
    {
        die("Could not connect");
    }
    $sql = "SELECT price_perhr FROM bike_details WHERE bike_name='" . $bikename . "';";
    $r = mysqli_query($conn,$sql);
    $price_hr = 0;
    $total_amt = 0;
    while($row = mysqli_fetch_row($r))
    {
        $price_hr = $row[0];
    }   
    $total_amt = $price_hr * $rentalhr;
    mysqli_close($conn);
    return $total_amt;
}

function retrive_day($bikename,$rentalhr)
{
    $conn = mysqli_connect('localhost','root','','superbikes');   // Database connection
    if(!$conn)
    {
        die("Could not connect");
    }
    $price="SELECT price_perday FROM bike_details where bike_name='" . $bikename . "';";
    $r=mysqli_query($conn,$price);
    while($row=mysqli_fetch_row($r))
    {
        $priceprday=$row[0];
    }
    $totalamt = $rentalhr * $priceprday;
    mysqli_close($conn);
    return $totalamt;
}

function rentalexist()
{
    $conn = mysqli_connect('localhost','root','','superbikes');   // Database connection
    if(!$conn)
    {
        die("Could not connect");
    }
    $name = array();
    $i=0;
    $bikes = "SELECT bike_name FROM bike_details WHERE current_status='rented'";
    $r=mysqli_query($conn,$bikes);
    while($row=mysqli_fetch_row($r))
    {
        $name[$i]=$row[0];
        $i=$i+1;
    }
    return $name;
    mysqli_close($conn);
}

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true)
{

    $name = rentalexist();
$i=0;
while($i<count($name))
{
    switch ($name[$i])
    {
        case "BMW S1000 RR":
            echo " <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
            <script>
            $('#1').attr('hidden',true);
            </script>";
        break;
        case "Kawasaki Ninja H2R":
            echo " <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
            <script>
            $('#2').attr('hidden',true);
            </script>";
        break;
        case "Ducatti Panigale V4 R":
            echo " <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
            <script>
            $('#3').attr('hidden',true);
            </script>";
        break;
        case "Honda CBR1000 RR-R":
            echo " <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
            <script>
            $('#4').attr('hidden',true);
            </script>";
        break;
        case "Yamaha R1":
            echo " <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
            <script>
            $('#5').attr('hidden',true);
            </script>";
        break;
        case "Suzuki Hayabusa":
            echo " <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
            <script>
            $('#6').attr('hidden',true);
            </script>";
        break;
    }
    $i=$i+1;
}

    if(!empty($_POST['biketype']) && !empty($_POST['location']) && !empty($_POST['pickup']) && !empty($_POST['return']) && !empty($_POST['renthr']) && !empty($_POST['type']))
    {

        $rd = array($_POST['biketype'] , $_POST['location'] , $_POST['pickup'] , $_POST['return'] , 
        $_POST['renthr'] , $_POST['type'] );

        $currentdate = date("Y-m-d");

        if($rd[5] == "hours")
        {
            $amt = retrive_hr($rd[0] , $rd[4]);
            $rd[6] = $amt;
            print_r($rd);
        }

        if($rd[5] == "days")
        {
            $amt = retrive_day($rd[0] , $rd[4]);
            $rd[6] = $amt;
            print_r($rd);
        }
         
        ?>

        <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
        <script>
            var amt = "<?php echo $rd[6]; ?>";
            var renthr = "<?php echo $rd[4]; ?>";
            var type = "<?php echo $rd[5]; ?>";
            var c = confirm("You are about to pay "+amt+"/- for "+renthr+type+"Do you want to continue?");
            if(c)
            {
                var datatosend = {
                    bikename: '<?php echo $rd[0]; ?>',
                    location: '<?php echo $rd[1]; ?>',
                    pickup: '<?php echo $rd[2]; ?>',
                    return: '<?php echo $rd[3]; ?>',
                    renthr: <?php echo $rd[4]; ?>,
                    type: '<?php echo $rd[5]; ?>',
                    amount: <?php echo $rd[6]; ?>,
                    currentdate: '<?php echo $currentdate; ?>'
                };
                var queryString = $.param(datatosend);
                window.location.href = "payments.php?" + queryString;
            }else{
                alert("Error! try again");
            }
        </script>

        <?php

        //$rd = array($_POST['biketype'] , $_POST['location'] , $_POST['pickup'] , $_POST['return'] , 
        //$_POST['renthr'] , $_POST['type'] );
        //$s = insert_record($_SESSION['name'] , $rd[0] , $rd[1] ,$rd[2] , $rd[3] , $rd[4] , $rd[5] , $rd[6]);
        //if($s == true)
        //{
           


            /*<script>
                var amt = "<?php echo $rd[6]; ?>";
                var renthr = "<?php echo $rd[4]; ?>";
                var type = "<?php echo $rd[5]; ?>";
                var c = confirm("You are about to pay "+amt+"/- for "+renthr+type+"Do you want to continue?");
                if(c)
                {
                    alert("Proceeding further");
                    var bikename = "<?php echo $rd[0]; ?>";
                    var dataToSend = {
                    bikename: bikename,
                    amount: amt
                    };
                    var queryString = new URLSearchParams(dataToSend).toString();
                    var destination = 'payments.php?' + queryString;
                    window.location.href = destination;
                }else{
                    alert("Error! try again");
                }
            </script>*/

            
    }
}

?>

</html>