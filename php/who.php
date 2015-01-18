<h1>Inserisci mysqli->close() ovunque!</h1>
<h2>Descrizione progetto</h2>
<p>Il sito YourBestPC &egrave; un negozio online in cui &egrave; possibile acquistare dei prodotti: per semplicit&agrave; legata allo sviluppo,
i prodotti acquistabili sono pc desktop, notebook, netbook e monitor.
Nel sito &egrave; possibile:
<ol class='ol-cond'>
	<li>Visualizzare gli articoli presenti nel database (visualizzabili dalla barra aside a sinistra);</li>
	<li>Inserire degli articoli nel carrello;</li>
	<li>Effettuare un acquisto, inserendo i soldi che servono nello spazio preposto nella pagina del carrello;</li>
	<li>Nella pagina dell'account, l'admin e i vari clienti hanno delle funzionalit&agrave;, descritte in basso.</li>
</ol>
</p>

<h2>Requisiti rispettati</h2>
<ol class='ol-cond'>
	<li>Utilizzo di HTML e CSS</li>
	<li>Utilizzo di PHP e MySQL</li>
	<li>Almeno due ruoli
		<ul class='li-square'>
			<li>Amministratore:
				<ul class='li-lower-alpha'>
					<li>Nome utente: admin</li>
					<li>Password: Qwerty@123</li>
					<li><ol class='li-upper-roman'>Funzioni abilitate: 
						<li>Inserisci foto</li>
						<li>Inserisci computer</li>
						<li>Inserisci monitor</li>
						<li>Elimina articolo</li>
						<li>Aggiorna quantit&agrave; articolo</li>
						<li>Nuovo utente</li>
						<li>Modifica utente</li>
						<li>Elimina utente</li>
					</ol></li>
				</ul>
			</li>		
			<li>Cliente:
				<ul class='li-lower-alpha'>
					<li>Nome utente: cliente</li>
					<li>Password: Qwerty@123</li>
					<li><ol class='li-upper-roman'>Funzioni abilitate: 
						<li>Modifica account</li>
						<li>Elimina account</li>
					</ol></li>
				</ul>
			</li>
		</ul>
	</li>
	<li>Almeno una transizione: presente in cart.php, viene simulata con l'inserimento di denaro per completare l'acquisto. Si eseguono le operazioni 
		di rimozione elementi dal carrello e dal magazzino, poi si controlla il denaro inserito: se basta si fa commit, altrimenti si fa la rollback.
	</li>
	<li>Almeno una funzionalit&agrave; ajax: lo script, presente su assets/script/account.js, utilizza la jQuery UI.</li>
</ol>
