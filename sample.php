<select name="biketype">
                <option id="1">BMW S1000 RR</option>
                <option id="2">Kawasaki Ninja H2R</option>
                <option id="3">Ducatti Panigale V4 R</option>
                <option id="4">Honda CBR1000 RR-R</option>
                <option id="5"> Yamaha R1</option>
                <option id="6">Suzuki Hayabusa</option>
            </select>

<?php

/*function validations($name,$number,$expiry,$cvv)
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
    if($s1 && $s2 && $s3 && $s4)
    {
        return true;
    }
    else{
        return false;
    }
}

echo validations("Akshada Panse",1111222233334444,"01-12-2030",1111);*/

function rentalexist()
{
    $conn = mysqli_connect('localhost','root','','superbikes');   // Database connection
    if(!$conn)
    {
        die("Could not connect");
    }
    $name = array();
    $i=0;
    $bikes = "SELECT bike_name FROM rent_bike";
    $r=mysqli_query($conn,$bikes);
    while($row=mysqli_fetch_row($r))
    {
        $name[$i]=$row[0];
        $i=$i+1;
    }
    return $name;
    mysqli_close($conn);
}

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
//print_r(rentalexist());

?>