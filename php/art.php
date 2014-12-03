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
	   	$var = new Monitor ($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]);
		
		
	}
	else{
		// html computer
		// $list = array();
		$query = "SELECT * FROM computer WHERE code='$art'";
		$result = $mysqli->query($query);
		
		$row = $result->fetch_row();
		
		$var = new Computer ($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12]);
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
	</div>
	
	<div class='table-caratt'>
		<?php
			if($sc == 'mon'){ //visualizzo gli articoli con le caratteristiche dei monitor ?>
				<!--<table>
					<caption>Scheda tecnica</caption>
						<tr>
							<td>Formato</td>
							<td><?php/* echo "{$var->getFormato()}"; */?></td>
						</tr>				
				</table> -->
				<table>
  <caption>Design and Front-End Development Books</caption>
  <thead>
    <tr>
      <th scope="col" colspan="2">Item</th>
      <th scope="col">Qty</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Don&#8217;t Make Me Think by Steve Krug</td>
      <td>In Stock</td>
      <td>1</td>
      <td>$30.02</td>
    </tr>
    ...
  </tbody>
  <tfoot>
    <tr>
      <td colspan="3">Subtotal</td>
      <td>$135.36</td>
    </tr>
    <tr>
      <td colspan="3">Tax</td>
      <td>$13.54</td>
    </tr>
    <tr>
      <td colspan="3">Total</td>
      <td>$148.90</td>
    </tr>
  </tfoot>
</table>
			<?php }
			else { 	    	  //caratteristiche computer ?>
				<ul>
				
				</ul>
			<?php }
		?>
	</div>