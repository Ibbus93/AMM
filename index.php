<!DOCTYPE html>
<!--
	Author: Federico Ibba
	Date: 20/08/2014
-->

<?php
    
	include('php/config.php');
	include('php/Computer.php');
	include('php/Monitor_class.php');
	include('php/Utente.php');
	

	if(isset($_GET['page'])){
		$pg = $_GET['page'];
	}else{
		$pg = "home";
	}
	
	if(isset($_GET['art']))
		$art = $_GET['art'];
	
	if(isset($_GET['sc']))
		$sc = $_GET['sc'];
		
	if(isset($_GET['code']))
		$code = $_GET['code'];
	
	if(isset($_GET['type']))
		$type = $_GET['type'];
		
	
?>

<html>

<head>
	<title>Your Best PC</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="assets/stylesheet/main.css">
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,100' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/script/jq/jquery-ui.css">
    <script src="assets/script/jq/jquerymin.1.6.1.js"></script>
    <script src="assets/script/jq/jquery-ui.js"></script>
    
</head>

<body>
	<!-- HEADER -->
	<?php include('view/header.php'); ?>
	
	<!-- PAGE -->
	<div class="group">
		<?php include('view/aside.php'); ?><!--
		--><section class="primary-section">
			<?php 
				include('php/switch.php');
			?>
		</section>
	</div>
	<!-- FOOTER -->
	<?php include('view/footer.php'); ?>
</body>

</html>