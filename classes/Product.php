<?php

class Product
{
    public $id;
    public $sku;
    public $title;
    public $price;

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

    public function updateProduct($conn)
    {
        if ($this->validateProduct()) { //calling method on this obj - if validate is true (= errors empty), do this:


            $sql =  "UPDATE products
                    SET    sku= :sku, 
                        title= :title, 
                        price= :price
                    WHERE  id= :id";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
            $stmt->bindValue(':sku', $this->sku, PDO::PARAM_INT);
            $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
            // $stmt->bindValue(':price', $this->price, PDO::PARAM_INT);

            //let's assume the price can be null:
            if ($this->price == '') {
                $stmt->bindValue(':price', $this->price, PDO::PARAM_INT);
            } else {
                $stmt->bindValue(':price', $this->price, PDO::PARAM_INT);
            }

            return $stmt->execute();
        } else {
            return false;
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

    public function addProduct($conn)
    {
        if ($this->validateProduct($this->sku, $this->title, $this->price)) {
            $sql =  "INSERT INTO products (sku, title, price)
                    VALUES (:sku, :title, :price )";

            $stmt = $conn->prepare($sql);

            $stmt->bindValue(':sku', $this->sku, PDO::PARAM_INT);
            $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
            $stmt->bindValue(':price', $this->price, PDO::PARAM_INT);

            if ($stmt->execute()) {
                $this->id = $conn->lastInsertId();
                return true;
            }
        } else {
            return false;
        }
    }

    //validate user inputs
    protected function validateProduct()
    {

        if ($this->sku  == '') {
            $this->errors[] = 'Please provide the SKU.';
        }

        if ($this->title == '') {
            $this->errors[] = 'Please provide the title.';
        }

        if ($this->price == '') {
            $this->errors[] = 'Please provide the price.';
        }

        return empty($this->errors);
    }
}


class Book extends Product
{
    public $weight;
}

class Dvd extends Product
{
    public $size;
}

class Furniture extends Product
{
    public $height;
    public $width;
    public $length;
}
