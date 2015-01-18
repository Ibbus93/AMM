<?php

	if(isset($_POST['aggiorna'])){
		$type = $_POST['type'];
		$marca = $_POST['marca'];
		$modello = $_POST['modello'];
		$numero = $_POST['num'];
		
		$query = "SELECT * FROM $type WHERE marca LIKE '$marca' AND modello LIKE '$modello';";
		
		
		$result = $mysqli->query($query);
		
		if(!$result){
			echo "Errore nella query di selezione.<br><br>";
		}elseif($result->num_rows > 0){
				
			$query = "UPDATE $type SET num=$numero WHERE marca LIKE '$marca' AND modello LIKE '$modello' ";	
			$result = $mysqli->query($query);
			
			if(!$result)
				echo "Errore nell'aggiornamento dell'articolo.<br>";
			else
				echo "Il {$type} {$marca} {$modello} &egrave; stato aggiornato.<br><br>";
		}
		else
			echo "Il {$type} {$marca} {$modello} non esiste nel database.<br><br>";

		
	}
else {
?>
<div class='div-admin'>
	<form class="reg-form" action="?page=editart" method='POST'>
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
			
			<label>
				Numero
				<input type="number" name="num" placeholder="0" value='0' maxlength='4' title="Inserisci il numero" required>
			</label>
			<br>			
		</fieldset>
		<input class='reg-btn' type="submit" name="aggiorna" value="Aggiorna">
	</form>
</div>
<?php } ?>