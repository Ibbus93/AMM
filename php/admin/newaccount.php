<div class='div-admin'>
	<form class="reg-form" action="index.php?page=inviodati" method='POST'>
		<fieldset class="register-group">
			<label>
				Nome
				<input type="text" name="nome" placeholder="Nome" maxlength='30' title="Inserisci il tuo nome" required>
			</label>
						
			<br>
			<label>
				Cognome
				<input type="text" name="cognome" placeholder="Cognome" title="Inserisci il tuo cognome" required>
			</label>

			<br>
			<label>
				Data Nascita
				<input type="date" name="dataNascita" title="Inserisci la tua data di nascita" required>
			</label>

			<label>
				Sesso
				<select name="sesso" title="Seleziona il tuo sesso" required>
					<option value="" selected>Scegli</option>
					<option value="m">M</option>
				<option value="f">F</option>
				</select>
			</label>

			<br>
			<label>
				Via/Viale/Piazza/Loc.
				<input type="text" name="via" placeholder="Via" title="Insersci la tua via" required>
			</label>
						
			<label>
				N. civico
				<input type="number" name="numero" min='1' placeholder="Civico" title="Inserisci il tuo numero civico" required>
			</label>

			<br>
			<label>
				CAP
				<input type="text" name="cap" placeholder="CAP" pattern="^[0-9]{5}" maxlength='5' title="Il CAP (Codice Avviamento Postale) &egrave; formato da 5 numeri" required> <!-- Il pattern vuole solo 5 numeri -->
			</label>	
						
			<label> <!-- inserire menu a tendina -->
				Comune
				<input type="text" name="comune" placeholder="Comune" maxlength='30' title="Inserisci il tuo comune di residenza" required>
			</label>	
						
			<label> <!-- inserire menu a tendina -->
				Provincia
				<input type="text" name="provincia" placeholder="Provincia" maxlength='2' title="Inserisci la tua provincia" required>
			</label>	
			<br>

			<label>
				Mail
				<input type="email" name="email" placeholder="type@isp.reg" maxlength='60' required>
			</label>						
			<br>

			<label>
				Username
				<input type="text" name="username" placeholder="username" pattern="^[0-9a-zA-Z]{5,}" maxlength='15' title="L'username deve avere dai 5 ai 15 caratteri. Non sono ammessi caratteri speciali" required>
			</label>	
			<br>

			<label>
				Password
				<input type="password" name="password" placeholder="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" maxlength='20' title=" La password deve contenere maiuscole, minuscole, numeri, caratteri speciali, min 8 caratteri, max 20 caratteri" required>
			</label>
			<br>

			<label>
				<input type="checkbox" name="privacy" value="privacy" required> Ho letto e accettato l'informativa sulla privacy
				</label>
		</fieldset>
					
		<input class='reg-btn' type="submit" name="register" value="Registrati">
	</form>
</div>