<?php
namespace MochiShop\Abstracts;

abstract class AbstractMochi {
    protected $name;
    protected $price;

    abstract public function getDescription();
}
