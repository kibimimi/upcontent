<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php set_time_limit(0);?>
    <?php require_once 'inc.php';?>
    <base href="http://sacs.16mb.co/">
    <meta name="description" content="<?=getMetaDescription();?>">
    <meta name="keywords" content="<?=getMetaKeywords();?>">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title><?=getTitle();?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="./">BIJOUX</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
          <li><a href="bagues-or-femmes.html" title="Bagues en or femmes">Bagues or femmes</a></li>
          <li><a href="bracelets-or-femmes.html" title="Bracelets en or femmes">Bracelets or femmes</a></li>
          <li><a href="bracelets-argent-hommes.html" title="bracelets en argent hommes">Bracelets argent hommes</a></li>
          <li><a href="bagues-hommes.html" title="Bagues hommes">Bagues hommes</a></li>
          <li><a href="colliers-or.html" title="colliers en or">colliers or</a></li> 
          <li><a href="colliers-argent.html" title="colliers argent">colliers argent</a></li>   
          <li><a href="bijoux-parures.html" title="bijoux parures">bijoux parures</a></li>
          </ul>

        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div class="container">

<div class="row">
	<div style="margin-bottom:7px" id="grand-titre"><h1><?=ucwords(THEKEYWORD);?></h1></div>
</div> 

<?php
for ($p=0; $p <7 ; $p++) { 
echo '<div class="cadre-produit">
        <div class="row">     
          <div><h2>Sous-Titre '.$p.'</h2></div>;
        </div>
        <div class="row" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">     
            <img width="250" src="https://images-na.ssl-images-amazon.com/images/I/71IdBI2ztBL._UY395_.jpg">
          <div id="content" class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <p>';require 'upcontent.php';echo '</p>
            <p>';require 'upcontent.php';echo '</p>
          </div>
        </div>
      </div>';
}?>      
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
  <?php $page_html = file_get_contents('http://upcontent.localhost/page-parametree.php');
file_put_contents('page2.html', $page_html);return;?>