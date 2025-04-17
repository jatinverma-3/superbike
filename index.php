<?php
session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Rental Website</title>
    <!-- link to css-->
    <link rel="stylesheet" href="style.css">
    <!-- box icons-->
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
<!--Header-->
<header>
    <a href="#" class="logo"><img src="img/logo.png" alt=""></a>

    <div class="bx bx-menu" id="menu-icon"></div>

<ul class="navbar">
    <li><a href="#home">Home</a></li>
    <li><a href="#ride">Ride</a></li>
    <li><a href="#services">Services</a></li>
    <li><a href="#about">About</a></li>
    <li><a href="#reviews">Reviews</a></li>
    <li><a href="dashboard.php">My Dashboard</a></li>
    <!--<li><a href="adminpanel.php"></a></li>-->
</ul>
<div class="header-btn">
    <a href="signup.php" class="sign-Up">Sign Up</a>
    <a href="signin.php" class="sign-In">Sign In</a>
</div>
</header>
<!--Home-->
<section class="home" id="home">
    <div class="text">
        <br><h2>BIKE RENTAL WEBSITE</h2><br><br>
        <h1><span>Looking</span> to <br> Rent a Super Bike</h1>
        <p>Four wheels move the body <br> Two wheels move the soul</p>
        <!--<div class="app-stores">
        <img src="img/ios.png" alt="">
        <img src="img/512x512.png" alt="">
        </div>-->
    </div>
<!--<div class="form-container">
    <form action="rent_bike.php">
        <div class="input-box">
            <span>Location</span>
            <input type="search" name="" id="" placeholder="Search Place">
        </div>
        <div class="input-box">
            <span>Pick-Up Date</span>
            <input type="date" name="" id="">
        </div>
        <div class="input-box">
            <span>Return Date</span>
            <input type="date" name="" id="">
        </div>
        <input type="submit" name="" id="" class="btn">
    </form>
</div>-->
</section>
<!--ride-->
<section class="ride" id="ride">
    <div class="heading">
        <span>How It Works</span>
        <h1>Rent With 3 Easy Steps</h1>
    </div>
    <div class="ride-container">
        <div class="box">
            <i class='bx bxs-map'></i>
            <h2>Choose a Location</h2>
            <p>Unclutch and escape the ordinary!</p>
        </div>

        <div class="box">
            <i class='bx bxs-calendar-check'></i>
            <h2>Pick Up Date</h2>
            <p>Unclutch and escape the ordinary!</p>
        </div>

        <div class="box">
            <i class='bx bxs-calendar-star'></i>
            <h2>Book a Bike</h2>
            <p>Unclutch and escape the ordinary!</p>
        </div>
    </div>
</section>
<!---services-->
<section class="services" id="services">
    <div class="heading">
        <span>Best Services</span>
        <h1>Explore Our Top Deals <br> From Top Rated Dealers</h1>
    </div>
    <div class="services-container">
        <div class="box">
            <div class="box-img">
                <img src="img/bike1.png" alt="">
            </div>
            <p>2024</p>
            <h3>BMW S1000 RR</h3>
            <h2>RS-42,00,000 | RENT PRICE-32,000 <span>/PER DAY</span></h2>
            <a href="bmwinfo.php" class="btn">Rent Now</a>
        </div>
        <div class="box">
            <div class="box-img">
                <img src="img/bike2.png" alt="">
            </div>
            <p>2024</p>
            <h3>Kawasaki Ninja H2</h3>
            <h2>RS-32,00,000 | RENT PRICE-40,000 <span>/PER DAY</span></h2>
            <a href="h2rinfo.php" class="btn">Rent Now</a>
        </div>
        <div class="box">
            <div class="box-img">
                <img src="img/bike3.png" alt="">
            </div>
            <p>2024</p>
            <h3>Ducati Panigale V4 R</h3>
            <h2>RS-51,87,000 | RENT PRICE-38,000 <span>/PER DAY</span></h2>
            <a href="ducatiinfo.php" class="btn">Rent Now</a>
        </div>
        <div class="box">
            <div class="box-img">
                <img src="img/bike4.jpeg" alt="">
            </div>
            <p>2024</p>
            <h3>Honda CBR 1000 RR-R</h3>
            <h2>RS-23,72,000 | RENT PRICE-29,000 <span>/PER DAY</span></h2>
            <a href="hondainfo.php" class="btn">Rent Now</a>
        </div>
        <div class="box">
            <div class="box-img">
                <img src="img/bike5.png" alt="">
            </div>
            <p>2024</p>
            <h3>Yamaha R1</h3>
            <h2>RS-15,00,000 | RENT PRICE-25,000 <span>/PER DAY</span></h2>
            <a href="r1info.php" class="btn">Rent Now</a>
        </div>
        <div class="box">
            <div class="box-img">
                <img src="img/bike6.png" alt="">
            </div>
            <p>2024</p>
            <h3>Suzuki Hayabusa</h3>
            <h2>RS-20,00,000 | RENT PRICE-35,000 <span>/PER DAY</span></h2>
            <a href="hayabusainfo.php" class="btn">Rent Now</a>
        </div>
    </div>

</section>
</section>
<!--about-->
<section class="about" id="about">
    <div class="heading">
        <span>About Us</span>
        <h1>Best Customer Experience</h1>
    </div>
    <div class="about-container">
        <div class="about-img">
            <img src="img/about.png" alt="">
        </div>
        <div class="about-text">
            <span>About Us</span>
            <p>UnClutch with us by riding your favourite super bikes such as Ducati, BMW, Kawasaki on the roads. We are in the business of delivering dreams, something we take very seriously.</p>
            </div>
                <span>Terms And Conditions</span>
            <p>Restrictions :  To participate as a rider, an individual has to be equal or above 20 years at the time of the tour, holding a valid driving license and good hold over the bike.That the hired vehicle shall not be used outside India.Not to use the vehicle for any illegal purpose. Not to operate the vehicle in a negligent manner. Not to permit the motorcycle to be operated by any other person. </p>
            <p>Documents required: <br>
 Copy of original Driver license<br>
 Copy of original Address proof<br>
 1 Passport size photograph<br>
 Copy of Adhar card<br>
 Post dated cheque or the security deposit asked by us.</p>
            <p>Security Deposit : <br>
The security deposit varies from INR 1,00,000 - INR 2,00,000 depending on which bike model you choose. This sum is held as insurance for the damages to the bike that may incur during the journey. On your return, complete inspection of the motorbike is done by our mechanic. In case of no damages, complete sum in refunded back.</p>
            <p>We will return your deposit in full if :- <br>
 You return the bike on time with due notice.<br>
 You return the bike without any damage.<br>
 You return the bike without any missing parts.<br>
 The bike is reasonably clean.<br>
 There is half a tank of petrol left in the bike.<br><br>

We will retain your deposit if :-<br>

 We are not given enough notice that you wish to return the bike.<br>
 You do not inform us, at least with in 48 hours prior notice, that you wish to extend the rental period.<br>
 We reserve the right to approve or disapprove your request depending upon the further schedule bookings for the same bike.<br>
 In case of non-approved extension, rental will be charged twice of the daily rental.<br>
 The bike is damaged.<br>
 There are parts missing.</p>
            <p>Inclusions :  Photocopy of motorbike registration certificate, Insurance & Pollution under control certificate.</p>
            <p>Vehicle Choice :  Please ensure you choose an alternative motorbike in case of your first choice motorbikes are unavailable, sometimes events beyond our control may make your first choice unavailable.</p>
            <p>Late penalties :  A delay of 30 minutes over the rental period is permissible for the return of possession. In the case of further delay or unapproved extension, the user must pay a fine of twice of the rental price. The charges for the time period of delay will be calculated as per usual rates given on our website.</p>
            <p>Service & repair : In case of any en-route mechanical issue, you can call our mechanic at +919829192781 for any online support or assistance. In case of any major fault, you can provide us your location to look for a nearest service station (if available).</p>
<a href="#" class="btn">Learn More</a>

        </div>
    </div>
</section>
<!--Reviews-->
<section class="reviews" id="reviews">
    <div class="heading">
        <span>Reviews</span>
        <h1>Whats Our Customer Says About Us</h1>
    </div>
    <div class="reviews-container">
        <div class="box">
        <div class="rev-img">
            <img src="img/rev1.jpg" alt="">
        </div>
        <h2>Jatin verma</h2>
        <div class="stars">
        <i class='bx bxs-star'></i>
        <i class='bx bxs-star'></i>
        <i class='bx bxs-star'></i>
        <i class='bx bxs-star'></i>
        <i class='bx bxs-star-half'></i>
        </div>
        <p>Greatest service I have ever experienced in any rental company around the world. They even surprised me and celebrated my birthday! Location and facilities are perfect.</p>
        </div>

        <div class="box">
            <div class="rev-img">
                <img src="img/rev2.jpg" alt="">
            </div>
            <h2>Ankush Prasad</h2>
            <div class="stars">
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star'></i>
            <i class='bx bxs-star-half'></i>
            </div>
            <p>Best superbike premium rental,A BIG SHOUT OUT TO THEM, for providing best service, bikes are well maintained and classy in looks as they are all modified, i really recommend you to go and have a visit</p>
            </div>

            <div class="box">
                <div class="rev-img">
                    <img src="img/rev3.jpg" alt="">
                </div>
                <h2>Rita Fernandes</h2>
                <div class="stars">
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star'></i>
                <i class='bx bxs-star-half'></i>
                </div>
                <p>I hired two bikes from them and I must tell you the bikes rocking and very well maintained.staff was friendly and very helpfull. Professionalism was top notch. Highly recommended..</p>
                </div>
    </div>
</section>
<!--Newsletter-->
<section class="newsletter">
    <h2>Subscribe To Newsletter</h2>
    <div class="box">
        <input type="text" placeholder="Enter Your Email...">
    <a href="#" class="btn">Subscribe</a>
    </div>
</section>
<div class="copyright">
    <p>&#169; JatinVerma & Ankush All Rights Reserved</p>
    <p>Contact Us : ap7858025@gmail.com &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
       Phone No : 9827839890</p>
    <div class="social">
        <a href="#"><i class='bx bxl-facebook'></i></a>
        <a href="#"><i class='bx bxl-twitter'></i></a>
        <a href="#"><i class='bx bxl-instagram'></i></a>
    </div>
</div>

<!--scrollReveal-->
<script src="https://unpkg.com/scrollreveal"></script>
<!-- Link To JS-->
<script src="main.js"></script>
</body>
<?php
    if(isset($_SESSION["loggedin"]) &&  $_SESSION["loggedin"] == true)
    {
       echo "<script src='https://code.jquery.com/jquery-3.7.1.min.js'></script>" . 
       "<script>
       $(document).ready(function(){
        $('.header-btn').replaceWith('<b>" . $_SESSION['email'] . "</b>');
       });
       </script>";
    }
?>
</html>