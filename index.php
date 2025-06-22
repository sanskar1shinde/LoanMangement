<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="header" id="header">
        <nav>
            <a href="home.html"><img src="images/flogo.png" alt=""> </a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>

                <ul>
                    <li><a href="#header">Home</a></li>
                    <li><a href="#mid">About</a></li>
                    <li><a href="#footer">Contact</a></li>
                    <li><a href="#">Login</a>
                    <div class="sub">
                        <ul>
                            <li><a href="./User/login.php">User</a> </li>                                 
                            <li><a href="./Admin/AdminLogin.php">Admin</a> </li>
                        </ul>

                    </div></li>

                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <div class="text-box">
            <h1>Helping you piece your finance back together ! </h1>
            <p>Fast and Efficient Loans</p>
            <a href="" class="hero-btn">Apply Now</a>
        
        </div>
    </section>

<section class="mid" id="mid">
    <div class="aboutus">
        <div class="title">
            <h1 id="abts">ABOUT US</h1>
        </div>
        <div class="usinfo">
            <h3>
        

            <h1>&#8226Affordable interest rates.</h1>

            <h3>The Kotak811 personal loan is affordable; the loan interest rates start at 10.99% p.a. only.<br><br>

<h1>&#8226Wide range</h1>

<h3>Don't worry about providing for your financial needs; Kotak811 offers personal loans ranging from ₹50,000 up to ₹40 lakhs.<br><br>

<h1>&#8226Flexible repayment</h1>

<h3>The personal loan repayment tenure ranges between 12 and 60 months. Choose the tenure that best suits you. You can also prepay a part of the loan during the tenure of the loan.<br><br>

<h1>&#8226Collateral-free loans</h1>

<h3>Kotak811 personal loans are collateral-free, and you don’t have to pledge any security to avail a personal loan. The loan is unsecured and is issued based on income and other personal loan eligibility criteria.<br><br>

<h1>&#8226Digital application and minimum documentation</h1>

<h3>Applying for a Kotak811 personal loan is simple, and the loan is offered with minimal paperwork. You can get approval and have the loan sanctioned.<br>
            </h3>
        </div>
    </div>
</section>

<section class="footer" id="footer">
    <div class="aboutus">
        <div class="title">
            <h1 id="abts">CONTACT US</h1>
        </div>
        <div class="last">
            <div class="one">
            <a href="home.html"><img src="images/flogo.png" alt=""> </a>
            <p class="move">Helping you piece your finance back together !
            Fast and Efficient Loans</p>
            </div>
            <div class="two">
            <h3>Contact Info</h3>
            <p class="links"> <i class="fas fa-phone"></i> <a href="tel:7083018924"><font color="black"> +917083018924 </font></a></p>
            <p class="links"> <i class="fas fa-phone"></i><a href="tel:9657326105"><font color="black"> +919657326105 </font></a></p>
            <p class="links"> <i class="fas fa-envelope"></i><a href="mailto:mukta.joshi@iccs.ac.in"><font color="black"> mukta.joshi@iccs.ac.in </font></a></p>
            <p class="links"> <i class="fas fa-envelope"></i><a href="mailto:darshana.metange@iccs.ac.in"><font color="black">  darshana.metange@iccs.ac.in</font></a></p>
            
            <p class="links"> <i class="fas fa-map-marker-alt"></i><a href="https://www.google.com/maps/place/Indira+College+of+Commerce+%26+Science+(ICCS)/@18.5735663,73.7381155,13z/data=!4m22!1m14!4m13!1m4!2m2!1d73.7906048!2d18.5405109!4e1!1m6!1m2!1s0x3bc2b97fe9839211:0xeb97c59b43ee4fd0!2sIndira+College+of+Commerce+%26+Science+(ICCS),+Dhruv,+New,+Old+Mumbai+Rd,+Tathawade,+Pune,+Maharashtra+411033!2m2!1d73.7489105!2d18.6112211!3e0!3m6!1s0x3bc2b97fe9839211:0xeb97c59b43ee4fd0!8m2!3d18.6112211!4d73.7489105!15sCgRpY2NzkgEHY29sbGVnZeABAA!16s%2Fg%2F1thpv8mv"><font color="black"> Pune, india - 411033</font></a> </p>
                
            </div>
            <div class="three">
            <h3>Quick Links</h3>
            <a href="#home" class="links" style="color:black"> <i class="fas fa-arrow-right"
            style="color:black" style="color:black"></i> Home </a>
            <a href="#mid" class="links" style="color:black"> <i class="fas fa-arrow-right" style="color:black"></i> About Us </a>
            <a href="#footer" class="links" style="color:black"> <i class="fas fa-arrow-right"
            style="color:black"></i> Contact Infor </a>
           
           
                
            </div>
        </div>
    </div>
        
</section>



<script>
    var navLinks = document.getElementById("navLinks");
    function showMenu(){
        navLinks.style.right="0";
    }
    function hideMenu(){
        navLinks.style.right="-200px";
    }
</script>
</body>
</html>