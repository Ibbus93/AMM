
<?php 

if (isset($_POST['insert'])){
	
		$marca = $_POST['marca'];
		$modello = $_POST['modello'];
		$risoluzione = $_POST['risoluzione'];
		$formato = $_POST['formato'];
		$tred = $_POST['tred'];
		$altoparlanti = $_POST['altoparlanti'];
		$num = $_POST['num'];
		$price = $_POST['price'];
		$photo = "assets/images/" . $_POST['photo'];

		//verificare se esiste la foto e l'articolo	
	
		$query = "SELECT * FROM monitor WHERE photo = '$photo'";
		$result = $mysqli->query($query);
		
		$query = "SELECT * FROM computer WHERE marca LIKE '$marca' AND modello LIKE '$modello'";
		
		$result2 = $mysqli->query($query);
		
		if($result->num_rows > 0){ //la foto è stata già usata per un altro articolo
			echo "La foto seguente &egrave; stata gi&agrave usata per un altro articolo! <br>";
		}elseif($result->num_rows > 0){
			echo "Articolo gi&agrave; presente nel database!<br>";
		}else{
		
			$query = "INSERT INTO monitor(marca, modello, risoluzione, formato, 3D, altoparlanti, num, prezzo, photo) VALUES ('$marca', '$modello', '$risoluzione', '$formato', '$tred', '$altoparlanti', '$num', '$price', '$photo');";
			$result = $mysqli->query($query);
			
			if(!$result)
				echo "Errore nella query! insert";
			else
				echo "<br><br>Articolo caricato!<br><br>";
		
		
		}	
}else {
?> <div class='div-admin'> 

	<form class="reg-form" action="?page=insertmon" method='POST'>
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
				Risoluzione
				<input type="text" name="risoluzione" placeholder="800x600" maxlength='15' title="Inserisci il sistema operativo" required>
			</label>
			<br>
		
			<label>
				Formato
				<input type="text" name="formato" placeholder="16:9" maxlength='8' title="Inserisci il monitor" required>
			</label>
			<br>
		
			<label>
				3D (1 si, 0 altrimenti)
				<input type="text" name="tred" placeholder="1/0" maxlength='1' title="Inserisci i dettagli del processore" required>
			</label>
			<br>
		
			<label>
				Altoparlanti (1 si, 0 altrimenti)
				<input type="text" name="altoparlanti" placeholder="1/0" maxlength='1' title="Inserisci la scheda grafica" required>
			</label>
			<br>
		
			<label>
				Num
				<input type="text" name="num" placeholder="50" maxlength='4' title="Inserisci quanta RAM ha il computer" required>
			</label>
			<br>
		
			<label>
				Prezzo
				<input type="text" name="price" placeholder="prezzo" maxlength='10' title="Inserisci la capienza dell'hard disc" required>
			</label>
			<br>
		
			<label>
				Foto
				<input type="text" name="photo" placeholder="nomefile.jpg" maxlength='15' title="Inserisci se ha il lettore di memory card" required>
			</label>

			</fieldset>
		<input class='reg-btn' type="submit" name="insert" value="Inserisci">
	</form>
<?php  } ?>
</div>