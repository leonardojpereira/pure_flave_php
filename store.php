<?php

require 'src/connection-db.php';
require 'src/Model/Product.php';
require 'src/Repository/ProductRepository.php';

$productRepository = new ProductRepository($pdo);
$productsData = $productRepository->productOptions();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja</title>
    <link rel="stylesheet" href="assets/css/store.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <header>
        <div class="frete">
            <span>Frete grátis para pedidos acima de R$70</span>
        </div>
        <div class="header">
            <nav class="navigation">
                <div class="logo">
                    <a href="index.html">
                        <img src="./assets/img/logo.png" alt="Logo">
                        <h1>Puro Sabor</h1>
                    </a>
                </div>
                <ul>
                    <li><a href="#">Loja</a></li>
                    <li><a href="#">Sobre nós</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </nav>
            <div class="ContainerLogin">
                <a href="login.html" class="userContainer">
                    <span class="userIcon"><i class="fa-solid fa-circle-user" style="color: #39832f;"></i></span>
                    <span>Login</span>
                </a>
                <div class="cart-container">
                    <span class="counter">0</span>
                    <span class="cart"><i class="fa-solid fa-cart-shopping" style="color: rgb(61, 90, 35);"></i></span>
                </div>
            </div>
        </div>
    </header>

    <main>
        <h2>Comprar sabores</h2>
        <p>Refrigerado, 100% orgânico, embalado com vitaminas, <br> nutrientes e produtos naturais</p>
        <div class="containerProducts">
            <?php
            $productIdCounter = 0; // Inicializa o contador
            foreach ($productsData as $product) : ?>
                <div class="mimic">
                    <div class="img-container">
                    <img src="<?= $product->getImageDirectoy() ?>" alt="<?= $product->getName() ?>">
                        <span class="cart-btn" data-name="<?= $product->getName() ?>" data-price="<?= $product->getPrice() ?>" data-image="<?= "assets/img/" . $product->getImage() ?>" data-product-id="<?= $productIdCounter ?>"><i class="fa-solid fa-cart-shopping" style="color: #fff;"></i></span>
                    </div>
                    <span class="flavor"><?= $product->getName() ?></span>
                    <span class="price"><?= $product->getFormatedPrice() ?></span>
                </div>
            <?php
                $productIdCounter++; // Incrementa o contador
            endforeach;
            ?>
        </div>
    </main>

    <footer>
        <div class="ContainerContactInfo">
            <ul>
                <li>Termos e Condições</li>
                <li>Política de Privacidade</li>
                <li>Política de Envio</li>
                <li>Política de Reembolso</li>
            </ul>
            <ul>
                <li>Endereço:</li>
                <li>Rua Prates, 194 - Bom Retiro,</li>
                <li>São Paulo - SP, 01121-000</li>
            </ul>
            <ul>
                <li>Contato:</li>
                <li>info@meusite.com</li>
                <li>(11) 3456-7890</li>
            </ul>
        </div>
        <div class="ContainerCopyrightInfo">
            <div class="copy">
                <span class="footerText">@ 2023 por Leonardo Barbosa</span>
            </div>
            <div class="companyInfo">
                <p class="footerText">Puro Sabor - CPF/CNPJ: 12.345.678/0000-01 - Rua Prates,</p>
                <p class="footerText">194 - Bom Retiro São Paulo - SP, 01121-000 SP 12345-678 -</p>
                <p class="footerText">info@meusite.com | Telefone: (11) 3456-7890</p>
                <p class="footerText">Estimativa de entrega 2 - 5 dias úteis</p>
            </div>
            <div class="payment">
                <span class="footerText">Métodos de Pagamentos <br> Aceitos</span>
                <img src="./assets/img/Métodos de pagamento.webp" alt="Métodos de pagamento">
            </div>
        </div>
    </footer>


    <div class="cart-modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h3>Seu Carrinho</h3>
            <div class="cart-items">
                Seu carrinho está vazio :(
            </div>
            <div class="cart-total-container">
                <div class="cart-total">
                    <span class="total-text">Total:</span>
                    <span class="total-amount">R$ 0.00</span>
                </div>
                <button class="checkout-btn">Finalizar Compra</button>
            </div>
        </div>
        <script src="assets/script/store.js"></script>
</body>

</html>