<?php

namespace Warehouse\Services;

use Warehouse\Model\Product;
use Warehouse\LogIn\Logger;
use Warehouse\Model\User;

class WarehouseService {
    private $products = [];
    private $users = [];
    private $logger;

    public function __construct() {
        $this->logger = new Logger();
    }

    public function addProduct($id, $name, $amount) {
        $product = new Product($id, $name, $amount);
        $this->products[$id] = $product;
        $this->logger->log("Added product: $name with amount: $amount");
    }

    public function updateProductAmount($id, $amount) {
        if (isset($this->products[$id])) {
            $this->products[$id]->updateAmount($amount);
            $this->logger->log("Updated product (ID: $id) amount to: $amount");
        }
    }

    public function deleteProduct($id) {
        if (isset($this->products[$id])) {
            unset($this->products[$id]);
            $this->logger->log("Deleted product with ID: $id");
        }
    }

    public function addUser($code) {
        $user = new User($code);
        $this->users[$code] = $user;
    }

    public function validateUser($code) {
        return isset($this->users[$code]);
    }

    public function getProductLog() {
        return $this->logger->getLogs();
    }
}
