<br>
<?php
	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		
		$result = $mysqli->query("SELECT * FROM utente WHERE username LIKE '$username' AND password='$password'");
		
		if(($result->num_rows) > 0){
			$result = $mysqli->query("SELECT username FROM utente WHERE username LIKE '$username'");
			$row = $result->fetch_row();
			$username = $row[0];
			$result = $mysqli->query("SELECT id FROM utente WHERE username LIKE '$username'");
			$row = $result->fetch_row();
			$userid = $row[0];
		
			$_SESSION['username'] = $username;
			$_SESSION['userid'] = $userid;
			
			header("refresh:0;url='?page=home'" );
		}
		else {
			$result = $mysqli->query("SELECT * FROM utente WHERE username LIKE '$username'");
			if(($result->num_rows) > 0) {
				echo "Password sbagliata.<br>";
				echo "Verr&agrave; reindirizzato alla pagina di login in 5 secondi...";
				header("refresh:5;url='?page=login'" ); 
			}
			else{
				echo "L'username {$username} non &egrave valido.<br>";
				echo "Verr&agrave; reindirizzato alla pagina di login in 5 secondi...";
				header("refresh:5;url='?page=login'" );
			}
		}
} else { ?>
<div class='div-admin'>
	<form class='reg-form' action='index.php?page=login' method='POST'>
		<fieldset class='login-group'>
			<label>Username: <input type='text' name='username' placeholder='Username' maxlength='15' title='Inserisci il tuo username' required></label><br>
			<label>Password: <input class='pass-input' type='password' placeholder='Password' name='password' maxlength='20' title='Inserisci la tua password' required></label><br>
			<input class='reg-btn' type='submit' name='login' value='Accedi'>
		</fieldset>
	</form>
</div>

<?php } ?>