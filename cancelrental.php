<?php

if(!empty($_POST['name']) && !empty($_POST['bike']) && !empty($_POST['amount']))
{

    $name = $_POST['name'];
    $bike = $_POST['bike'];
    $amount = $_POST['amount'];
    $date = date("Y-m-d");

    $conn=mysqli_connect("localhost" , "root" , "" , "superbikes");
    if(!$conn)
    {
       die("Unable to connect");
    }

    $sql = "INSERT INTO cancel_request (name,bikename,amount,date_of_req,status) VALUES('" . $name . "','" . $bike . "'," . $amount . ",'" . $date. "','pending');"; 

    if(mysqli_query($conn,$sql))
    {
        echo "Cancelletion request has been sent successfully!";
    }
    else
    {
        echo "Error! Try again";
    }

    mysqli_close($conn);
}


// Check if name and bike are set in the POST request
/*if(isset($_POST['name'], $_POST['bike'])) {
    // Assign values from POST to variables
    $name = $_POST['name'];
    $bike = $_POST['bike'];

    // Database connection
    $conn = mysqli_connect("localhost", "root", "", "superbikes");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare SQL statement to delete the bike rental record
    $sql = "DELETE FROM rent_bike WHERE bike_name=?";

    // Prepare the statement
    $stmt = mysqli_prepare($conn, $sql);

    // Check if prepare succeeded
    if (!$stmt) {
        die("Prepare failed: " . mysqli_error($conn));
    }

    // Bind parameters
    if (!mysqli_stmt_bind_param($stmt, "s", $bike)) {
        die("Binding parameters failed: " . mysqli_stmt_error($stmt));
    }

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        echo "Success in cancellation";
    } else {
        echo "Error! Try again";
    }

    // Close the statement
    mysqli_stmt_close($stmt);

    // Close the connection
    mysqli_close($conn);
}*/



?>