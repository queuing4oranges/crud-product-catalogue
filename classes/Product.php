<?php

class Product
{
    public $id;
    public $sku;
    public $name;
    public $price;
    public $weight;
    public $size;
    public $length;
    public $width;
    public $height;

    public $errors = [];

    public static function showAll($conn)
    {

        $sql = "SELECT *
        FROM products
        ORDER BY id;";

        $results = $conn->query($sql);

        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getProduct($conn, $id)
    {

        $sql = "SELECT * 
        FROM products
        WHERE id = :id";


        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Product');

        if ($stmt->execute()) {

            return $stmt->fetch();
        }
    }

    public function deleteProduct($conn)
    {
        $sql = "DELETE FROM products 
                WHERE id = :id";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);

        return $stmt->execute();
    }

    protected function validate()
    {

        if ($this->sku  == '') {
            $this->errors[] = 'Please provide the SKU.';
        }

        if ($this->name == '') {
            $this->errors[] = 'Please provide the name.';
        }

        if ($this->price == '') {
            $this->errors[] = 'Please provide the price.';
        }


        return empty($this->errors);
    }

    public function addProduct($conn)
    {

        if ($this->validate()) {
            $sql =  "INSERT INTO products (sku, name, price, size, weight, height, width, length)
                    VALUES (:sku, :name, :price, :size, :weight, :height, :width, :length )";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':sku', $this->sku, PDO::PARAM_INT);
            $stmt->bindValue(':name', $this->name, PDO::PARAM_STR);
            $stmt->bindValue(':price', $this->price, PDO::PARAM_INT);
            $stmt->bindValue(':size',   $this->size, PDO::PARAM_INT);
            $stmt->bindValue(':weight', $this->weight, PDO::PARAM_STR);
            $stmt->bindValue(':height', $this->height, PDO::PARAM_STR);
            $stmt->bindValue(':width',  $this->width, PDO::PARAM_STR);
            $stmt->bindValue(':length', $this->length, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $this->id = $conn->lastInsertId();
                return true;
            }
        } else {
            return false;
        }
    }
}
