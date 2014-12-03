<?php

	/* DICE USERNAME GIA' IN USO ALLA MODIFICA */
	
	if(isset($_POST['modifica'])){ //se ho premuto il tasto modifica
	
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
		$usernameold = $_POST['usernameold'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$emailold = $_POST['emailold'];
				
		$resus = $mysqli->query("SELECT username FROM utente WHERE username LIKE '$username'"); //vede se username già in uso
		$countrow = $resus->num_rows;
		
	//	echo "<br><br>Controllo se {$username} &egrave; gi&agrave; in uso...<br><br>";
			
		$remail = $mysqli->query("SELECT email FROM utente WHERE email LIKE '$email'"); //vede se email già in uso
		$countraw = $remail->num_rows;
		
	//	echo "Controllo se {$email} &egrave; gi&agrave; in uso...<br><br>";
		
	//	echo "{$username} - {$usernameold}<br><br>";
		
		if($username == $usernameold){
			if($email == $emailold){
				$password = md5($password);
				$query = "UPDATE utente SET nome='$nome', cognome='$cognome', dataNascita = '$dataNascita', sesso='$sesso', via='$via', numero='$numero', cap='$cap', comune='$comune', provincia='$provincia', email='$email', username='$username', password='$password' WHERE username LIKE '$usernameold';";
				if($mysqli->query($query)) 
					echo '<br>Modifica effettuata.<br>';
				else
					echo "Errore nella query.<br>";					
				
			}
			else{
				if($countraw > 0)
					echo "Indirizzo email gi&agrave; in uso. Scegline un altro.<br>";
			}
		} elseif($countrow > 0){ //username già in uso
			echo 'Username gi&agrave; in uso';
		} elseif($countraw > 0){ //mail già in uso
			echo 'Mail gi&agrave; in uso';
		} else {
				$password = md5($password);
				$query = "UPDATE utente SET nome='$nome', cognome='$cognome', dataNascita = '$dataNascita', sesso='$sesso', via='$via', numero='$numero', cap='$cap', comune='$comune', provincia='$provincia', email='$email', username='$username', password='$password' WHERE username LIKE '$usernameold';";
				if($mysqli->query($query)) 
					echo '<br>Modifica effettuata.<br>';
				else
					echo "Errore nella query.<br>";
		}
				
	}elseif(isset($_POST['edit']) || ($admin['admin'] == 0)){ //se ho scelto chi deve essere modificato
	
		if($admin['admin'] == 0)
			$usernameold = $_SESSION['username'];
		else
			$usernameold = $_POST['username'];
		$i = 0;
		$query = "SELECT * FROM utente WHERE username LIKE '$usernameold';";
		$result = $mysqli->query($query);
		
		if(!$result){
			echo "Errore nella query.<br>";
		}
		else{
			$row = $result->fetch_assoc();
?>
			<div class='div-admin'>
				<form class="reg-form" action="?page=account&nk=editaccount" method='POST'>
					<fieldset class="register-group">
						<label>
							Nome
							<input type="text" name="nome" placeholder="Nome" value='<?php echo"{$row['nome']}";?>' maxlength='30' title="Inserisci il tuo nome" required>
						</label>
									
						<br>
						<label>
							Cognome
							<input type="text" name="cognome" placeholder="Cognome" value='<?php echo"{$row['cognome']}";?>' title="Inserisci il tuo cognome" required>
						</label>

						<br>
						<label>
							Data Nascita
							<input type="date" name="dataNascita" value='<?php echo"{$row['dataNascita']}";?>' title="Inserisci la tua data di nascita" required>
						</label>

						<label>
							Sesso
							<select name="sesso" title="Seleziona il tuo sesso" required>
						<?php 
								if($row['sesso'] == 'm'){ ?>
									<option value="">Scegli</option>
									<option value="m" selected>M</option>
									<option value="f">F</option>
						<?php	} else { ?>
									<option value="">Scegli</option>
									<option value="m">M</option>
									<option value="f" selected>F</option>								
						<?php	} ?>
							</select>
						</label>

						<br>
						<label>
							Via/Viale/Piazza/Loc.
							<input type="text" name="via" placeholder="Via" value='<?php echo"{$row['via']}";?>' title="Insersci la tua via" required>
						</label>
									
						<label>
							N. civico
							<input type="number" name="numero" min='1' value='<?php echo"{$row['numero']}";?>' placeholder="Civico" title="Inserisci il tuo numero civico" required>
						</label>

						<br>
						<label>
							CAP
							<input type="text" name="cap" placeholder="CAP" value='<?php echo"{$row['cap']}";?>' pattern="^[0-9]{5}" maxlength='5' title="Il CAP (Codice Avviamento Postale) &egrave; formato da 5 numeri" required> <!-- Il pattern vuole solo 5 numeri -->
						</label>	
									
						<label> 
							Comune
							<input type="text" name="comune" placeholder="Comune" value='<?php echo"{$row['comune']}";?>' maxlength='30' title="Inserisci il tuo comune di residenza" required>
						</label>	
									
						<label> 
							Provincia
							<input type="text" name="provincia" placeholder="Provincia" value='<?php echo"{$row['provincia']}";?>' maxlength='2' title="Inserisci la tua provincia" required>
						</label>	
						<br>

						<label>
							Mail Vecchia
							<input type="email" name="emailold" placeholder="type@isp.reg" value='<?php echo"{$row['email']}";?>' maxlength='60' required readonly>
						</label>						
						<br>
						
						<label>
							Mail Nuova
							<input type="email" name="email" placeholder="type@isp.reg" value='<?php echo"{$row['email']}";?>' maxlength='60' required>
						</label>						
						<br>

						<label>
							Username vecchio
							<input type="text" name="usernameold" placeholder="username" value='<?php echo"{$row['username']}";?>' pattern="^[0-9a-zA-Z]{5,}" maxlength='15' title="L'username deve avere dai 5 ai 15 caratteri. Non sono ammessi caratteri speciali" required readonly>
						</label>	
						<br>

						<label>
							Username nuovo
							<input type="text" name="username" placeholder="username" value='<?php echo"{$row['username']}";?>' pattern="^[0-9a-zA-Z]{5,}" maxlength='15' title="L'username deve avere dai 5 ai 15 caratteri. Non sono ammessi caratteri speciali" required>
						</label>	
						<br>
						
						<label>
							Password
							<input type="password" name="password" placeholder="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" maxlength='20' title=" La password deve contenere maiuscole, minuscole, numeri, caratteri speciali, min 8 caratteri, max 20 caratteri" required>
						</label>
						<br>
					</fieldset>
								
					<input class='reg-btn' type="submit" name="modifica" value="modifica">
				</form>
			</div>			
			
			
<?php		}
?>

<?php

}else{
		
	$query = "SELECT username FROM utente";
	$result = $mysqli->query($query);
	if(!$result){
		echo "Errore nella query";
	} else {
	
		$i = 0;
		$list = array();
		
		?>
		<div class='div-admin'>
			<form action='?page=account&nk=editaccount' method='POST'>
				Utente da modificare:<br>
				<select name="username" title="Seleziona l'utente" required>
					<option value="" selected>Scegli l'utente</option>
					<?php 
						while($row = $result->fetch_row()){
							$list[$i] = $row[0]; ?>
							<option value="<?php echo"{$list[$i]}";?>"> <?php echo"{$list[$i]}";?> </option>
						<?php } ?>
				</select>
				<input class='gen-btn' type="submit" name="edit" value="Esegui">
			</form>
		</div>
		
<?php } } ?>