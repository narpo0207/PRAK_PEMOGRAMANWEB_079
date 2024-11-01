<?php
// File: classes/SpecialMochi.php
namespace MochiShop\Classes;

class SpecialMochi extends Mochi {
    public function getName(){
        return "Classic Mochi: $this->name";
    }
    public function getPrice(){
        return "Price: $this->price";
    }
    public function getInfo() {
        // return "Special Mochi: $this->name, Price: $this->price";
        return "coba deh";
    }
}
?>