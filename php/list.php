<?php
	
	//include('Computer.php');
	
	$list = array();

	switch($sc){
		case 'desk': 
			$query = "SELECT * FROM computer WHERE monitor=0 ORDER BY code ASC";
			$result = $mysqli->query($query);
			$type = 'pc';
			while($row = $result->fetch_row())
				$list[] = new Computer ($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13]);
			break;
		case 'note': 
			$query = "SELECT * FROM computer WHERE monitor>14 ORDER BY code ASC";
			$result = $mysqli->query($query);		        
			$type = 'pc';
			while($row = $result->fetch_row())
				$list[] = new Computer ($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13]);		
			break;
		case 'net': 
			$query = "SELECT * FROM computer WHERE monitor>0 AND monitor<14 ORDER BY code ASC";
			$result = $mysqli->query($query);        
			$type = 'pc';
			while($row = $result->fetch_row())
				$list[] = new Computer ($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12], $row[13]);		
			break;
		case 'mon': 
			$query = "SELECT * FROM monitor ORDER BY code ASC";
			$result = $mysqli->query($query);
			$type = 'mon';
			while($row = $result->fetch_row())
				$list[] = new Monitor ($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11]);			
	}
		$i=0;
		while($i < count($list)){
		        
	?>
		        
		            <div class='box-article box-art-w'>
		    			<div class='box-image-article'>
		    				<img class='image-article' src='<?php echo "{$list[$i]->getPhoto()}"; ?>' alt='<?php echo "{$list[$i]->getMarca()} {$list[$i]->getModello()}";?>'>
		    			</div><!--
1		    			--><div class='name-article'>
		    				<h3><nobr><a class='art-link' href='index.php?page=list&sc=<?php echo"{$sc}";?>&art=<?php echo"{$list[$i]->getCode()}";?>' alt='<?php echo "{$list[$i]->getMarca()} {$list[$i]->getModello()}";?>'><?php echo "{$list[$i]->getMarca()} {$list[$i]->getModello()}";?></a></nobr></h3> <!-- marca e modello-->
		    				<p> Cod. <?php echo "{$list[$i]->getCode()}"; ?>
		    			<?php	if ($list[$i]->getNum() > 0)
									echo " - <font color='#99f614'><nobr>DISPONIBILE</nobr></font></p>";
								else
									echo " - <font color='#ff3636'><nobr>NON DISPONIBILE</nobr></font></p>"; ?>
		    	<!--	echo "-->
		    				</p> <!-- codice -->
		    			</div><!--
		    			--><div class='box-price-article'>
		    				<!-- prezzo -->
		    				<h4 class='price-article'><?php echo "{$list[$i]->getPrice()}";?>&#8364;</h4> <!-- prezzo -->
		    				<!-- cart image -->
							<?php
								if($list[$i]->getNum() > 0){
									if(isset($_SESSION['username'])) {
										?> <a href='?page=opcart&type=<?php echo"{$type}"; ?>&sc=add&code=<?php echo "{$list[$i]->getCode()}"; ?>'> <?php
									}else{ ?>
										<a href='?page=err&code=1'> <?php
									}
								}	
								else 
									?><img class='cart-image' src='assets/images/cart.jpg' alt='Aggiungi al carrello'></a>
		    			</div>
		    		</div>
		    	<?php	$i++;		        	
		        } 
	$mysqli->close();
?>