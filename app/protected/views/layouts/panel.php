<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Grupo Savt - Main</title>
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta name="description" content="Web Design and Develop, desarrollo y diseño web"/>
    <meta name="author" content="Cigarrita Worker"/>
    <meta name="keywords" content="Aplication, web, software, internet, design, developer, elance, SEO, remote work,CMS "/>

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/materialize/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css">


	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-2.1.1.min.js"></script>

	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/83c90931/jquery.ba-bbq.js"></script>

	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/materialize/js/materialize.min.js"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">


	<script type="text/javascript">

		$(document).ready(function(){
			$('.button-collapse').sideNav({
			      menuWidth: 300, // Default is 240
			      edge: 'left', // Choose the horizontal origin
			      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
			    }
			  );
		});
	  
      
	</script>
</head>
<body>


<!-- Navbar goes here -->

<!-- Page Layout here -->
<main class="row" style="width: 100%;">
  	<nav class="top-navbar">
  		  <a href="#" class="brand-logo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo.png"></a>
		  <ul class="right hide-on-med-and-down">
		    <!-- <li><a href="#!">Reporte Detallado</a></li> -->
		    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/mensajes">GPS Transmicion</a></li>
		    <!-- Dropdown Trigger -->
      		<li><a class="dropdown-button" href="#!" data-activates="dropdown1"> Clemente<i class="material-icons right nav-middle">arrow_drop_down</i></a></li>
		  </ul>
		  <ul id="slide-out" class="side-nav">
		  	<li><a href="#!">Home</a></li>
		  	<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/usuarios">Usuarios</a></li>
		    <li><a href="#!">Reporte Grafico</a></li>
		    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/vehiculo">Vehiculos</a>
		    </li>
		    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/mensajes">GPS transmicion</a></li>
		    <li class="divider"></li>
		    <li><a href="#!">Mi Cuenta</a></li>
		    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout">Log Out</a></li>

		  </ul>
		  <ul id="dropdown1" class="dropdown-content">
			  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/update/1" class="grey-text"> <i class="tiny material-icons">settings</i> mi Cuenta</a></li>
			  <li class="divider"></li>
			  <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout" class="red-text"> <i class="tiny material-icons">input</i> Log Out</a></li>
		  </ul>
		  <a href="javascript:;;" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
	</nav>

  <div class="col m2 menu-left hide-on-small-and-down">
    <!-- Grey navigation panel -->

	<ul style="left: 0px;" id="nav-mobile" class="side-nav menu-nav-left">
		<li class="bold"><a href="#" class="">&nbsp;</a></li>
		<li class="bold"><a href="<?php echo Yii::app()->request->baseUrl; ?>/usuarios" class="">Usuarios</a></li>
		<li class="no-padding">
		  <ul class="collapsible collapsible-accordion">
		    <!-- <li class="bold"><a class="collapsible-header ">Reportes</a>
		      <div style="display: none;" class="collapsible-body">
		        <ul>
		          <li class=""><a href="#">Detallado</a></li>
		        </ul>
		      </div>
		    </li> -->
		    <li class="bold"><a class="collapsible-header " href="<?php echo Yii::app()->request->baseUrl; ?>/vehiculo">Vehiculos</a>
		    </li>
		  </ul>
		</li>
		<li class="bold"><a href="<?php echo Yii::app()->request->baseUrl; ?>/mensajes" class="">GPS Transmición</a></li>
	</ul>

  </div>

  <div class="col m10 s12 offset-m2">
    <!-- page content  -->
    <main>
    	<?php echo $content; ?>
	</main>
  </div>

</main>
<footer class="page-footer">
  <!-- <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Footer Content</h5>
        <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Links</h5>
        <ul>
          <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
          <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
        </ul>
      </div>
    </div>
  </div> -->
  <div class="footer-copyright">
  	<div class="row">
  		<div class="col m10 s12 offset-m2">
  			<div class="container black-text">
		    © 2015 Copyright Grupo SAVT S.A.C
		    <a class="black-text right" href="http://cigarrita-worker.com" target="_blank">by Cigarrita Worker</a>
		    </div>
  		</div>
  	</div>
    
  </div>
</footer>

	


	
</body>
</html>

