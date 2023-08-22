<?php

class ProductRepository
{
    private PDO $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function productOptions(): array
    {
        $sql1 = "SELECT * FROM products ORDER BY price";
        $statement = $this->pdo->query($sql1);
        $products = $statement->fetchAll(PDO::FETCH_ASSOC);


        $productsData = array_map(function ($product) {
            return new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['image'],
            );
        }, $products);

        return $productsData;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM products ORDER BY price";
        $statement = $this->pdo->query($sql);
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        $allData = array_map(function ($product) {
            return new Product(
                $product['id'],
                $product['name'],
                $product['price'],
                $product['image'],
            );
        }, $data);

        return $allData;
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM products WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
    }

    public function save(Product $product)
    {
        $sql = "INSERT INTO products (name, price, image) VALUES (?, ?, ?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $product->getName());
        $statement->bindValue(2, $product->getPrice());
        $statement->bindValue(3, $product->getImage());
        $statement->execute();
    }

    public function update(int $id, string $name, float $price)
    {
        $sql = "UPDATE products SET name = ?, price = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $name);
        $statement->bindValue(2, $price);
        $statement->bindValue(3, $id);
        $statement->execute();
    }

    public function updateWithImage(int $id, string $name, float $price, string $image)
    {
        $sql = "UPDATE products SET name = ?, price = ?, image = ? WHERE id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $name);
        $statement->bindValue(2, $price);
        $statement->bindValue(3, $image);
        $statement->bindValue(4, $id);
        $statement->execute();
    }
}
