<?php
// File: classes/MochiCart.php
namespace MochiShop\Classes;

use MochiShop\Traits\ResponseFormatter;

class MochiCart {
    use ResponseFormatter;

    private $items = [];

    public function addItem(Mochi $mochi) {
        $this->items[] = $mochi;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += (int)$item->getPrice();
        }
        return $total;
    }

    public function getCartInfo() {
        $info = [];
        foreach ($this->items as $item) {
            $info[] = [
                "name" => $item->getName(),
                "price" => $item->getPrice(),
                "description" => $item->getInfo()
            ];
        }

        return $this->formatResponse(200, "Mochi Cart Items", [
            "items" => $info,
            "total" => $this->getTotal()
        ]);
    }
}
?>