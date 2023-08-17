<?php

  $products = [
    [
      'name' => 'Suco verde',
      'price' => '6.00',
      'image' => 'assets/img/suco_verde.webp'
    ],
    
    [
      'name' => 'Suco de maça',
      'price' => '6.00',
      'image' => 'assets/img/suco_de_maca.webp'
    ],

    [
      'name' => 'Suco de laranja',
      'price' => '6.00',
      'image' => 'assets/img/suco_laranja.webp'
    ],

    [
      'name' => 'Toranja rosa',
      'price' => '6.00',
      'image' => 'assets/img/taranja_rosa.webp'
    ],
    
    [
      'name' => 'Gengibre e tangerina',
      'price' => '6.00',
      'image' => 'assets/img/gengibre_e_tangerina.webp'
    ],

    [
      'name' => 'Lima e frambuesa',
      'price' => '6.00',
      'image' => 'assets/img/frambuesa.webp'
    ]
  ]


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
    <?php foreach ($products as $product):?>
    <div class="product">
      <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
      <div class="product-info">
        <h3><?= $product['name'] ?></h3>
        <p><?= "Preço: R$" . $product['price'] ?></p>
      </div>
      <div class="product-actions">
        <button class="edit-button">Editar</button>
        <button>Excluir</button>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <div class="modal" id="editModal">
    <div class="modal-content">
      <span class="close-button">&times;</span>
      <h2>Editar produto</h2>
      <form>
        <label for="productName">Nome do produto</label>
        <input type="text" id="productName" placeholder="Nome">
        <label for="productPrice">Preço do produto</label>
        <input type="number" id="productPrice" placeholder="Preço (R$)">
        <button type="submit">Salvar alterações</button>
      </form>
    </div>
  </div>
    </main>

    <script src="assets/script/admin.js"></script>
</body>
</html>