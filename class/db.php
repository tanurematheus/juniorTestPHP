<?php

declare(strict_types=1);

class db
{
    private $connection;

    public function __construct($database, $host, $dbname, $port, $user, $password)
    {
        try {
            $this->connection = new PDO($database . ":host=" . $host . ";dbname=" . $dbname . ';port=' . $port, $user, $password);
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

    public function list(): array
    {
        $sql = 'select * from products';
        $products = [];

        foreach ($this->connection->query($sql) as $key => $value) {
            array_push($products, $value);
        }

        return $products;
    }

    public function insert(string $sku, string $name, float $price, string $productType, string $info): int
    {
        $sql = 'insert into products(sku, name, price, info, productType) values(?, ?, ?, ?, ?)';

        $prepare = $this->connection->prepare($sql);

        $prepare->bindParam(1, $sku);
        $prepare->bindParam(2, $name);
        $prepare->bindParam(3, $price);
        $prepare->bindParam(4, $info);
        $prepare->bindParam(5, $productType);
        $prepare->execute();

        return $prepare->rowCount();
    }

    public function delete(string $sku): int
    {
        $sql = 'delete from products where sku = ?';

        $prepare = $this->connection->prepare($sql);

        $prepare->bindParam(1, $sku);

        $prepare->execute();

        return $prepare->rowCount();
    }
}
