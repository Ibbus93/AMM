<?php 

	$type = $_GET['type'];

	if($type == 'pc'){

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
	} else {
	
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
		
			$query = "INSERT INTO monitor(marca, modello, risoluzione, formato, tred, altoparlanti, num, price, photo) VALUES ('$marca', '$modello', '$risoluzione', '$formato', '$tred', '$altoparlanti', '$num', '$price', '$photo');";
			$result = $mysqli->query($query);
			
			if(!$result)
				echo "Errore nella query!";
			else
				echo "<br><br>Articolo caricato!<br><br>";
		
		
		}
		
	
	}