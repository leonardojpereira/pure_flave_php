<?php 

require 'src/connection-db.php';
require 'src/Model/Product.php';
require 'src/Repository/ProductRepository.php';

$productRepository = new ProductRepository($pdo);
$productRepository->delete($_POST['id']);

header("Location: admin.php");