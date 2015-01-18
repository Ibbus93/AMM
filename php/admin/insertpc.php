<?php 
	/* Creare il file di controllo e lasciare solo il form (idem per insertmon */
	/* Se riesco, inserire controlli ajax per eseguire le query subito dopo le submit dentro il menu creato */
	/* Inserire nei form di invio lo spazio per le descrizioni e i pollici su monitor. C'è un errore nella query, controllare */
if (isset($_POST['insertpc'])){
	
		$marca = $_POST['marca'];
		$modello = $_POST['modello'];
		$os = $_POST['os'];
		$monitor = $_POST['monitor'];
		$cpu = $_POST['cpu'];
		$video = $_POST['video'];
		$ram = $_POST['ram'];
		$hd = $_POST['hd'];
		$memoryCard = $_POST['memoryCard'];
		$price = $_POST['price'];
		$num = $_POST['num'];
		$photo = "assets/images/" . $_POST['photo'];
			
		//verificare se esiste la foto e l'articolo	
		
		$query = "SELECT * FROM computer WHERE photo = '$photo'";
		$result = $mysqli->query($query);
		
		$query = "SELECT * FROM computer WHERE marca LIKE '$marca' AND modello LIKE '$modello'";
		
		$result2 = $mysqli->query($query);
		
		if($result->num_rows > 0){ //la foto è stata già usata per un altro articolo
			echo "La foto seguente &egrave; stata gi&agrave usata per un altro articolo! <br>";
		}elseif($result2->num_rows > 0){
			echo "Articolo gi&agrave; presente nel database!<br>";
		}elseif(!file_exists($photo)){
			echo "Il file selezionato come foto non esiste nel database.<br>";
		}else{
			$query = "INSERT INTO computer(marca, modello, os, monitor, cpu, video, ram, hd, memoryCard, price, num, photo) VALUES ('$marca', '$modello', '$os', '$monitor', '$cpu', '$video', '$ram', '$hd', '$memoryCard', '$price', '$num', '$photo');";
			$result = $mysqli->query($query);
			
			if(!$result)
				echo "Errore nella query!";
			else //se carica fa vedere il form da compilare
				echo "<br><br>Articolo caricato!<br><br>";
		}	
}else {
?> <div class='div-admin'>
	<form class="reg-form" action="?page=insert&type=pc" method='POST'>
		<fieldset class="register-group">
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
				Sistema Operativo
				<input type="text" name="os" placeholder="Sistema Operativo" maxlength='15' title="Inserisci il sistema operativo" required>
			</label>
			<br>
		
			<label>
				Dimensione Monitor (Inserire 0 se &egrave; un computer desktop)
				<input type="text" name="monitor" placeholder="Monitor" maxlength='5' title="Inserisci il monitor" required>
			</label>
			<br>
		
			<label>
				CPU
				<input type="text" name="cpu" placeholder="CPU" maxlength='30' title="Inserisci i dettagli del processore" required>
			</label>
			<br>
		
			<label>
				Scheda grafica (se &egrave; integrata, inserire 'integrata')
				<input type="text" name="video" placeholder="Scheda grafica" maxlength='30' title="Inserisci la scheda grafica" required>
			</label>
			<br>
		
			<label>
				RAM (grandezza in GB)
				<input type="text" name="ram" placeholder="RAM" maxlength='30' title="Inserisci quanta RAM ha il computer" required>
			</label>
			<br>
		
			<label>
				Hard Disk (capienza in GB)
				<input type="text" name="hd" placeholder="Hard Disk" maxlength='4' title="Inserisci la capienza dell'hard disk" required>
			</label>
			<br>
		
			<label>
				Memory Card Reader(1 se ne &egrave; provvisto, 0 altrimenti)
				<input type="text" name="memoryCard" placeholder="0/1" maxlength='1' title="Inserisci se ha il lettore di memory card" required>
			</label>
			<br>
		
			<label>
				Prezzo
				<input type="text" name="price" placeholder="Prezzo" maxlength='8' title="Inserisci il prezzo" required>
			</label>
			<br>
		
			<label>
				Numero di articoli in magazzino
				<input type="text" name="num" placeholder="Numero" maxlength='5' title="Inserisci il numero di articoli in magazzino" required>
			</label>
			<br>
		
			<label>
				Photo
				<input type="text" name="photo" placeholder="nomefile.jpg" maxlength='30' title="Inserisci il nome della foto" required>
			</label>

			</fieldset>
		<input class='reg-btn' type="submit" name="insertpc" value="Inserisci">
	</form>

	<?php } ?>
</div>