<?php
// File: index.php

require_once 'Traits/ResponseFormatter.php';
require_once 'Abstracts/AbstractMochi.php';
require_once 'Classes/Mochi.php';
require_once 'Classes/ClassicMochi.php';
require_once 'Classes/SpecialMochi.php';
require_once 'Classes/MochiCart.php';

use MochiShop\Classes\ClassicMochi;
use MochiShop\Classes\SpecialMochi;
use MochiShop\Classes\MochiCart;

// Membuat beberapa item mochi
$mochi1 = new ClassicMochi("Red Bean Mochi", 10);
$mochi2 = new SpecialMochi("Matcha Mochi", 15);

// Membuat keranjang belanja
$cart = new MochiCart();
$cart->addItem($mochi1);
$cart->addItem($mochi2);

// Menampilkan informasi keranjang dalam format JSON
echo $cart->getCartInfo();
