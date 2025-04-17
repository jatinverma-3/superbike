<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="paymentstyle.css">

</head>
<body>

<div class="container">

    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="row">
            <!--<div class="col">
                <h3 class="title">billing address</h3>
                <div class="inputBox">
                    <span>Full name :</span>
                    <input type="text" name="name" placeholder="Full name" value="<?php if(isset($_SESSION['name'])) { echo $_SESSION['name']; } ?>">
                </div>
                <div class="inputBox">
                    <span>Email :</span>
                    <input type="email" name="email" placeholder="Email Address" value="<?php if(isset($_SESSION['email'])) { echo $_SESSION['email']; } ?>">
                </div>
                <div class="inputBox">
                    <span>Address :</span>
                    <textarea name="address" placeholder="Address"></textarea>
                </div>
                <div class="inputBox">
                    <span>City :</span>
                    <input type="text" name="city" placeholder="Pune">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>State :</span>
                        <input type="text" name="state" id="state" placeholder="Maharashtra">
                    </div>
                    <div class="inputBox">
                        <span>Pin code :</span>
                        <input type="text" name="pin-code" id="pin-code" placeholder="123 456">
                    </div>
                </div>

            </div>-->

            <div class="col">

                <h3 class="title">Payments:</h3>
                <div class="inputBox">
                    <table>
                        <tr><td><input type="radio" name="mode" value="debitcard"></td><td>Debit Card</td></tr>
                        <tr><td><input type="radio" name="mode" value="creditcard"></td><td>Credit Card</td></tr>
                    </table>
                </div>
                <div class="inputBox">
                    <span>Cards accepted :</span>
                    <img src="images/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>Name on card :</span>
                    <input type="text" name="nameoncard" placeholder="name">
                </div>
                <div class="inputBox">
                    <span>Credit Card Number :</span>
                    <input type="number" name="cardno" placeholder="1111-2222-3333-4444">
                </div>
                <div class="inputBox">
                    <span>Expiry :</span>
                    <input type="date" name="exp" placeholder="January">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" name="cvv" placeholder="1234">
                    </div>
                </div>

            </div>
    
        </div>

        <input type="submit" class="submit-btn" id="submit">
        <input type="button" id="cancel" class="submit-btn" style="background-color:red" name="cancel" value="Cancel Transaction">
    </form>
        
</div>    
<!--<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
<script>
$(document).ready(function() {
  // Retrieve the data from session storage
  var storedData = sessionStorage.getItem('myData');

  if (storedData) {
    // Parse the stored data
    var data = JSON.parse(storedData);
    alert(data.bikename);
  } else {
    // Handle case where no data is found
  }
});
</script>-->
  
</body>

<?php

/*function change_status($bikename)
{
    $conn = mysqli_connect('localhost','root','','superbikes');   // Database connection
    if(!$conn)
    {
    die("Could not connect");
    }
    $sql = "UPDATE bike_details SET current_status='rented' WHERE bike_name='" . $bikename . "';";   
    mysqli_query($conn,$sql);
}*/

function insert_record($name,$bikename,$location,$pickup,$return,$dur,$time,$amt,$date)
{
    $conn = mysqli_connect('localhost','root','','superbikes');   // Database connection
    if(!$conn)
    {
    die("Could not connect");
    }
    $rec="INSERT INTO rent_bike VALUES('" . $name . "','" . $bikename . "','" . $location . "','" . $pickup . "','" . $return . "'," . $dur . ",'" . $time . "'," . $amt . ",'" . $date . "','live');";
    $sql = "UPDATE bike_details SET current_status='rented' WHERE bike_name='" . $bikename . "';";   
    if(mysqli_query($conn,$rec) && mysqli_query($conn,$sql))
    {
        mysqli_close($conn);
        return true;
    }else{
        mysqli_close($conn);
        return false;
    }
}

function payments($name, $amount,	$mode,	$name_on_card,	$card_no,	$expiry, $cvv , $date)
{
    $conn = mysqli_connect('localhost','root','','superbikes');   // Database connection
    if(!$conn)
    {
        die("Could not connect");
    }
    $sql = "INSERT INTO payments VALUES('" . $name . "'," . $amount . ",'" . $mode . "','" . $name_on_card . "'," . $card_no . ",'" . $expiry . "'," . $cvv .",'" . $date . "');";
    //$status = "UPDATE rent_bike SET payment_status='completed' WHERE name='" . $name . "' AND bike_name=" . $bikename . ";";
    if(mysqli_query($conn,$sql))
    {
        mysqli_close($conn);
        return true;
    }else{
        mysqli_close($conn);
        return false;
    }
}

function validations($name,$number,$expiry,$cvv)
{
    $date = date("d-m-Y");
    $s1 = preg_match('/^[a-zA-Z\s]+$/', $name);
    $s2 = preg_match('/^\d{16}$/', $number);
    if($expiry<$date)
    {
        $s3=1; //expired
    }else{
        $s3=0;  //not expired
    }
    $s4 = preg_match('/^\d{3,4}$/', $cvv);
    if($s1 && $s2 && !$s3 && $s4)
    {
        return true;
    }
    else{
        return false;
    }
}

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true)
{
    if(!empty($_GET['bikename']) && !empty($_GET['location']) && !empty($_GET['pickup']) && !empty($_GET['return']) && !empty($_GET['renthr']) && !empty($_GET['type']) && !empty($_GET['amount']) && !empty($_GET['currentdate']))
    {
        if(!empty($_POST['mode']) && !empty($_POST['nameoncard']) && !empty($_POST['cardno']) && !empty($_POST['exp']) && !empty($_POST['cvv']))
        {
            $rd = array(
                $_GET['bikename'],
                $_GET['location'],
                $_GET['pickup'],
                $_GET['return'],
                $_GET['renthr'],
                $_GET['type'],
                $_GET['amount'], 
                $_GET['currentdate']
            );
            
            $pay = array(
                $_POST['mode'],
                $_POST['nameoncard'],
                $_POST['cardno'],
                $_POST['exp'],
                $_POST['cvv']
            );
    
            print_r($rd);
            echo "<br>";
            print_r($pay);
            echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
                <script>
                $(document).ready(function(){
                    $('#cancel').click(function(){
                        var c = confirm('Are you sure you want to cancel the transaction?');
                        if(c)
                        {
                            alert('Transaction Cancelled');
                            window.location.href='index.php';
                        }
                    });
                });
            </script>";
            $s = validations($pay[1],$pay[2],$pay[3],$pay[4]);
            if($s)
            {
                $s2 = payments($_SESSION['name'] , $rd[6] , $pay[0],$pay[1],$pay[2],$pay[3],$pay[4],$rd[7]);
                $s1 = insert_record($_SESSION['name'] , $rd[0] , $rd[1] ,$rd[2] , $rd[3] , $rd[4] , $rd[5] , $rd[6] , $rd[7]);
                echo "<script>alert('Payment Successful!');
                window.location.href='dashboard.php';</script>";
            }
        }
    }else{
        echo "<script>alert('Please fill rental details to proceed payment');
        window.location.href='index.php';</script>";
    }
}

/*if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true)
{
if(!empty($_POST['bikename']) && !empty($_POST['location']) && !empty($_POST['pickup']) && !empty($_POST['return']) && !empty($_POST['renthr']) && !empty($_POST['type']) && !empty($_POST['currentdate']))
{
    if(!empty($_POST['mode']) && !empty($_POST['nameoncard']) && !empty($_POST['cardno']) && !empty($_POST['exp']) && !empty($_POST['cvv']))
    {
        $bike = array(
            $_POST['bikename'],
            $_POST['location'],
            $_POST['pickup'],
            $_POST['return'],
            $_POST['renthr'],
            $_POST['type'],
            $_POST['currentdate']
        );

        print_r($bike);

        $pay = array(
            $_POST['mode'],
            $_POST['nameoncard'],
            $_POST['cardno'],
            $_POST['exp'],
            $_POST['cvv']
        );

        /*$s2 = payments($_SESSION['name'],$bike[1],$pay[0],$pay[1],$pay[2],$pay[3],$pay[4],$bike[0]);
        if($s2 == true)
        {
            echo "<script>
            alert('Success! Your bike will be delivered to you on your location');
            window.location.href='dashboard.php';
            </script>";
        
        }
       
    }
}
}*/

?>

</html>