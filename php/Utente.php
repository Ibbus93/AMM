<?php
 
    class Utente{
       
       private $nome;          //nome dell'utente
       private $cognome;       //cognome dell'utente
       private $via;           //via/viale/piazza
       private $numero;        //numero civico
       private $cap;           //CAP
       private $comune;        //Comune
       private $provincia;     //Sigla provincia
       private $email;         //indirizzo email
       private $sesso;         //lettera sesso
       private $dataNascita;   //data di nascita tipo AAAA-MM-GG
       private $username;      //username utente di almeno 5 caratteri e massimo 15
       private $password;      //password utente di almeno 8 caratteri e massimo 20
       private $admin;		   //1 si, 0 no
	   private $id;            //chiave primaria utente
       
       public function __construct($nome, $cognome, $dataNascita, $sesso, $via, $numero, $cap, $comune, $provincia, $email, $username, $password, $admin, $id){
           $this->nome = $nome;
           $this->cognome = $cognome;
           $this->dataNascita = $dataNascita;
           $this->sesso = $sesso;
           $this->via = $via;
           $this->numero = $numero;
           $this->cap = $cap;
           $this->comune = $comune;
           $this->provincia = $provincia;
           $this->email = $email;
           $this->username = $username;
           $this->password = $password;
		   $this->admin = $admin;
           $this->id = $id;
       }
       
       public function getNome(){
           return $this->nome;
       }
       
       public function getCognome(){
           return $this->cognome;
       }
       
       public function getVia(){
           return $this->via;
       }
       
       public function getNumero(){
           return $this->numero;
       }
       
       public function getCap(){
           return $this->cap;
       }
       
       public function getComune(){
           return $this->comune;
       }
       
       public function getProvincia(){
           return $this->provincia;
       }
       
       public function getEmail(){
           return $this->email;
       }
              
      public function getSesso(){
           return $this->sesso;
       }
       
       public function getDataNascita(){
           return $this->dataNascita;
       }

       public function getUsername(){
           return $this->username;
       }
  
       public function getPassword(){
           return $this->password;
       }

       public function getAdmin(){
		   return $this->admin;
	   }	
       
       public function getId(){
           return $this->id;
       }
   }
 
?>