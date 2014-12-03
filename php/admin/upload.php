<?php 
//controlliamo che il file rispetti le dimensioni impostate
if ($_FILES["file"]["size"] < 1024000){
	//controlliamo se ci sono stati errori durante l'upload
	if ($_FILES["file"]["error"] > 0){
	echo "Errore nell'upload. Codice errore: " . $_FILES["file"]["error"]."
	";
	}
	else{
		//stampo alcune informazioni sul file
		//il nome originale
		
		$nome_img = $_FILES["file"] ['name']; // controlla il nome dell'immagine
		$img_split = explode(".",$nome_img); // verifica il tipo di estensione del file, controllando
		$estensione = array_pop($img_split); // le ultime letere dopo l'ultimo punto
		echo "<b>Nome File: </b>" . $_FILES["file"]["name"];
		echo "<br>";
		echo "<b>Estensione: </b>{$estensione}";
		echo "<br>";
		echo "<b>Tipo File: </b>" . $_FILES["file"]["type"];
		echo "<br>";
		echo "<b>Dimensione [byte]: </b>" . $_FILES["file"]["size"];
		echo "<br>";
		
		
		//controllo se il file esiste già sul server
		if (file_exists("assets/images/" . $_FILES["file"]["name"])){
			echo "Il file " . $_FILES["file"]["name"] . " &egrave; gi&agrave; presente sul server";
		}
		elseif($estensione == 'jpg' || $estensione == 'png' || $estensione == 'gif'){
			//sposto il file caricato dalla cartella temporanea alla destinazione finale
			move_uploaded_file($_FILES["file"]["tmp_name"], "assets/images/" . $_FILES["file"]["name"]);
			echo "File caricato in: " . "assets/images/" . $_FILES["file"]["name"];
		}
		else{
			echo "<br>Errore: Carica un file di estensione .jpg, .png o .gif<br";
		}
	}
}
else{
	echo "File troppo grande!!";
}
?>