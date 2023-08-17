<?php
class PreSale {

    public $name = '';
    public $email = '';
    public $phoneNumber = '';
    public $company = '';
    public $location = '';
    public $quantity = '';
    public $preferredDate = '';
    public $tosAgreement = '';


    public function __construct($name, $email, $phoneNumber, $company, $location, $quantity, $preferredDate, $tosAgreement) {
        $this->name = $name;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->company = $company;
        $this->location = $location;
        $this->quantity = $quantity;
        $this->preferredDate = $preferredDate;
        $this->tosAgreement = $tosAgreement;

  }
  
    public function save($connection) {
      $query = "INSERT INTO presales(leadName, email, phoneNumber, company, locatedAt, quantity, quote, preferredDate, tosAgreement, leadStage, completeBool) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
  
      $query = $connection->prepare($query);
      $query->bind_param("sssssssssss", $a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k);
  
        $a = $this->name;
        $b = $this->email;
        $c = $this->phoneNumber;

        $d = $this->company;
        $e = $this->location;

        $f = $this->quantity;
        $g = $this->quantity*145;

        $h = $this->preferredDate;
        $i = $this->tosAgreement;

        $j = 'attempted to register';
        $k = '0';
  
      $query->execute();
    }
}



?>