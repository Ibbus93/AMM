<?php

if(isset($_POST['delete'])){
	if($_SESSION['admin'] != $_SESSION['username'])
		$username = $_SESSION['username'];
	else
		$username = $_POST['username'];
		
	$query = "DELETE FROM utente WHERE username = '$username'";
	
	if ($_SESSION['username'] == $username){
		//echo "Stai cercando di eliminare il tuo account.<br>";
		
		$select = "SELECT username FROM utente WHERE admin=1";
		$result = $mysqli->query($select);
		
		$seladmin = "SELECT admin FROM utente WHERE username = '$username'";
		$resadmin = $mysqli->query($seladmin);
				
		$rows = $resadmin->fetch_assoc();

		if($result){
			if($result->num_rows > 1){
				if($mysqli->query($query)){
					echo "Utente {$username} eliminato.<br>";
					//logout
					$_SESSION = array();
					session_destroy();
					header("refresh:3;url='?page=home'" );
				}
				else
					echo "Errore nella query <br>";
			}
			elseif ($rows['admin'] == 1){
				echo "<br>Non puoi cancellare il tuo account, sei l'admin!<br>";
			} else{
				//echo "Non sei admin e ora il tuo account verr&agrave; cancellato...<br>";
				if($mysqli->query($query)){
					echo "Il tuo account &egrave; stato eliminato.<br>";
					//logout
					$_SESSION = array();
					session_destroy();
					header("refresh:3;url='?page=home'" );
				}
			else
				echo "Errore nella query.<br>";
			}
		}
		else {
			echo "Errore nella query<br>";
		}
	
	}
	else {
		if($mysqli->query($query))
			echo "Utente {$username} eliminato.<br><br>";
		else
			echo "Errore nella query.<br>";
	}
}

else {

	$query = "SELECT username FROM utente";
	$result = $mysqli->query($query);
	if(!$result){
		echo "Errore nella query";
	} else {

		$i = 0;
		$list = array();
	
		if($admin['admin'] == 1){ //se sono admin scelgo chi eliminare
	
	?>
			<div class='div-admin'>
				<form action='?page=deleteaccount' method='POST'>
					Utente da eliminare:<br>
					<select name="username" title="Seleziona l'utente" required>
						<option value="" selected>Scegli l'utente</option>
						<?php 
							while($row = $result->fetch_row()){
								$list[$i] = $row[0]; ?>
								<option value="<?php echo"{$list[$i]}";?>"> <?php echo"{$list[$i]}";?> </option>
						<?php } ?>
					</select>
					<input type="submit" class='gen-btn' name="delete" value="Elimina">
				</form>
			</div>

<?php
		}else{ //se non sono admin devo solo confermare l'eventuale cancellazione dell'account ?>
			<p>Sei sicuro di voler eliminare il tuo account?</p>
			<form action='?page=deleteaccount' method='POST'>
				<input class='del-btn' type="submit" name="delete" value="Si">
			</form><!--
			--><form action='?page=account' method='POST'>
				<input class='del-btn' type="submit" name="delete" value="No">
			</form>			
<?php
		} 
	}
}
?>