<?php
require 'src/connection-db.php';
require 'src/Model/Product.php';
require 'src/Repository/ProductRepository.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['id'];
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];

    // Process the new image upload if provided
    $newImageName = $_FILES['new_image']['name'];
    $newImageTmp = $_FILES['new_image']['tmp_name'];
    $newImageName = $_FILES['new_image']['name'];
    $newImageTmp = $_FILES['new_image']['tmp_name'];
    if (!empty($newImageName)) {
        $newImagePath = 'assets/img/' . $newImageName;
        move_uploaded_file($newImageTmp, $newImagePath);
    } else {
        // If no new image provided, use the default image name
        $newImageName = $_POST['default_image'];
    }

    // Update the product in the database using the provided data
    $productsRepository = new ProductRepository($pdo);
    $productsRepository->updateWithImage($productId, $productName, $productPrice, $newImageName);

    header('Location: admin.php'); // Redirect back to the admin page
    exit;
}
