<?php

	if(isset($_POST['delete'])){
		$type = $_POST['type'];
		$marca = $_POST['marca'];
		$modello = $_POST['modello'];
		
		$query = "SELECT * FROM $type WHERE marca LIKE '$marca' AND modello LIKE '$modello';";
		
		$result = $mysqli->query($query);
		
		if(!$result){
			echo "Errore nella query di selezione.<br><br>";
		}elseif($result->num_rows > 0){
				
			$query = "DELETE FROM $type WHERE marca LIKE '$marca' AND modello LIKE '$modello';";
			$result = $mysqli->query($query);
			
			if(!$result)
				echo "Errore nell'eliminazione dell'articolo.<br>";
			else
				echo "Il {$type} {$marca} {$modello} &egrave; stato eliminato dal database.<br><br>";
		}
		else
			echo "Il {$type} {$marca} {$modello} non esiste nel database.<br><br>";

		
	}
else {
?>
<div class='div-admin'>
	<form class="reg-form" action="?page=deleteart" method='POST'>
		<fieldset class="register-group">
			<label>
				Tipo (monitor/computer)
				<input type="text" name="type" placeholder="monitor/computer" maxlength='8' title="Inserisci il tipo di articolo" required>
			</label><br>
			<label>
				Marca
				<input type="text" name="marca" placeholder="Marca" maxlength='30' title="Inserisci la marca" required>
			</label>
			<br>
			
			<label>
				Modello
				<input type="text" name="modello" placeholder="Modello" maxlength='30' title="Inserisci il modello" required>
			</label>
			<br>
		</fieldset>
		<input class='reg-btn' type="submit" name="delete" value="Elimina">
	</form>
</div>
<?php } ?>