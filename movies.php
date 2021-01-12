<?php
    class Movies {
        private $ticketPrice = 0.00;
        private $fullTicketPrice = 50.00;
        private $age = 0;

        // Public Constructor for Movies class
        public function construct($ticketPrice, $fullTicketPrice, $age) {
            $this->ticketPrice = $ticketPrice;
            $this->fullTicketPrice = $fullTicketPrice;
            $this->age = $age;
        }

        public function setTicketPrice($age){
            $this->age = $age;

            if($age < 5){
                $this->ticketPrice = 0.00;
            }
            else if(($age >= 5) && ($age <= 17)){
                $this->ticketPrice = $this->fullTicketPrice / 2;
            }
            else if(($age > 18) && ($age <=55)){
                $this->ticketPrice = $this->fullTicketPrice;
            }
            else if($age > 55){
                $this->ticketPrice = $this->fullTicketPrice - 10;
            }
        }
        public function getTicketPrice(){
            return $this->ticketPrice;
        }
    }
?>