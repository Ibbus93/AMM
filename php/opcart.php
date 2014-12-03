<?php
	/* sc dice se aggiungere (add) o eliminare (del) l'articolo
       il code identifica il codice dell'articolo da aggiungere/eliminare
	   bisogna aggiungere la distinzione tra PC e MONITOR
	*/
	
	$type = $_GET['type'];  		// monitor or pc
	$sc = $_GET['sc'];				// add or del
	$code = $_GET['code'];  		// codice articolo
	$userid = $_SESSION['userid'];  // user id
	
	if($type == 'pc'){
		if($sc == 'add'){ 
			$query = "INSERT INTO cart(id_computer, id_utente) VALUES ($code, $userid)";
			if(!($mysqli->query($query)))
				echo "Errore nell'inserimento dell'articolo nel carrello.<br><br>";
			else{
				//visualizzo gli articoli inseriti
				header("refresh:0;url='?page=cart'" );
			}
		}else{ //del 
			$query = "DELETE FROM cart WHERE id_computer = $code AND id_utente = $userid";
			if(!($mysqli->query($query)))
				echo "Errore nell'eliminazione dell'articolo dal carrello.<br><br>";
			else{
				//visualizzo gli articoli eliminati
				header("refresh:0;url='?page=cart'" );
			}			
		}
	}else {
		if($sc == 'add'){
			$query = "INSERT INTO cart(id_monitor, id_utente) VALUES ($code, $userid)";
			if(!($mysqli->query($query)))
				echo "Errore nell'inserimento dell'articolo nel carrello.<br><br>";	
			else{
				//visualizzo gli articoli inseriti
				header("refresh:0;url='?page=cart'" );
			}				
		}else{ //del
			$query = "DELETE FROM cart WHERE id_monitor = $code AND id_utente = $userid";
			if(!($mysqli->query($query)))
				echo "Errore nell'eliminazione dell'articolo dal carrello.<br><br>";
			else{
				//visualizzo gli articoli eliminati
				header("refresh:0;url='?page=cart'" );
			}			
		}	
	}
	
	
?>