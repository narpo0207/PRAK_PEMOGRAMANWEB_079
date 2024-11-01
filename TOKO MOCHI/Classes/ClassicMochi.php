<?php
// File: classes/ClassicMochi.php
namespace MochiShop\Classes;

class ClassicMochi extends Mochi {
    public function getName(){
        return "Classic Mochi: $this->name";
    }
    public function getPrice(){
        return "Price: $this->price";
    }
    public function getInfo() {
        return "Classic Mochi: $this->name, Price: $this->price";
    }
}
?>
