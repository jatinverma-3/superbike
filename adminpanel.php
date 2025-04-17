<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Rent your Superbike</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="dashboardstyle.css">
  <script>
    var a = prompt("Enter password");
    if(a != "superbikesjatinankush")
    {
        alert('Wrong password,try again');
        window.location.href="adminpanel.php";
    }
  </script>
</head>
<body>
   <div class="container">
      <aside>
           
         <div class="top">
           <div class="logo">
             <a href="index.php"><h2>RENT<span class="danger">SUPERBIKES</span> </h2></a>
           </div>
           <div class="close" id="close_btn">
            <span class="material-symbols-sharp">
              close
              </span>
           </div>
         </div>
         <!-- end top -->
          <div class="sidebar">

            <a href="#bikes">
              <span class="material-symbols-sharp">grid_view </span>
              <h3>My Bikes</h3>
            </a>
            <a href="#rentals">
                <span class="material-symbols-sharp">grid_view </span>
                <h3>Rentals Summary</h3>
            </a>
            <a href="#payments">
                <span class="material-symbols-sharp">grid_view </span>
                <h3>Payments Summary</h3>
            </a>
            <a href="#cancelreq">
                <span class="material-symbols-sharp">grid_view </span>
                <h3>Cancelletion Request</h3>
            </a>

          </div>

      </aside>
      <!-- --------------
        end asid
      -------------------- -->

      <!-- --------------
        start main part
      --------------- -->

      <main>
           <h1>Admin Panel</h1>
           <br>
           <div class="recent_order" id="bikes">
              <h2>My Bikes</h2>
              <table> 
                    <thead>
                      <tr>
                        <th>Sr No</th>
                        <th>Bike Name</th>
                        <th>Status</th>
                      </tr>
                   </thead>
                   <tbody id="recents">
                        <?php
                           $sr = 1;
                           $conn=mysqli_connect("localhost" , "root" , "" , "superbikes");
                           if(!$conn)
                           {
                               die("Unable to connect");
                           }  
                           $sql = "SELECT bike_name,current_status FROM bike_details";
                           $bikenames = mysqli_query($conn,$sql);
                           while($row=mysqli_fetch_row($bikenames))
                           {
                               //$sql1 = "SELECT bike_name FROM rent_bike";
                        ?>
                        <tr><td><?php echo $sr; ?></td><td><?php echo $row[0]; ?></td><td><?php echo $row[1]; ?></td></tr>
                        <?php $sr++; }  ?>
                   </tbody>
               </table>
           </div>
           <div class="recent_order" id="rentals">
              <h2>Rentals</h2>
                <table> 
                    <thead>
                      <tr>
                        <th>Sr No</th>
                        <th>Name of Customer</th>
                        <th>Bike Name</th>
                        <th>Location</th>
                        <th>Pickup Date</th>
                        <th>Return Date</th>
                        <th>Rent Duration</th>
                        <th>Amount Paid</th>
                        <th>Day of renting</th>
                      </tr>
                   </thead>
                   <tbody>
                   <?php
                           $sr = 1;
                           $conn=mysqli_connect("localhost" , "root" , "" , "superbikes");
                           if(!$conn)
                           {
                               die("Unable to connect");
                           }  
                           $sql = "SELECT * FROM rent_bike";
                           $result = mysqli_query($conn,$sql);
                           while($row=mysqli_fetch_row($result))
                           {
                    ?>
                    <tr><td><?php echo $sr; ?></td><td><?php echo $row[0]; ?></td><td><?php echo $row[1]; ?></td><td><?php echo $row[2]; ?></td><td><?php echo $row[3]; ?></td>
                    <td><?php echo $row[4]; ?></td><td><?php echo $row[5] . " " . $row[6]; ?></td><td><?php echo $row[7]; ?></td><td><?php echo $row[4]; ?></td></tr>
                    <?php $sr++; }  ?>
                   </tbody>
                </table>
           </div>
           <div class="recent_order" id="payments">
               <h2>Payments Summary</h2>
               <table>
                   <thead>
                      <th>Sr no</th>
                      <th>Name of Customer</th>
                      <th>Amount Paid</th>
                      <th>Mode</th>
                      <th>Name on Card</th>
                      <th>Card no</th>
                      <th>Expiry</th>
                      <th>CVV</th>
                      <th>Payment Date</th>
                   </thead>
                   <tbody>
                   <?php
                           $sr = 1;
                           $conn=mysqli_connect("localhost" , "root" , "" , "superbikes");
                           if(!$conn)
                           {
                               die("Unable to connect");
                           }  
                           $sql = "SELECT * FROM payments";
                           $pay = mysqli_query($conn,$sql);
                           while($row=mysqli_fetch_row($pay))
                           {     
                    ?>
                    <tr><td><?php echo $sr; ?></td><td><?php echo $row[0]; ?></td><td><?php echo $row[1]; ?></td><td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[3]; ?></td><td><?php echo $row[4]; ?></td><td><?php echo $row[5]; ?></td><td><?php echo $row[6]; ?></td><td><?php echo $row[7]; ?></td></tr>
                    <?php $sr++; } ?>
                   </tbody>
               </table>
           </div>
           <div class="recent_order" id="payments">
               <h2>Users</h2>
               <table>
                   <thead>
                      <th>Sr no</th>
                      <th>Name of Customer</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Phone No.</th>
                      <th>Password</th>
                   </thead>
                   <tbody>
                   <?php
                           $sr = 1;
                           $conn=mysqli_connect("localhost" , "root" , "" , "superbikes");
                           if(!$conn)
                           {
                               die("Unable to connect");
                           }  
                           $sql = "SELECT * FROM registration";
                           $users = mysqli_query($conn,$sql);
                           while($row = mysqli_fetch_row($users))
                           {
                    ?>
                    <tr><td><?php echo $sr; ?></td><td><?php echo $row[0]; ?></td><td><?php echo $row[1]; ?></td><td><?php echo $row[2]; ?></td>
                    <td><?php echo $row[3]; ?></td><td><?php echo $row[4]; ?></td></tr>
                    <?php $sr++; } ?>
                   </tbody>
               </table>
            </div>
            <div class="recent_order" id="cancelreq">
                <h2>Cancel Request</h2>
                <table>
                   <thead>
                      <th>Sr no</th>
                      <th>Name of Customer</th>
                      <th>Bikename</th>
                      <th>Amount</th>
                      <th>Date of Request</th>
                      <th>status</th>
                      <th>Actions</th>
                   </thead>
                   <tbody>
    <?php
    $sr = 1;
    $conn = mysqli_connect("localhost", "root", "", "superbikes");
    if (!$conn) {
        die("Unable to connect");
    }
    $sql = "SELECT * FROM cancel_request";
    $users = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_row($users)) {
        // Check if the current request is pending (not approved)
        $i1 = "SELECT * FROM cancel_request WHERE status='approved' AND name='" . $row[0] . "' AND bikename='" . $row[1] . "'";
        $i = mysqli_query($conn, $i1);
        if ($i->num_rows == 0) { // Only show the button if request is pending
            ?>
            <tr>
                <td><?php echo $sr; ?></td>
                <td><?php echo $row[0]; ?></td>
                <td><?php echo $row[1]; ?></td>
                <td><?php echo $row[2]; ?></td>
                <td><?php echo $row[3]; ?></td>
                <td><?php echo $row[4]; ?></td>
                <td><button id="approve" data-name="<?php echo $row[0]; ?>" data-bname="<?php echo $row[1]; ?>">Approve</button></td>
            </tr>
            <?php
            $sr++;
        }
    }
    ?>

                    <script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
                       <script>
                       $(document).ready(function(){
                          $(document).on('click', '#approve', function() {
                            var c = confirm("Are you sure?");
                            if(c)
                            {
                                var name = $(this).data('name');
                                var bname = $(this).data('bname');
                            var datatosend = {
                                name: name,
                                bikename: bname,
                            };
                            $.ajax({
                               url:'approve_cancel.php' , 
                               method:'POST' , 
                               data: datatosend,
                               success: function(response) {
                                  alert(response);
                                  console.log('Data sent successfully');
                                },
                               error: function(xhr, status, error) {
                               // Handle error here
                               console.error(xhr.responseText);
                                }
                            });
                            }
                          });
                       });
                       </script>
                    </tbody>
                </table>
            </div>
      </main>
      <!------------------
         end main
        ------------------->

      <!----------------
        start right main 
      ---------------------->
    <div class="right">

<div class="top">
   <button id="menu_bar">
     <span class="material-symbols-sharp">menu</span>
   </button>

   <div class="theme-toggler">
     <span class="material-symbols-sharp active">light_mode</span>
     <span class="material-symbols-sharp">dark_mode</span>
   </div>
    <div class="profile">
       <div class="info">
           <p><b></b></p>
           <p>Admin</p>
           <small class="text-muted"></small>
       </div>
    </div>
</div>



   <div class="sales-analytics">
     
      </div>
   <script src="script.js"></script>
</body>