<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Dashboard</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="dashboardstyle.css">
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

            <a href="#profile">
              <span class="material-symbols-sharp">grid_view </span>
              <h3>Profile</h3>
            </a>
            <a href="#rentals">
                <span class="material-symbols-sharp">grid_view </span>
                <h3>Rentals</h3>
             </a>
           <a href="logout.php">
              <span class="material-symbols-sharp">logout </span>
              <h3>Logout</h3>
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
           <h1>Dashbord</h1>
           <br>
        <div class="insights" id="profile">
            <h2>Hey&nbsp;<b id="name">--</b></h2>
            <table>
              <tr><td><medium>Your name:</medium></td><td><h3 id="user_name">---</h3></td></tr>
              <tr><td><small>Your username:</small></td><td><h3 id="username">---</h3></td></tr>
              <tr><td><small>Your email:</small></td><td><h3 id="email">---</h3></td></tr>
              <tr><td><small>Your Phone number:</small></td><td><h3 id="phoneno">---</h3></td></tr>
              <!--<tr><td><small>Your Aadhar Number:</small></td><td><h3 id="aadhar">---</h3></td></tr>
              <tr><td><small>Your PAN:</small></td><td><h3 id="pan">---</h3></td></tr>
              <tr><td><small>Your Driving License Id:</small></td><td><h3 id="dlic">---</h3></td></tr>-->
            </table>
        </div>
        <br><br>
      <div class="recent_order" id="rentals">
         <h1>Rentals List</h1>
         <h2>Recents</h2>
         <table> 
             <thead>
              <tr>
                <th>Bike Name</th>
                <th>Location</th>
                <th>Pick up date</th>
                <th>Return date</th>
                <th>Days/Hours/Months</th>
                <th>Amount</th>
                <th>Cancel</th>
              </tr>
             </thead>
             
              <tbody id="recents">
                 
              </tbody>
         </table>

         <h2>Old</h2>
         <table>
            <tbody id="old">

            </tbody>
          </table>
         <!--<a href="#">Show All</a>--> 
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
           <p><b>--</b></p>
           <p>Admin</p>
           <small class="text-muted"></small>
       </div>
    </div>
</div>



   <div class="sales-analytics">
     
      </div>
   <script src="script.js"></script>
</body>

<?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
  $conn=mysqli_connect("localhost" , "root" , "" , "superbikes");
  if(!$conn)
  {
      die("Unable to connect");
  }  
  $sql="SELECT * from registration WHERE email='" . $_SESSION['email'] . "';";  
  $result=mysqli_query($conn,$sql);
  while($row=mysqli_fetch_row($result))
  {
    $name=$row[0];
      echo "<script src='https://code.jquery.com/jquery-3.7.1.min.js'></script>" . 
      "<script>
      $(document).ready(function(){
        $('.profile').replaceWith('<b>" . $row[0] . "</b>User');
        $('#name').html('<u>" . $row[0] . "</u>');
        $('#user_name').text('" . $row[0] . "');
        $('#username').text('" . $row[1] . "');
        $('#email').text('" . $row[2] . "');
        $('#phoneno').text('" . $row[3] . "');
       });
      </script>";
  }

  /*$sql2="SELECT aadhar,pan,driving_license from legal_details where name='" . $name ."';";
  $r=mysqli_query($conn,$sql2);
  if($r !== null && $r->num_rows>0) 
  {
     while($row=mysqli_fetch_row($r))
     {
      echo "<script src='https://code.jquery.com/jquery-3.7.1.min.js'></script>" . 
      "<script>
      $(document).ready(function(){
        $('#aadhar').text('" . $row[0] . "');
        $('#pan').text('" . $row[1] . "');
        $('#dilic').text('" . $row[2] . "');
       });
      </script>";  
     }
  }*/

  $currentdate = date('Y-m-d');
  $sql1="SELECT * FROM rent_bike where name='" . $name . "' AND pickupdate >= '" . $currentdate . "';";
  $result1=mysqli_query($conn,$sql1);
  if($result1 !== null && $result1->num_rows>0) 
  {
    $count1=mysqli_num_rows($result1);
    echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script>

    $(document).ready(function(){

      var count = " . $count1 . ";";
      // Loop through each row fetched from MySQLi result set
      while ($row1 = $result1->fetch_array(MYSQLI_NUM)) 
      {
        $name=$row1[0];
        $bikename=$row1[1];
        $status=$row1[9];
        $c = "SELECT * FROM cancel_request WHERE name='" . $name . "' AND bikename='" . $bikename . "';";
        $c1 = mysqli_query($conn,$c);
        if($c1->num_rows>0 && $c1 !== null)
        {
        echo "
        var a = '<tr><td>" . $row1[1] . "</td><td>" . $row1[2] . "</td><td>" . $row1[3] . "</td><td>"
        . $row1[4] . "</td><td>" . $row1[5] . "+" . $row1[6] . 
        "</td><td>" . $row1[7] . "</td><td>Cancelletion request has been sent for this rental</td></tr>';
        $('#recents').append(a);
        ";
        }
        else if($status!="live")
        {
          echo "
          var a = '<tr><td>" . $row1[1] . "</td><td>" . $row1[2] . "</td><td>" . $row1[3] . "</td><td>"
          . $row1[4] . "</td><td>" . $row1[5] . "+" . $row1[6] . 
          "</td><td>" . $row1[7] . "</td><td>Cancelled</td></tr>';
          $('#recents').append(a);
          ";
        }
        else
        {
        echo "
        var a = '<tr><td>" . $row1[1] . "</td><td>" . $row1[2] . "</td><td>" . $row1[3] . "</td><td>"
        . $row1[4] . "</td><td>" . $row1[5] . "+" . $row1[6] . 
        "</td><td>" . $row1[7] . "</td><td><button class=\'cancel\' data-name=\'" . $_SESSION['name'] . "\' data-bike=\'" . $row1[1] . "\' data-amt=\'" . $row1[7] . "\' >Cancel</button></td></tr>';
        $('#recents').append(a);
        ";
        }

      }

      echo "
      $('.cancel').click(function(){
        var c = confirm('Are you sure?');
        if(c == true)
        {
        var name = $(this).data('name');
        var bike = $(this).data('bike');
        var amt = $(this).data('amt');

        $.ajax({
          url:'cancelrental.php' , 
          method:'POST' , 
          data: { name: name, bike: bike, amount: amt },
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
      ";
      echo "});
      </script>";
  }else{
    echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>" . 
    "<script>
    $(document).ready(function(){
     $('#recents').append('<tr><td>Ohh Snap! Nothing to show</td></tr>'); 
    });
    </script>";
  }

    

  $sql2 = "SELECT * FROM rent_bike where name='" . $name . "' AND returndate < '" . $currentdate . "';";
  $result2 = mysqli_query($conn,$sql2);
  if($result2 !== null && $result2->num_rows>0) 
  {
    $count1=mysqli_num_rows($result2);
    echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>
    <script>
    $(document).ready(function(){
    var count = " . $count1 . ";";
    // Loop through each row fetched from MySQLi result set
    while ($row1 = $result2->fetch_array(MYSQLI_NUM)) {
    echo "
    $('#old').append('<tr><td>" . $row1[1] . "</td><td>" . $row1[2] . "</td><td>" . $row1[3] . "</td><td>" . $row1[4] . "</td><td>" . $row1[5] . "+" . $row1[6] . "</td><td>" . $row1[7] . "</td></tr>');
    ";
    }
    echo "
    });
    </script>"; 
  }else{
    echo "<script src='https://code.jquery.com/jquery-3.6.0.min.js'></script>" . 
    "<script>
    $(document).ready(function(){
     $('#old').append('<tr><td>Ohh Snap! Nothing to show</td></tr>'); 
    });
    </script>";
  }


  

}else{
  echo "<script>alert('Please login to continue further!');</script>";
  echo '<script type="text/javascript">window.location.href = "signin.php";</script>';
}

?>
</html>