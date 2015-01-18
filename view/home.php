<div class="row"> <!-- Usata per nome articolo o titolo pagina -->
	<h2><b>NON PERDERTI LE OFFERTE NATALIZIE!!</b></h2>
</div>
			
<div> <!-- articolo-->
	<?php				
		$query = "SELECT * FROM computer WHERE code = 12";
		$result = $mysqli->query($query);
		
		while($row = $result->fetch_row())
			$pc = new Computer ($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13]);

	?>
	<div class="photo-article"> <!-- foto dell'articolo -->
		<img class="img-art" src="<?php echo "{$pc->getPhoto()}"; ?>
		" alt="foto">
	</div><!--
				
	--><div class="description-article">
		<h2><?php echo "{$pc->getMarca()} {$pc->getModello()}"; ?></h2>
		<h3><?php echo "{$pc->getPrice()}"; ?> &#8364; </h3>
		<p> <br>Non perdere l'occasione!! Con <?php echo "{$pc->getHd()}"; ?> GB di HD SSD e <?php echo "{$pc->getRam()}"; ?> GB <br>
			di RAM &egrave; il miglior netbook che potresti desiderare!!!<br></p>
	</div>
</div>
			
<section class="text-art"> <!-- descrizione articolo -->
	<p><b>Perch&eacute; scegliere YourBestPC?</b></p>
	<p>
	   YourBestPC sta dalla parte del cliente! Con oltre 3000 articoli venduti ogni mese e un rating 99.5% nei maggiori siti di opinioni,
	   YourBestPC fa della qualit&agrave; il suo maggior vanto. Il cliente sa in che fase si trova ogni suo articolo, quando sar&agrave; 
	   recapitato e viene avvertito di ogni minima modifica che potrebbe avvenire all'ordine effettuato!<br>
	   Il diritto di recesso e di reso, prolungato recentemente fino a 30 giorni, &egrave; il migliore tra tutti i siti italiani!
	</p><br>
	
	<p><b>&Egrave; un sito sicuro?</b></p>
	<p>
	   Finora la percentuale di consegna degli articoli &egrave; stata pari al 100%! Il rimborso &egrave; garantito nei primi 30 giorni, 
	   quindi soddisfatti o rimborsati!
	</p><br>

	<p><b>In quanto tempo arrivano gli articoli a casa?</b></p>
	<p>
	   Grazie al servizio di consegna 'de Tziu Giuanni' al quale YourBestPC affida i suoi articoli dal 1987, il tuo ordine sar&agrave; recapitato
	   a casa entro due giorni lavorativi!
	</p>
</section>
<?php
$mysqli->close();
?>