 <?php

session_start();

 include("dbconnect.php");
include("function.php");

 if($_SERVER['REQUEST_METHOD']=="POST")
  {
     // something was posted
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!empty($email) && !empty($password) && !is_numeric($email))
     {
       //Read from database
      $query = "select* from users where email = $email limit 1";
      $result = mysqli_query($con, $query);

      if($result)
      {
         if ($result && mysqli_num_rows($result) > 0)
      {
     	$user_data = mysqli_fetch_assoc($result);
       if($user_data['password'] === $password)
       {
           $_SESSION['user_id'] = $user_data['user_id'];
           header("Location: index.php");
      die; 	
       }
    }

      }

      echo "WRONG USERNAME OR PASSWORD!";
    }
    else
    {

      echo "WRONG USERNAME OR PASSWORD!";
    }


  }
?>



 <!DOCTYPE html>
<html>
<head><meta charset="utf-8"><!-- Basic --><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!-- Mobile Metas --><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" /><!-- Site Metas --><meta name="keywords" content="" /><meta name="description" content="" /><meta name="author" content="" />
	<link href="images/w3.png" rel="shortcut icon" type="" />
	<title>ApexviewFX</title>
	<!-- bootstrap core css -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" /><!-- fonts style -->
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&amp;display=swap" rel="stylesheet" /><!--owl slider stylesheet -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet" type="text/css" /><!-- font awesome style -->
	<link href="css/font-awesome.min.css" rel="stylesheet" /><!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet" /><!-- responsive style -->
	<link href="css/responsive.css" rel="stylesheet" />
</head>
<body class="sub_page">
<div class="hero_area">
<div class="hero_bg_box">
<div class="bg_img_box"><img alt="" src="images/hero-bg.png" /></div>
</div>
<!-- header section strats -->

<header class="header_section">
<div class="container-fluid">
<nav class="navbar navbar-expand-lg custom_nav-container "><a class="navbar-brand" href="index.html"><span><img alt="logo" src="images/Logo.png" /> ApexviewFX </span> </a><button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"></button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<form class="form-inline"><button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button></form>

<ul class="navbar-nav  ">
	<li class="nav-item "><a class="nav-link" href="index.html">Home </a></li>
	<li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
	<li class="nav-item"><a class="nav-link" href="service.html">Services</a></li>
	<li class="nav-item"><a class="nav-link" href="why.html">Why Us</a></li>
	<li class="nav-item active"><a class="nav-link" href="contact.html">contact <span class="sr-only">(current)</span> </a></li>
	<li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
</ul>
</div>
</nav>
</div>
</header>
<!-- end header section --></div>
<!--end login-->

<section class="account">
<div class="container">
<div class="row justify-content-center">
<div class="col-lg-10">
<div class="account-contents" style="background: url('images/stock-g8baef0be3_1920.jpg'); background-size: cover;">
<div class="row">
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
<div class="account-thumb">
<h2>Login now</h2>

<p>We exist to provide outstanding services for accessing the Forex market</p>
</div>
</div>

<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
<div class="account-content">
<form action="#">
<div class="single-acc-field"><label for="email">Email</label> <input id="email" placeholder="Enter your Email" type="email" /></div>

<div class="single-acc-field"><label for="password">Password</label> <input id="password" placeholder="Enter your password" type="password" /></div>

<div class="single-acc-field boxes"><input id="checkbox" type="checkbox" /> <label for="checkbox">Remember me</label></div>

<div class="single-acc-field"><button type="submit">Login Account</button></div>
<a href="forgot.html">Forget Password?</a> <a href="register.php">No Account Yet?</a></form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
< /section>
<!--end login--><!-- info section -->

<section class="info_section layout_padding2">
<div class="container">
<div class="row">
<div class="col-md-6 col-lg-3 info_col">
<div class="info_contact">
<h4>CONTACT</h4>

<div class="contact_link_box"><a href=""> <span> Manhattan,New York  </span> </a> <a href=""> <span> Call:24/7 customer support  </span> </a> <a href=""> <span> ApexviewFX@gmail.com </span> </a></div>
</div>

<div class="info_social"><a href=""> </a> <a href=""> </a> <a href=""> </a> <a href=""> </a></div>
</div>

<div class="col-md-6 col-lg-2 mx-auto info_col">
<div class="info_link_box">
<h4>OUR COMPANY</h4>

<div class="info_links"><a class="active" href="index.html">Home </a> <a href="about.html"> About </a> <a href="service.html"> Services </a> <a href="why.html"> Why Us </a> <a href="contact.html"> contact </a></div>
</div>
</div>

<div class="col-md-6 col-lg-3 info_col ">
<h4>Subscribe</h4>

<form action="#"><input placeholder="Enter email" type="text" /><button type="submit">Subscribe</button></form>
</div>
</div>
</div>

<div>
<p>CFDs are considered complex ApexviewFX activites and may not be suitable for retail clients. CFDs are complex instruments and come with a high risk of losing money rapidly due to leverage. You should consider whether you understand how CFDs work and whether you can afford to take the high risk of losing your money. The products mentioned here may be affected by changes in currency exchange rates. If you invest in these products, you may lose some or all of your investment, and the value of your investment may fluctuate. You should never invest money that you cannot afford to lose and never trade with borrowed money. Before trading in the complex financial products offered, please be sure to understand the risks involved and learn about Secure and responsible trading.</p>
</div>
</section>
<!-- end info section --><!-- footer section -->

<section class="footer_section">
<div class="container">
<p>GRACIE-NIKS</p>
</div>
</section>
<!-- footer section --><!-- jQery --><script type="text/javascript" src="js/jquery-3.4.1.min.js"></script><!-- popper js --><script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script><!-- bootstrap js --><script type="text/javascript" src="js/bootstrap.js"></script><!-- owl slider --><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script><!-- custom js --><script type="text/javascript" src="js/custom.js"></script><!-- Google Map --><script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script><!-- End Google Map --></body>
</html>