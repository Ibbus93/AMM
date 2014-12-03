<?php

if(isset($_POST['acquisto'])){
	$money = $_POST['money'];
	$mysqli->autocommit(false);
	
	/*	COSE DA FARE
	
		1. Query diminuzione pezzi in magazzino
			1.1 Verificare se i soldi bastano
			1.2 Se i soldi non bastano, rollback
			1.3 Se i soldi bastano, commit true
		2. Trovare la funzione ajax da usare --> finestra allarme in caso di errore (es.: non hai abbastanza soldi! || non abbiamo così tanti articoli!)
		3. Home Page
		4. Verificare tutte le condizioni e inserire i $mysqli->close() ovunque
	    5. Finire pagina articoli
	    6. Pagina modifica articolo (opz.)
		7. Inserire quantità nel carrello (se aggiungo due articoli uguali, mettere un "ce ne sono 2 qui" e se ne elimina uno per volta
	*/
	
	
}

else {
?>
	<div class='titolo'><h2><b>Carrello</b></h2></div>
	

	<?php
		$list = array();
		if(isset($_SESSION['userid'])){
			$userid = $_SESSION['userid'];
		$query = "SELECT * FROM computer INNER JOIN cart WHERE cart.id_utente = '$userid' AND cart.id_computer = computer.code";
		$result = $mysqli->query($query);
		$totale = 0;
		$nopc = 0;
		$nomon = 0;
		
		if($result->num_rows > 0){ //se ci sono computer li visualizzo
			
			while($row = $result->fetch_row())
				$list[] = new Computer ($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12]);

			$i = 0;
			?> <div class='div-cart'> <?php
			while($i < count($list)){
			?>
			
			<div class='box-article'>
							<div class='box-image-article'>
								<img class='image-article' src='<?php echo "{$list[$i]->getPhoto()}"; ?>' alt='<?php echo "{$list[$i]->getMarca()} {$list[$i]->getModello()}";?>'>
							</div><!--
							--><div class='name-article'>
	<!-- link da verificare-->	<h3><nobr><a class='art-link' href='index.php?page=list&sc=<?php echo"{$sc}";?>&art=<?php echo"{$list[$i]->getCode()}";?>' alt='<?php echo "{$list[$i]->getMarca()} {$list[$i]->getModello()}";?>'><?php echo "{$list[$i]->getMarca()} {$list[$i]->getModello()}";?></a></nobr></h3> <!-- marca e modello-->
								<p><nobr> Cod. <?php echo "{$list[$i]->getCode()}"; ?> - quantit&agrave: 5
							<?php	if ($list[$i]->getNum() > 0)
										echo " - <font color='#99f614'><nobr>DISPONIBILE</nobr></font></p>";
									else
										echo " - <font color='#ff3636'><nobr>NON DISPONIBILE</nobr></font></nobr></p>"; ?>
					<!--	echo "-->
								</p> <!-- codice -->
							</div><!--
							--><div class='box-price-article'>
								<!-- prezzo -->
								<h4 class='price-article'><?php echo "{$list[$i]->getPrice()}"; $totale = $totale + $list[$i]->getPrice();?>&#8364;</h4> <!-- prezzo -->
								<a href='?page=opcart&type=pc&sc=del&code=<?php echo "{$list[$i]->getCode()}"; ?>'><img class='img-dlt' src='assets/images/ics.jpg' alt='Elimina articolo'></a>
							</div>
						</div>
					<?php	$i++;		        	
			} 
		}else{
			$nopc = 1;
		}
		
		//guardo se ci sono monitor
		
		$query = "SELECT * FROM monitor INNER JOIN cart WHERE cart.id_utente = '$userid' AND cart.id_monitor = monitor.code";
		$result = $mysqli->query($query);
		$monlist = array();
		
		if($result->num_rows > 0){ //se ce ne sono li visualizzo
			while($row = $result->fetch_row())
				$monlist[] = new Monitor ($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]);
			$i = 0;
			
			if($nopc){
				?> <div class='div-cart'> <?php
			}
			while($i < count($monlist)){
			?>
	
			<div class='box-article'>
							<div class='box-image-article'>
								<img class='image-article' src='<?php echo "{$monlist[$i]->getPhoto()}"; ?>' alt='<?php echo "{$monlist[$i]->getMarca()} {$monlist[$i]->getModello()}";?>'>
							</div><!--
							--><div class='name-article'>
								<h3><nobr><a class='art-link' href='index.php?page=list&sc=<?php echo"{$sc}";?>&art=<?php echo"{$monlist[$i]->getCode()}";?>' alt='<?php echo "{$monlist[$i]->getMarca()} {$monlist[$i]->getModello()}";?>'><?php echo "{$monlist[$i]->getMarca()} {$monlist[$i]->getModello()}";?></a></nobr></h3> <!-- marca e modello-->
								<p> Cod. <?php echo "{$monlist[$i]->getCode()}"; ?>
							<?php	if ($monlist[$i]->getNum() > 0)
										echo " - <font color='#99f614'><nobr>DISPONIBILE</nobr></font></p>";
									else
										echo " - <font color='#ff3636'><nobr>NON DISPONIBILE</nobr></font></p>"; ?>
					<!--	echo "-->
								</p> <!-- codice -->
							</div><!--
							--><div class='box-price-article'>
								<!-- prezzo -->
								<h4 class='price-article'><?php echo "{$monlist[$i]->getPrice()}"; $totale = $totale + $monlist[$i]->getPrice();?>&#8364;</h4> <!-- prezzo -->
								<a href='?page=opcart&type=mon&sc=del&code=<?php echo "{$monlist[$i]->getCode()}"; ?>'><img class='img-dlt' src='assets/images/ics.jpg' alt='Elimina articolo'></a>
							</div>
						</div>
					<?php	$i++;		        	
			} 			
		} else{
			$nomon = 1;
			if($nopc && $nomon)
				echo "Il carrello &egrave; vuoto.<br><br>";
		}
	
		if(!$nopc || !$nomon){ ?>
			<b><h4 class='price-total'><br>Totale: <?php echo "{$totale}"; ?>&#8364;</h4></b>
			</div>

			<form class='move-left' action='?page=cart' method='POST'>
				<label class='money-input'>
					Inserisci i tuoi soldi <input type='text' name='money' placeholder='<?php echo "{$totale}"; ?>' value='<?php echo "{$totale}"; ?>'>
				</label>
				<input class='reg-btn acq-btn' type="submit" name="acquisto" value="Procedi con l'acquisto">
			</form>
<?php
		}
	}
	else { echo "Per acquistare registrati prima su YourBestPc.it!"; }
}
?>