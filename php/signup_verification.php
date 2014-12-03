<?php
	if(isset($_POST['register'])){			//se è stato premuto il bottone "Registrati"
		$nome = $_POST['nome'];
		$cognome = $_POST['cognome'];
		$dataNascita = $_POST['dataNascita'];
		$sesso = $_POST['sesso'];
		$via = $_POST['via'];
		$numero = $_POST['numero'];
		$cap = $_POST['cap'];
		$comune = $_POST['comune'];
		$provincia = $_POST['provincia'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
				
		$resus = $mysqli->query("SELECT * FROM utente WHERE username LIKE '$username'");
		$countrow = $resus->num_rows;
			
		$remail = $mysqli->query("SELECT * FROM utente WHERE email LIKE '$email'");
		$countraw = $remail->num_rows;
				
				/*if($mysqli->num_rows($mysqli->query("SELECT * FROM users WHERE username LIKE '$username'")) > 0) {
					echo 'Username già in uso. Sei pregato di sceglierne un altro.<br /><br /><a href="javascript:history.back();">Indietro</a>';
				} elseif($mysqli->num_rows($mysqli->query("SELECT * FROM users WHERE email LIKE '$email'")) > 0) {
					echo 'Indirizzo email già in uso. Sei pregato di sceglierne un altro.<br /><br /><a href="javascript:history.back();">Indietro</a>';
				} */
						
		if($countrow > 0){
			echo 'Username già in uso';
		} elseif($countraw > 0){
			echo 'Mail già in uso';
		} else {
			$password = md5($password);
			if($mysqli->query("INSERT INTO utente (nome, cognome, dataNascita, sesso, via, numero, cap, comune, provincia, email, username, password) VALUES ('$nome', '$cognome', '$dataNascita', '$sesso', '$via', $numero, '$cap', '$comune', '$provincia', '$email', '$username','$password')")) {
			echo 'Registrazione andata a buon fine.';
			} else {
				echo 'Errore nella query: ';
			}
		}
	}
?>