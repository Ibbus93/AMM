<br>
<?php
	switch($code){
		case 1:
			echo "Per aggiungere gli acquisti al carrello devi prima registrarti!<br><br>";
			echo "Sarai reindirizzato alla pagina di registrazione in 5 secondi...";
			header("refresh:5;url='?page=signup'" );
			break;
	}
?>