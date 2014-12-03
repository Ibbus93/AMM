<?php
	/*
		trovare la funzione giusta per prelevare un record
		impostare la visualizzazione del dato
		creare tabella con caratteristiche
	*/
	
	if($sc == 'mon'){
		// html monitor
		$query = "SELECT * FROM monitor WHERE code='$art' ORDER BY code ASC";
		$result = $mysqli->query($query);
   
		$row = $result->fetch_row();
	   	$var = new Monitor ($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11]);
		
		
	}
	else{
		// html computer
		// $list = array();
		$query = "SELECT * FROM computer WHERE code='$art'";
		$result = $mysqli->query($query);
		
		$row = $result->fetch_row();
		
		$var = new Computer ($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13]);
	}      
?>
	<div class="row"> <!-- Usata per nome articolo o titolo pagina -->
		<h1><?php echo "{$var->getMarca()} {$var->getModello()}"; ?></h1>
	</div>
				
	<div> <!-- foto e info principali -->
		<div class="photo-article"> <!-- foto dell'articolo -->
			<img class="img-art" src="<?php echo"{$var->getPhoto()}" ?>" alt="<?php echo "{$var->getMarca()} {$var->getModello()}"; ?>">
		</div><!--
					
		--><div class="description-article"> <!-- Prezzo, cod articolo, marca, disponibilità -->
			<h2> <?php echo "{$var->getPrice()}"; ?> &#8364; </h2>
			<p><?php echo"Cod. articolo {$var->getCode()}" ?></p>
			<?php	
				if ($var->getNum() > 0)
		    		echo "<p><font color='#99f614'><nobr>DISPONIBILE</nobr></font></p>";
		    	else
		    		echo "<p><font color='#ff3636'><nobr>NON DISPONIBILE</nobr></font></p>"; 
			?>	
		</div><!--
		
		--><div class="cart-article"><!-- contenitore immagine carrello -->
		<?php
			if($var->getNum() > 0){
				if($sc == 'mon')
					echo "<a href='?page=opcart&type=mon&sc=add&code={$var->getCode()}'>";
				else
					echo "<a href='?page=opcart&type=pc&sc=add&code={$var->getCode()}'>";
				echo"<img class='cart-art-image' src='assets/images/cart.jpg' alt='Aggiungi al carrello'></a>";
			}
			else 
				echo"<img class='cart-art-image' src='assets/images/cart.jpg' alt='Aggiungi al carrello'>";
		?>
		</div>
	</div><!--
	
	--><div class='row bott'>
		<?php echo "{$var->getDescription()}" ?>
	</div><!--
	--><div class='table-caratt'>
		<div>	
		<?php
			if($sc == 'mon'){ //visualizzo gli articoli con le caratteristiche dei monitor ?>
					<!--
						<b>Marca</b><div class='art-c'><?php// echo "{$var->getMarca()}" ?></div><br>
						<b>Modello</b><div class='art-c'><?php //echo "{$var->getModello()}" ?></div><br>
						<b>Risoluzione</b><div class='art-c'><?php //echo "{$var->getRisoluzione()}" ?></div><br>
						<b>Formato</b><div class='art-c'><?php //echo "{$var->getFormato()}" ?></div><br>
						<b>3D</b><div class='art-c'><?php //echo "{$var->getTreD()}" ?></div><br>
						<b>Altoparlanti</b><div class='art-c'><?php// echo "{$var->getAltoparlanti()}" ?></div><br>
					-->
					<table class="art-tab">
						<tbody>
							<tr>
								<td><b>Marca</b></td>
								<td class='lf'><?php echo "{$var->getMarca()}" ?></td>
							</tr>
							<tr>
								<td><b>Modello</b></td>
								<td class='lf'><?php echo "{$var->getModello()}" ?></td>
							</tr>
							<tr>
								<td><b>Pollici</b></td>
								<td class='lf'><?php echo "{$var->getPollici()}''" ?></td>
							</tr>							
							<tr>
								<td><b>Risoluzione</b></td>
								<td class='lf'><?php echo "{$var->getRisoluzione()}" ?></td>
							</tr>
							<tr>
								<td><b>Formato</b></td>
								<td class='lf'><?php echo "{$var->getFormato()}" ?></td>
							</tr>
							<tr>
								<td><b>3D</b></td>
								<td class='lf'><?php echo "{$var->getTreD()}" ?></td>
							</tr>
							<tr>
								<td><b>Altoparlanti</b></td>
								<td class='lf'><?php echo "{$var->getAltoparlanti()}" ?></td>
							</tr>
						</tbody>
					</table>
					
	<?php }
		else { 	    	  //caratteristiche computer ?>
				<table class="art-tab">
					<tbody>
						<tr>
							<td><b>Marca</b></td>
							<td class='lf'><?php echo "{$var->getMarca()}" ?></td>
						</tr>
						<tr>
							<td><b>Modello</b></td>
							<td class='lf'><?php echo "{$var->getModello()}" ?></td>
						</tr>
						<tr>
							<td><b>Sistema Operativo</b></td>
							<td class='lf'><?php echo "{$var->getOs()}" ?></td>
						</tr>							
						<?php if($var->getMonitor()) { ?>
						<tr>
							<td><b>Monitor</b></td>
							<td class='lf'><?php echo "{$var->getMonitor()}''" ?></td>
						</tr> <?php } ?>
						<tr>
							<td><b>CPU</b></td>
							<td class='lf'><?php echo "{$var->getCPU()}" ?></td>
						</tr>
						<tr>
							<td><b>Scheda video</b></td>
							<td class='lf'><?php echo "{$var->getVideo()}" ?></td>
						</tr>
						<tr>
							<td><b>Ram</b></td>
							<td class='lf'><?php echo "{$var->getRam()} GB" ?></td>
						</tr>
						<tr>
							<td><b>Hard Disk</b></td>
							<td class='lf'><?php echo "{$var->getHd()} GB" ?></td>
						</tr>
												<tr>
							<td><b>Memory Card Reader</b></td>
							<td class='lf'>
							<?php 
								if($var->getMemoryCard())  
									echo "Si";
								else
									echo "No";
							?>
							</td>
						</tr>
					</tbody>
				</table>
		<?php }
	?>
	</div>
</div>