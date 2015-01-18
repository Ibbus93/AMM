<?php
	
	//include('Computer.php');

				
	$list = array();
	$query = "SELECT * FROM computer WHERE monitor>14 ORDER BY code ASC";
	$result = $mysqli->query($query);
		        
	$i=0;
		        
	while($row = $result->fetch_row()){
	   	$list[$i] = new Computer ($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12]);
		        
	?>
		        
		            <div class='box-article'>
		    			<div class='box-image-article'>
		    				<img class='image-article' src='<?php echo "{$list[$i]->getPhoto()}"; ?>' alt='art1'>
		    			</div><!--
1		    			--><div class='name-article'>
		    				<h3><nobr><a class='art-link' href='index.php?page=notebook&art=<?php echo"{$list[$i]->getCode()}";?>' alt='<?php echo "{$list[$i]->getMarca()} {$list[$i]->getModello()}";?>'><?php echo "{$list[$i]->getMarca()} {$list[$i]->getModello()}";?></a></nobr></h3> <!-- marca e modello-->
		    				<p> Cod. <?php echo "{$list[$i]->getCode()}"; ?>
		    			<?php	if ($list[$i]->getNum() > 0){
		    					echo " - <font color='#99f614'><nobr>DISPONIBILE</nobr></font></p>";
		    				}
		    				else
		    					echo " - <font color='#ff3636'><nobr>NON DISPONIBILE</nobr></font></p>"; ?>
		    	<!--	echo "-->
		    				</p> <!-- codice -->
		    			</div><!--
		    			--><div class='box-price-article'>
		    				<!-- prezzo -->
		    				<h4 class='price-article'><?php echo "{$list[$i]->getPrice()}";?>&#8364;</h4> <!-- prezzo -->
		    				<!-- cart image -->
		    				<img class='cart-image' src='assets/images/cart.jpg' alt='Aggiungi al carrello'>
		    			</div>
		    		</div>
		    	<?php	$i++;		        	
		        } 
	$mysqli->close();
?>