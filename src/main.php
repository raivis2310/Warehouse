<?php

require 'vendor/autoload.php';

use Warehouse\Services\WarehouseService;

$warehouse = new WarehouseService();
$warehouse->addUser("123456");

echo "Enter access code: ";
$handle = fopen("php://stdin", "r");
$code = trim(fgets($handle));

if (!$warehouse->validateUser($code)) {
    echo "Access denied!\n";
    exit();
}

while (true) {
    echo "\n1. Add Product\n2. Update Product Amount\n3. Delete Product\n4. Show List\n5. Exit\nChoose an option: ";
    $choice = trim(fgets($handle));

    switch ($choice) {
        case '1':
            echo "Enter Product ID: ";
            $id = trim(fgets($handle));
            echo "Enter Product Name: ";
            $name = trim(fgets($handle));
            echo "Enter Product Amount: ";
            $amount = trim(fgets($handle));
            $warehouse->addProduct($id, $name, $amount);
            break;
        case '2':
            echo "Enter Product ID: ";
            $id = trim(fgets($handle));
            echo "Enter New Amount: ";
            $amount = trim(fgets($handle));
            $warehouse->updateProductAmount($id, $amount);
            break;
        case '3':
            echo "Enter Product ID to delete: ";
            $id = trim(fgets($handle));
            $warehouse->deleteProduct($id);
            break;
        case '4':
            print_r($warehouse->getProductLog());
            break;
        case '5':
            exit();
        default:
            echo "ERROR! Invalid input!\n.";
    }
}

