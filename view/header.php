<header class="primary-header container group">
	<h1 class="logo"><a href="index.php?page=home">Your Best PC</a></h1>
	<nav class="header-nav">
		<a href="index.php?page=who">Descrizione progetto</a><!--
		--><a href="index.php?page=where">Contatti</a><!--
		--><?php
			if(isset($_SESSION['username'])){
				$username = $_SESSION['username'];
				?><a href="index.php?page=account"><?php echo "{$username}"; ?></a><!--
				--><a href="index.php?page=logout">Logout <?php
			}
			else{
				?><a href="index.php?page=login">Login</a><!--
				--><a href="index.php?page=signup">Registrati <?php
			}
		?></a><!--
		--><a href="index.php?page=cart">Carrello</a>
	</nav>
</header>