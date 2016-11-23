<?php
  
  session_start();
  if(!isset($_SESSION["user_id"]) && !isset($_SESSION["username"]))
    header("Location: ./login.php?redirect=publish");
?>

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
  <link href="summernote/summernote.css" rel="stylesheet" type="text/css" >

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
        <h1 id="homeHeading">Publish Your Data</h1>
        <hr>
        <p>1,751,009,072 <small>bytes of data today</small></p>
      </div>
    </div>
  </header>

  <section class="no-padding" style="margin:20px auto" id="header">
    <div class="container">
      <div class="panel panel-info">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                <input class="form-control input-lg" type="text" placeholder="Enter a Descriptive Title">
              </div>
              <div class="form-group">
                <input class="form-control" type="text" placeholder="Include a brief data overview for the subtitle">
              </div>
            </div>
            <div class="col-md-4">
              <i class="fa fa-photo fa-3x fa-pull-right fa-border"></i>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <img class="pull-left" src="https://kaggle2.blob.core.windows.net/avatars/thumbnails/default-thumb.png" style="width:50px; margin-right:10px;">
              <h3>By <small><?=$_SESSION['username'] ?></small></h3>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- /container -->
  </section>

  <section class="no-padding" style="margin:20px auto" id="url">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Choose a Permanent URL</strong></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-7">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon3"><?=$_SERVER['SERVER_NAME'] ?>/<?=$_SESSION['username'] ?>/</span>
                <input type="text" class="form-control">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- /container -->
  </section>

  <section class="no-padding" style="margin:20px auto" id="description">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Description</strong></div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">
              <div id="descriptionInput">Give a detailed description about your dataset.</div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- /container -->
  </section>

  <section class="no-padding" style="margin:20px auto" id="upload">
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Upload Files</strong></div>
        <div class="panel-body">
          <!-- Standar Form -->
          <h4>Select files from your local machine</h4>
          <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
            <div class="form-inline">
              <div class="form-group">
                <input type="file" name="files[]" id="js-upload-files" multiple>
              </div>
              <button class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
            </div>
          </form>
          <!-- Upload Finished -->
          <div class="js-upload-finished">
            <h3>Processed files</h3>
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-success">
                <span class="badge alert-success pull-right">Success</span>image-01.jpg
              </a>
              <a href="#" class="list-group-item list-group-item-success">
                <span class="badge alert-success pull-right">Success</span>image-02.jpg
              </a>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- /container -->
  </section>
  <hr>

  <section class="no-padding">
    <center>
      <button class="btn btn-info btn-lg" style="margin:20px auto;">Publish Dataset</button>
    </center>
  </section>

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
  <script src="summernote/summernote.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#descriptionInput').summernote({
        height: 200
      });
    });
  </script>

</body>

</html>