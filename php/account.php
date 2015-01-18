<script src="assets/script/account.js"></script>
<?php

	$username = $_SESSION['username'];
	$query = "SELECT admin FROM utente WHERE username LIKE '$username'";
	$result = $mysqli->query($query);
	$admin = $result->fetch_assoc();
	
	if($admin['admin'])	{ 
		$_SESSION['admin'] = $username;
	?>
		<div class='titolo'>
			<h2><b>Bentornato magnifico admin!</b></h2>
			<p>Pannello di amministrazione</p>
		</div>
		<div class='list-account'>
		
		
		
		<?php /*
			<ol>
				<li><a href='index.php?page=account&nk=insertphoto'>Inserisci foto</a> 			 <?php error_reporting(0); if ($_GET['nk']=='insertphoto') { include ('php/admin/insertphoto.php'); }?></li>
				<li><a href='index.php?page=account&nk=insertart&type=pc'>Inserisci computer</a> <?php error_reporting(0); if ($_GET['nk']=='insertart' && $_GET['type'] == 'pc') { include ('php/admin/insertart.php'); }?></li>
				<li><a href='index.php?page=account&nk=insertart&type=mon'>Inserisci monitor</a> <?php error_reporting(0); if ($_GET['nk']=='insertart'&& $_GET['type'] == 'mon') { include ('php/admin/insertart.php'); }?></li>
				<li><a href='index.php?page=account&nk=deleteart'>Elimina articolo</a>  		 <?php error_reporting(0); if ($_GET['nk']=='deleteart') include ('php/admin/deleteart.php'); ?></li>
				<li><a href='index.php?page=account&nk=signup'>Nuovo utente</a>          		<?php error_reporting(0); if ($_GET['nk']=='signup') include ('php/signup.php'); ?></li>
				<li><a href='index.php?page=account&nk=editaccount'>Modifica utente</a>  		<?php error_reporting(0); if ($_GET['nk']=='editaccount') include ('php/admin/editaccount.php'); ?></li>
				<li><a href='index.php?page=account&nk=deleteaccount'>Elimina utente</a> 		<?php error_reporting(0); if ($_GET['nk']=='deleteaccount') include ('php/admin/deleteaccount.php'); ?></li>
			</ol> */ ?>

			
			
<!--INIZIO ESPERIMENTI -->			
			
		<h3>Inserisci foto</h3>
			<div>
				<?php include('php/admin/insertphoto.php'); ?>
			</div>
		<h3 id='pc'>Inserisci computer</h3>
			<div>
				<?php include('php/admin/insertpc.php'); ?>
			</div>
		<h3>Inserisci monitor</h3>
			<div>
				<?php include('php/admin/insertmon.php'); ?>
			</div>
		<h3>Elimina articolo</h3>	
			<div>
				<?php include ('php/admin/deleteart.php'); ?>
			</div>			
		<h3>Aggiorna quantit&agrave; articolo</h3>	
			<div>
				<?php include ('php/admin/editart.php'); ?>
			</div>
		<h3>Nuovo utente</h3>    
			<div>
				<?php include ('php/admin/newaccount.php'); ?>
			</div>			
		<h3>Modifica utente </h3>	
			<div>
				<?php include ('php/admin/editaccount.php'); ?>
			</div>	
		<h3>Elimina utente	</h3>
			<div>
				<?php include ('php/admin/deleteaccount.php'); ?>
			</div>
			
</div>					
	<?php
	}
	
	else{
		$_SESSION['admin'] = "NULL";
	?>	
		<div class='titolo'>
			<h2><b>Bentornato <?php echo "{$username}";?></b></h2>
			<p>Pannello di amministrazione</p>
		</div>
		<div class='list-account'>
			<h3>Modifica utente </h3>	
				<div>
					<?php include ('php/admin/editaccount.php'); ?>
				</div>

			<h3>Elimina account </h3>	
				<div>
					<?php include ('php/admin/deleteaccount.php'); ?>
				</div>
		</div>
	<?php
	}
	$mysqli->close();
?>