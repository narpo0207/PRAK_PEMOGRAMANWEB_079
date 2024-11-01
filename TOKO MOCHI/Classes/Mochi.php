<?php
namespace MochiShop\Classes;

use MochiShop\Abstracts\AbstractMochi;
use MochiShop\Traits\ResponseFormatter;

class Mochi extends AbstractMochi {
    use ResponseFormatter;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getDescription() {
        return "Mochi flavor: {$this->name}, Price: {$this->price}";
    }
}
?>