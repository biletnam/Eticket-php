<?php

	include("connectDB2.php");
	session_start();
	$us = $_SESSION["user"];

	$stmt= $connectDB->prepare("SELECT apellido, nombre
		FROM usuario u WHERE u.us = ?");

	$stmt->bind_param('s',$us);

	$stmt->execute();

	$result=$stmt->get_result();

	$response= $result->fetch_assoc();
	$es = " ";
	$ap = $response["apellido"];
	$nom = $response["nombre"];


?>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>E-Ticket | Menú</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/main.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body onload="DameLaFechaHora()">

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">BIENVENIDO</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">

          	<li><a>

          		<?php
          			echo $ap.$es.$nom;
          		?>

          	</a></li>

          	<li><a id= "putDate"></a></li>
          	<li><a id= "putHour"></a></li>
            <li class="active"><a class="glyphicon glyphicon-log-out" href=""> Salir</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

	<div class="container w">
		<div class="row centered">
			<br><br>
			<div class="col-lg-4" id="sskr">
				<a href="formularioInfra.php"><i class="glyphicon glyphicon-user" id="otro"></i></a> 
				<h4>INFRACTOR</h4>
			</div><!-- col-lg-4 -->

			<div class="col-lg-4" id="sskr">
				<a href="formularioVehi.html"><i class="glyphicon glyphicon-road" id="otro"></i></a>
				<h4>VEHICULO</h4>
			</div><!-- col-lg-4 -->

			<div class="col-lg-4" id="sskr">
				<a href=""><i class="glyphicon glyphicon-list-alt" id="otro"></i></a>
				<h4>MULTA</h4>	
			</div><!-- col-lg-4 -->
		</div><!-- row -->
		<br>
		<br>
	</div><!-- container -->
	
	
	<div id="r">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-8 col-lg-offset-2">
					<h4>E-Ticket es una Aplicacion desarrollada por <a href="http://swseeker.hol.es/Clean/"target="_blank">Software Seeker</a> all Right Reserved.</h4>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><! -- r wrap -->
	
	
	<!-- FOOTER -->
	<div id="f">
		<div class="container">
			<div class="row centered">
				<a href="https://www.facebook.com/SoftwareSeekers"target="_blank"><i class="fa fa-facebook"></i></a>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- Footer -->


	<!-- MODAL FOR CONTACT -->
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">contact us</h4>
	      </div>
	      <div class="modal-body">
		        <div class="row centered">
		        	<p>We are available 24/7, so don't hesitate to contact us.</p>
		        	<p>
		        		Somestreet Ave, 987<br/>
						London, UK.<br/>
						+44 8948-4343<br/>
						hi@blacktie.co
		        	</p>
		        	<div id="mapwrap">
		<iframe height="300" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.es/maps?t=m&amp;ie=UTF8&amp;ll=52.752693,22.791016&amp;spn=67.34552,156.972656&amp;z=2&amp;output=embed"></iframe>
					</div>	
		        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Save & Go</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


	<script Language="JavaScript"> 
   		function DameLaFechaHora() { 
   			var hoy = new Date();
      		var hrs = hoy.getHours(); 
      		var min = hoy.getMinutes();
      		var day = hoy.getDate();
      		var month = hoy.getMonth();
      		var year = hoy.getFullYear();
     		
     		if (min < 10) {
     			document.getElementById("putHour").innerHTML = "Hora: " + hrs + ":" + "0" + min;
     		} else {
     			document.getElementById("putHour").innerHTML = "Hora: " + hrs + ":" + min;
     		}

     		document.getElementById("putDate").innerHTML = day + "/"+ (month + 1) +"/" + year;
     		
   		} 
	</Script>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
