<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="group1">

  <title>OCSX - Group1</title>

  <!-- Bootstrap Core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom Fonts -->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS -->
  <link href="css/creative.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet" type="text/css" >

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body id="page-top">

  <?php include_once './include/header.php'; ?>


  <header>
    <div class="header-content">
      <div class="header-content-inner">
        <h1 id="homeHeading">ABOUT US</h1>
        <hr>
        <p><?php include_once './include/byte.php'; ?> <small>bytes of data today</small></p>
        <a href="#about" class="btn btn-primary btn-xl page-scroll">Find Out More</a>
      </div>
    </div>
  </header>

  <section class="bg-primary" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-lg-offset-2 text-center">
          <h2 class="section-heading">We've got what you need in data sharing!</h2>
          <hr class="light">
          <p class="text-faded">This project is a centralized system for the storing and sharing of data and scripts for researchers such as data scientists and students.</p>
          <a href="#services" class="page-scroll btn btn-default btn-xl sr-button">Get Started!</a>
        </div>
      </div>
    </div>
  </section>

  <section id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading">WHAT YOU CAN DO ON THIS PROJECT</h2>
          <hr class="primary">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-4 text-center">
          <div class="service-box">
            <i class="fa fa-4x fa-search text-primary sr-icons"></i>
            <h3><a href="./search.php">EXPLORE DATA</a></h3>
            <p class="text-muted">Search for Data and Preview data</p>
          </div>
        </div>
        <div class="col-md-4 text-center">
          <div class="service-box">
            <i class="fa fa-4x fa-download text-primary sr-icons"></i>
            <h3><a href="./search.php">CONSUME DATA</a></h3>
            <p class="text-muted">View all datasets you have subscribed</p>
          </div>
        </div>
        <div class="col-md-4 text-center">
          <div class="service-box">
            <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
            <h3><a href="publish.php">PUBLISH DATA</a></h3>
            <p class="text-muted">Data you wish to make available to the community</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="no-padding" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading">OUR TEAM</h2>
          <hr class="primary">
        </div>
      </div>
    </div>    
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-2 text-center">
          <h3>Brandon Tomblinson</h3>
          <p>Back-end developer</p>
        </div>
        <div class="col-md-4 text-center">
          <h3>Benjamin Brown</h3>
          <p>Back-end developer</p>
        </div>        
      </div>
      <div class="row">
        <div class="col-md-4 col-md-offset-2 text-center">
          <h3>Kienan DeLaney</h3>
          <p>Back-end developer</p>
        </div>
        <div class="col-md-4 text-center">
          <h3>Daniel Darnold</h3>
          <p>Back-end developer</p>
        </div>     
      </div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <h3>Chalermpon Thongmotai(Pao)</h3>
          <p>Front-end developer</p>
        </div>
      </div>         
    </div>
  </section>

  <?php include_once './include/footer.php'; ?>

  <!-- jQuery -->
  <script src="vendor/jquery/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
  <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Theme JavaScript -->
  <script src="js/creative.min.js"></script>

</body>

</html>
