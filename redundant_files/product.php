<?php

/*this file will store all fcts related to products
*/

//get product record based on ID:
function getProduct($conn, $id)
{

    $sql = "SELECT * 
            FROM products
            WHERE id = :id";


    $stmt = $conn->prepare($sql);

    $stmt->bindValue(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
};
