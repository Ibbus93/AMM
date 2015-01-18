<?php
	/* sc dice se aggiungere (add) o eliminare (del) l'articolo
       il code identifica il codice dell'articolo da aggiungere/eliminare
	   se l'articolo è già presente nel carrello, aggiungiamo 1 in quantità se scegliamo add, togliamo 1 in quantità se scegliamo del
	   usare ajax per finestra eliminare articoli
	*/
	
	$type = $_GET['type'];  		// monitor or pc
	$sc = $_GET['sc'];				// add or del
	$code = $_GET['code'];  		// codice articolo
	$userid = $_SESSION['userid'];  // user id
	
	if($type == 'pc'){
		if($sc == 'add'){
			// Non bisogna far mettere nel carrello più articoli di quelli realmente disponibili
			// $num contiene quanti articoli ci sono ora nel carrello
			$querina = "SELECT num FROM cart WHERE id_utente = $userid AND id_computer = $code";
			$result = $mysqli->query($querina);
			$row = $result->fetch_row();
			$num = $row[0];
			
			// $tot contiene quanti articoli sono disponibili in magazzino
			$querina = "SELECT num FROM computer WHERE computer.code = $code";
			$result = $mysqli->query($querina);
			$row = $result->fetch_row();
			$tot = $row[0];
			
			if($num >= 1){
				$num++;
				if($tot >= $num){
					$query = "UPDATE cart SET num = $num WHERE id_utente = $userid AND id_computer = $code";
					if(!($mysqli->query($query)))
						echo "Errore nell'inserimento dell'articolo nel carrello (update).<br><br>";
					else{
						//visualizzo gli articoli inseriti
						header("refresh:0;url='?page=cart'" );
					}					
				}	
			} else{
				$query = "INSERT INTO cart(id_computer, id_utente, num) VALUES ($code, $userid, 1)";
				if(!($mysqli->query($query)))
					echo "Errore nell'inserimento dell'articolo nel carrello (add).<br><br>";
				else{
					//visualizzo gli articoli inseriti
					header("refresh:0;url='?page=cart'" );
				}			
			}
		}else{ //del 
			$query = "SELECT num FROM cart WHERE id_utente = $userid AND id_computer = $code";
			$result = $mysqli->query($query);
			$row = $result->fetch_row();
			$num = $row[0];			
			
			if($num > 1){
				$num--;
				$query = "UPDATE cart SET num = $num WHERE id_utente = $userid AND id_computer = $code";
				if(!($mysqli->query($query)))
					echo "Errore nell'inserimento dell'articolo nel carrello (update).<br><br>";
				else
					//visualizzo gli articoli inseriti
					header("refresh:0;url='?page=cart'" );	
			}else{
				$query = "DELETE FROM cart WHERE id_computer = $code AND id_utente = $userid";
				if(!($mysqli->query($query)))
					echo "Errore nell'eliminazione dell'articolo dal carrello.<br><br>";
				else
					header("refresh:0;url='?page=cart'" );
			}
		}
	}else {
		if($sc == 'add'){
			$querina = "SELECT num FROM cart WHERE id_utente = $userid AND id_monitor = $code";
			$result = $mysqli->query($querina);
			$row = $result->fetch_row();
			$num = $row[0];		
			
			if($num >= 1){
				$num++;
				$query = "UPDATE cart SET num = $num WHERE id_utente = $userid AND id_monitor = $code";
				if(!($mysqli->query($query)))
					echo "Errore nell'inserimento dell'articolo nel carrello. (update)<br><br>";
				else{
					//visualizzo gli articoli inseriti
					header("refresh:0;url='?page=cart'" );
				}					
			} else {
				$query = "INSERT INTO cart(id_monitor, id_utente, num) VALUES ($code, $userid, 1)";
				if(!($mysqli->query($query)))
					echo "Errore nell'inserimento dell'articolo nel carrello. (add)<br><br>";	
				else{
					//visualizzo gli articoli inseriti
					header("refresh:0;url='?page=cart'" );
				}
			}
		}else{ //del
			$query = "SELECT num FROM cart WHERE id_utente = $userid AND id_monitor = $code";
			$result = $mysqli->query($query);
			$row = $result->fetch_row();
			$num = $row[0];			
			
			if($num > 1){
				$num--;
				$query = "UPDATE cart SET num = $num WHERE id_utente = $userid AND id_monitor = $code";
				if(!($mysqli->query($query)))
					echo "Errore nell'inserimento dell'articolo nel carrello. (update)<br><br>";
				else
					//visualizzo gli articoli inseriti
					header("refresh:0;url='?page=cart'" );	
			}else{
				$query = "DELETE FROM cart WHERE id_monitor = $code AND id_utente = $userid";
				if(!($mysqli->query($query)))
					echo "Errore nell'eliminazione dell'articolo dal carrello.<br><br>";
				else
					header("refresh:0;url='?page=cart'" );
			}	
		}	
	}
	
	$mysqli->close();
?>