<?php
    /* 
        Classe che definisce un monitor nelle sue caratteristiche
    */
    
    class Monitor {
        private $marca;         // name
        private $modello;       // sign
        private $risoluzione;   // 800*600
        private $formato;       // 16:9
        private $treD;          // si/no boolean
        private $altoparlanti;  // si/no boolean
		private $num;			// numero articoli disponibili
		private $price;			// prezzo
		private $photo;			// path percorso
        private $code;          // codice

        
        public function __construct($marca, $modello, $risoluzione, $formato, $treD, $altoparlanti, $num, $price, $photo, $code) {
            $this->marca = $marca;
            $this->modello = $modello;
            $this->risoluzione= $risoluzione;
			$this->formato = $formato;
            $this->treD = $treD;
            $this->altoparlanti = $altoparlanti;
			$this->num = $num;
			$this->price = $price;
			$this->photo = $photo;
            $this->code = $code;
        }
        
        public function getMarca(){
            return $this->marca;
        }
        
        public function getModello(){
            return $this->modello;
        }
        
        public function getRisoluzione(){
            return $this->risoluzione;
        }
		
		public function getFormato(){
            return $this->formato;
        }
        
        public function getTreD(){
            return $this->treD;
        }
        
        public function getAltoparlanti(){
            return $this->altoparlanti;
        }
		
		public function getNum(){
			return $this->num;
		}
        
        public function getPrice(){
            return $this->price;
        }
        
		public function getPhoto(){
            return $this->photo;
        }
        
        public function getCode(){
            return $this->code;
        }
    }
?>