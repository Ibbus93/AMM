<?php

	if(isset($_POST['edit'])){
		$username = $_POST['username'];
		
		$query = "SELECT admin FROM utente WHERE username = '$username'";
		$result = $mysqli->query($query);
		$result = $result->fetch_assoc();
		
		if($_SESSION['username'] == $username || $result['admin'] == 1)
			echo "Non puoi rendere amministratore chi lo &egrave; gi&agrave;!<br>";
		else{
			$query = "UPDATE utente SET admin = 1 WHERE username = '$username'";
			if($mysqli->query($query))
				echo "Da ora in poi 
			
		}
	}else

	{
		$query = "SELECT username FROM utente";
		$result = $mysqli->query($query);
		if(!$result)
			echo "Errore nella query";
		$i = 0;
		$list = array();

?>

	<div class='div-admin'>
		<form action='?page=account&nk=editaccount' method='POST'>
			Utente da rendere amministratore:<br>
			<select name="username" title="Seleziona l'utente" required>
				<option value="" selected>Scegli l'utente</option>
				<?php 
					while($row = $result->fetch_row()){
						$list[$i] = $row[0]; ?>
						<option value="<?php echo"{$list[$i]}";?>"> <?php echo"{$list[$i]}";?> </option>
					<?php } ?>
			</select>
			<input type="submit" name="edit" value="esegui">
		</form>
	</div>

<?php
	} 
?>