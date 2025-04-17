<?php 

if (!empty($_POST['name']) && !empty($_POST['bikename'])) {
    $name = $_POST['name'];
    $bname = $_POST['bikename'];

    $conn = mysqli_connect("localhost", "root", "", "superbikes");
    if (!$conn) {
        die("Unable to connect: " . mysqli_connect_error());
    }

    $sql = "UPDATE cancel_request SET status='approved' WHERE name='" . $name . "' AND bikename='" . $bname . "'";
    $sql2 = "UPDATE rent_bike SET status='cancelled' WHERE name='" . $name . "' AND bike_name='" . $bname . "'";
    $sql3 = "UPDATE bike_details SET current_status='not rented' WHERE bike_name='" . $bname . "'";

    if (mysqli_query($conn, $sql) && mysqli_query($conn, $sql2) && mysqli_query($conn, $sql3)) {
        echo "Cancellation request approved successfully";
    } else {
        echo "Error! " . mysqli_error($conn);
    }
} else {
    echo "Error! Missing parameters";
}

?>
