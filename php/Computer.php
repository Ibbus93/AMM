<?php
    /* 
        Classe che definisce un computer nelle sue caratteristiche
    */
    
    class Computer {
        private $marca;         // name
        private $modello;       // sign
        private $os;            // name
        private $monitor;       // pollici
        private $cpu;           // description
        private $video;         // description
        private $ram;           // description
        private $hd;            // description
        private $memoryCard;    // yes/no
        private $photo;         // path che reindirizza alla foto del prodotto
        private $code;          // codice identificativo del prodotto
        private $price;         // prezzo del modello
        private $num;           // numero rimanenze in magazzino
        
        public function __construct($marca, $modello, $os, $monitor, $cpu, $video, $ram, $hd, $memoryCard, $price, $num, $photo, $code) {
            $this->marca = $marca;
            $this->modello = $modello;
            $this->os= $os;
            $this->monitor = $monitor;
            $this->cpu = $cpu;
            $this->video = $video;
            $this->ram = $ram;
            $this->hd = $hd;
            $this->memoryCard = $memoryCard;
            $this->photo = $photo;
            $this->code = $code;
            $this->price = $price;
            $this->num = $num;
        }
        
        public function getMarca(){
            return $this->marca;
        }
        
        public function getModello(){
            return $this->modello;
        }
        
        public function getOs(){
            return $this->os;
        }
        
        public function getMonitor(){
            return $this->monitor;
        }
        
        public function getCpu(){
            return $this->cpu;
        }
        
        public function getVideo(){
            return $this->video;
        }
        
        public function getRam(){
            return $this->ram;
        }
    
        public function getHd(){
            return $this->hd;
        }
        
        public function getMemoryCard(){
            return $this->memoryCard;
        }
        
        public function getPhoto(){
            return $this->photo;
        }
        
        public function getCode(){
            return $this->code;
        }        
        
        public function getPrice(){
            return $this->price;   
        }
        
        public function getNum(){
            return $this->num;
        }
        
    }
?>