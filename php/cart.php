<?php

if(isset($_POST['acquisto'])){
	$money = $_POST['money'];
	$user = $_SESSION['username'];
	$userid = $_SESSION['userid'];
	$totale = $_SESSION['totale'];

	$mysqli->autocommit(false);
	
	echo "Soldi inseriti: $money <br>";
	echo "Soldi richiesti: $totale <br>";
	
	//Controllo se ci sono PC
	//$query = "SELECT * FROM computer INNER JOIN cart WHERE cart.id_utente = '$userid' AND cart.id_computer = computer.code";
	$query = "SELECT id_computer FROM cart WHERE cart.id_utente = '$userid' AND id_computer IS NOT NULL";
	$result = $mysqli->query($query);
	

	
	if($result->num_rows > 0){ //se ci sono li elimino dal DB 
		while($row = $result->fetch_row()){
			$listID[] = $row[0];
		}
	
		$i = 0;
		
		while($i < count($listID)){
			// $numDisp contiene quanti computer di codice $listID[$i] ci sono ancora disponibili
			$query = "SELECT num FROM computer WHERE computer.code = $listID[$i]";
			$resNum = $mysqli->query($query);
			$aux = $resNum->fetch_row();
			$numDisp = $aux[0];
			
			// $numCart contiene quanti computer si vogliono acquistare (presenti nel carrello)
			$query = "SELECT num FROM cart WHERE cart.id_computer = $listID[$i] AND cart.id_utente = '$userid'";
			$resNum = $mysqli->query($query);
			$aux = $resNum->fetch_row();
			$numCart = $aux[0];
			
			echo "Tizio vuole acquistare $numCart PC e in magazzeno ce ne sono attualmente $numDisp<br>";
		
			$query = "DELETE FROM cart WHERE id_computer = $listID[$i] AND id_utente = $userid";
			echo "i = $i<br>";
			if(!($mysqli->query($query))){
				echo "Errore nella query pc";
			}
			
			$toDel = $numDisp - $numCart;
			$query = "UPDATE computer SET num = $toDel WHERE code = $listID[$i]";
			echo "Il numero dei pc deve diventare $toDel<br>";
			echo "$query<br>";
			
			if(!($mysqli->query($query))){
				echo "Errore nella query todel<br>";
			}
			
			$i++;
		}
	}
		
	//controllo se ci sono monitor
	$query = "SELECT id_monitor FROM cart WHERE cart.id_utente = '$userid' AND id_monitor IS NOT NULL";
	$result = $mysqli->query($query);	
		
	if($result->num_rows > 0){ //se ci sono li elimino dal DB 
		
		while($row = $result->fetch_row()){
			$listIDM[] = $row[0];
		}
	
		$j = 0;
		
		while($j < count($listIDM)){
			$query = "DELETE FROM cart WHERE id_monitor = $listIDM[$j] AND id_utente = $userid";
			echo "j = $j<br>";
			if(!($mysqli->query($query))){
				echo "Errore nella query pc";
			}
			$j++;
		}
	}
		
	//controllo se i soldi inseriti non bastavano per acquistare, se no rollback
	if($money >= $totale){
		$mysqli->commit();
		?>
		<script type="text/javascript">
			alert("Acquisto effettuato!");
		</script>	
		<?php
		header("refresh:0;url='?page=home'" );
	}else{
		$mysqli->rollback();
		?>
		<script type="text/javascript">
			alert("I soldi inseriti non bastavano a coprire l'acquisto! Inserisci una somma adeguata.");
		</script>
		<?php
		header("refresh:0;url='?page=cart'" );				
	}

	// riabilito autocommit
	$mysqli->autocommit(true);			
}

else {
?>
	<div class='titolo'><h2><b>Carrello</b></h2></div>
	

	<?php
		$totale = 0;
		$list = array();
		if(isset($_SESSION['userid'])){
			$userid = $_SESSION['userid'];
		$query = "SELECT * FROM computer INNER JOIN cart WHERE cart.id_utente = '$userid' AND cart.id_computer = computer.code";
		$result = $mysqli->query($query);
		$nopc = 0;
		$nomon = 0;
		
		if($result->num_rows > 0){ //se ci sono computer li visualizzo
			
			while($row = $result->fetch_row())
				$list[] = new Computer ($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13]);

			$i = 0;
			?> <div class='div-cart'> <?php

			while($i < count($list)){
			?>

			<div class='box-article cart-art-box'>
							<div class='box-image-article'>
								<img class='image-article' src='<?php echo "{$list[$i]->getPhoto()}"; ?>' alt='<?php echo "{$list[$i]->getMarca()} {$list[$i]->getModello()}";?>'>
							</div><!--
							--><div class='name-article'>
								<h3><nobr><a class='art-link' href='index.php?page=list&sc=<?php echo"{$list[$i]->getType()}";?>&art=<?php echo"{$list[$i]->getCode()}";?>' alt='<?php echo "{$list[$i]->getMarca()} {$list[$i]->getModello()}";?>'><?php echo "{$list[$i]->getMarca()} {$list[$i]->getModello()}";?></a></nobr></h3> <!-- marca e modello-->
								<p><nobr> Cod. <?php echo "{$list[$i]->getCode()}"; ?> - quantit&agrave: 
							<?php	
								$cc = $list[$i]->getCode();
								$querina = "SELECT num FROM cart WHERE id_utente = $userid AND id_computer = $cc";
								$result = $mysqli->query($querina);
								$row = $result->fetch_row();
								$num = $row[0];
								echo "{$num}";
							?>
							
					<!--	echo ""-->
								</p> <!-- codice -->
							</div><!--
							--><div class='box-price-article'>
								<!-- prezzo -->
								<h4 class='price-article'><?php echo "{$list[$i]->getPrice()}"; $totale = $totale + ($list[$i]->getPrice() * $num);?>&#8364;</h4> <!-- prezzo -->
								<?php
									$aux = $list[$i]->getCode();
									$querina = "SELECT num FROM computer WHERE code = $aux";
									$result = $mysqli->query($querina);
									$row = $result->fetch_row();
									$numDisp = $row[0];
									if($numDisp > $num){
										?>
										<a href='?page=opcart&type=pc&sc=add&code=<?php echo "{$list[$i]->getCode()}"; ?>'><img class='img-dlt' src='assets/images/add.png' alt="Aumenta di un'unità la quantità"></a><?php
									}else{ ?>
										<img class='img-dlt' src='assets/images/add.png' alt="Aumenta di un'unità la quantità">
									<?php } ?>								
								<a href='?page=opcart&type=pc&sc=del&code=<?php echo "{$list[$i]->getCode()}"; ?>'><img class='img-dlt' src='assets/images/ics.jpg' alt="Riduci di un'unità la quantità"></a>
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
				$monlist[] = new Monitor ($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11]);
			$i = 0;
			
			if($nopc){
				?> <div class='div-cart'> <?php
			}
			while($i < count($monlist)){
			?>
	
			<div class='box-article cart-art-box'>
							<div class='box-image-article'>
								<img class='image-article' src='<?php echo "{$monlist[$i]->getPhoto()}"; ?>' alt='<?php echo "{$monlist[$i]->getMarca()} {$monlist[$i]->getModello()}";?>'>
							</div><!--
							--><div class='name-article'>
								<h3><nobr>
									<a class='art-link' href='index.php?page=list&sc=mon&art=<?php echo "{$monlist[$i]->getCode()}"; ?>' alt='<?php echo "{$monlist[$i]->getMarca()} {$monlist[$i]->getModello()}";?>'>
										<?php echo "{$monlist[$i]->getMarca()} {$monlist[$i]->getModello()}";?>  <!-- marca e modello-->
									</a></nobr></h3> 
								<p id='codiceArt'> Cod. <?php echo "{$monlist[$i]->getCode()}"; ?> - quantit&agrave;:
								<?php	
									$cc = $monlist[$i]->getCode();
									$querina = "SELECT num FROM cart WHERE id_utente = $userid AND id_monitor = $cc";
									$result = $mysqli->query($querina);
									$row = $result->fetch_row();
									$num = $row[0];
									echo "{$num}";
								?>
					<!--	echo "-->
								</p> <!-- codice -->
							</div><!--
							--><div class='box-price-article'>
								<!-- prezzo -->
								<h4 class='price-article'><?php echo "{$monlist[$i]->getPrice()}"; $totale = $totale + $monlist[$i]->getPrice() * $num;?>&#8364;</h4> <!-- prezzo -->
								
								<?php
									$aux = $monlist[$i]->getCode();
									$querina = "SELECT num FROM monitor WHERE code = $aux";
									$result = $mysqli->query($querina);
									$row = $result->fetch_row();
									$numDisp = $row[0];
									if($numDisp > $num){
										?>
										<a href='?page=opcart&type=mon&sc=add&code=<?php echo "{$monlist[$i]->getCode()}"; ?>'><img class='img-dlt' src='assets/images/add.png' alt="Aumenta di un'unità la quantità"></a><?php
									}else{ ?>
										<img class='img-dlt' src='assets/images/add.png' alt="Aumenta di un'unità la quantità">
									<?php } ?>
								<a href='?page=opcart&type=mon&sc=del&code=<?php echo "{$monlist[$i]->getCode()}"; ?>'><img class='img-dlt' src='assets/images/ics.jpg' alt="Riduci di un'unità la quantità"></a>
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

			<form class='move-left' action='#' method='POST'>
				<label class='money-input'>
					Inserisci i tuoi soldi <input type='number' step='any' name='money' placeholder='<?php echo "{$totale}"; ?>' value='<?php echo "{$totale}"; ?>'>
				</label>
				<input id='bottone' class='reg-btn acq-btn' type="submit" name="acquisto" value="Procedi con l'acquisto">
				<?php $_SESSION['totale'] = $totale; ?>
			</form>
<?php
		}
	}
	else { echo "Per acquistare registrati prima su YourBestPc.it!"; }
}
	$mysqli->close();
?>