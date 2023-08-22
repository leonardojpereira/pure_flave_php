<?php

require 'src/connection-db.php';
require 'src/Model/Product.php';
require 'src/Repository/ProductRepository.php';

if (isset($_POST['create'])) {
  $product = new Product(
    null,
    $_POST['name'],
    $_POST['price'],
  );

  if (isset($_FILES['image'])) {
    $product->setImage(uniqid() . $_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], $product->getImageDirectoy());
  }

  $productRepository = new ProductRepository($pdo);
  $productRepository->save($product);

  header("Location: admin.php");
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="assets/css/create-product.css">
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

    <section class="container-form">
      <h1>Cadastrar novo produto</h1>
      <form method="post" enctype="multipart/form-data">

        <label for="nome">Nome</label>
        <input type="text" id="name" name="name" placeholder="Digite o nome do produto" required>

        <label for="preco">Preço</label>
        <input type="number" id="preco" name="price" placeholder="R$ 0.00" required>

        <label for="imagem">Envie uma imagem do produto</label>
        <input type="file" name="image" accept="image/*" id="image" placeholder="Envie uma imagem">

        <input type="submit" name="create" class="botao-cadastrar" value="Cadastrar produto" />
      </form>

    </section>
  </main>
</body>

</html>