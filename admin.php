<?php

require 'src/connection-db.php';
require 'src/Model/Product.php';
require 'src/Repository/ProductRepository.php';

$productsRepository = new ProductRepository($pdo);
$products = $productsRepository->getAll();


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página de Administração</title>
  <link rel="stylesheet" href="assets/css/admin.css">
</head>

<body>

  <header>
    <div class="header">
      <nav class="navigation">
        <div class="logo">
          <a href="index.html">
            <img src="./assets/img/logo.png" alt="Logo">
            <h1>Puro Sabor</h1>
          </a>
        </div>
      </nav>
      <div class="ContainerLogin">
        <a href="login.html">Login</a>
      </div>
    </div>
  </header>

  <main>
    <h1>Página de Administração de Produtos</h1>
    <div class="container">
      <?php foreach ($products as $product) : ?>
        <div class="product" data-id="<?= $product->getId() ?>" data-name="<?= $product->getName() ?>" data-price="<?= $product->getPrice() ?>">
          <img src="<?= $product->getImageDirectoy() ?>" alt="<?= $product->getName() ?>">
          <div class="product-info">
            <h3><?= $product->getName() ?></h3>
            <p><?= "Preço: R$" . $product->getFormatedPrice() ?></p>
          </div>
          <div class="product-actions">
            <button class="edit-button">Editar</button>
            <form action="delete-product.php" method="post">
              <input type="hidden" name="id" value="<?= $product->getId() ?>">
              <button type="submit">Excluir</button>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="create-product-container">
      <a class="create-product-btn" href="/create-product.php">Cadastrar produto</a>
    </div>


    <div class="modal" id="editModal">
      <div class="modal-content">
        <span class="close-button">&times;</span>
        <h2>Editar produto</h2>
        <form method="post" action="" enctype="multipart/form-data">
          <input type="hidden" name="id" id="productId" value="">
          <label for="productName">Nome do produto</label>
          <input type="text" id="productName" name="name" placeholder="Nome">
          <label for="productPrice">Preço do produto</label>
          <input type="number" id="productPrice" name="price" placeholder="Preço (R$)">
          <input type="hidden" name="default_image" value="default_image.png">
          <label for="productImage">Nova Imagem do produto</label>
          <input type="file" id="newProductImage" name="new_image">
          <button type="submit">Salvar alterações</button>
        </form>
      </div>
    </div>
  </main>

  <script src="assets/script/admin.js"></script>
</body>

</html>