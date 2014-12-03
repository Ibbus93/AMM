<?php 
//controlliamo che il file rispetti le dimensioni impostate
if ($_FILES["file"]["size"] < 1024000){
	//controlliamo se ci sono stati errori durante l'upload
	if ($_FILES["file"]["error"] > 0){
	echo "Codice Errore: " . $_FILES["file"]["error"]."
	";
	}
	else{
		//stampo alcune informazioni sul file
		//il nome originale
		
		$nome_img = $_FILES[$img_up_name] ['name']; // controlla il nome dell'immagine
		$img_split = explode(".",$nome_img); // verifica il tipo di estensione del file, controllando
		$estensione = array_pop($img_split); // le ultime letere dopo l'ultimo punto
		echo "Nome File: " . $_FILES["file"]["name"]."
		";
		echo "Estensione: {$estensione}";
		//il mime-type
		echo "Tipo File: " . $_FILES["file"]["type"] . "
		";
		//la dimensione in byte
		echo "Dimensione [byte]: " . $_FILES["file"]["size"] . "
		";
		//il nome del file temporaneo
		echo "Nome Temporaneo: " . $_FILES["file"]["tmp_name"] . "
		";
		//controllo se il file esiste già sul server
		if (file_exists("upload/" . $_FILES["file"]["name"])){
			echo "Il file " . $_FILES["file"]["name"] . " è già presente sul server";
		}
		else{
			//sposto il file caricato dalla cartella temporanea alla destinazione finale
			move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
			echo "File caricato in: " . "upload/" . $_FILES["file"]["name"];
		}
	}
}
else{
	echo "File troppo grande!!";
}
?>