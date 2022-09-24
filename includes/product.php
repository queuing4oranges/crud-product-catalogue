<?php


//this file will store all fcts related to articles

//get product record based on ID:
function getProduct($conn, $id) //fct needs connection and id passed in
{
    //creating the sql for the article, containing placeholder for id
    $sql = "SELECT * 
            FROM products
            WHERE id = ?";

    //prepare stmt
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt === false) {      //if false, echo error
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($stmt, "i", $id);     //otherwise: binding it as an integer

        //then execute it:
        if (mysqli_stmt_execute($stmt)) {

            $result = mysqli_stmt_get_result($stmt);

            //now put array in readable format: (we want an assoc array here)
            return mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
    }
}

//validate user inputs
function validateProduct($sku, $title, $price)
{
    $errors = [];

    if ($sku  == '') {   //checking if input empty
        $errors[] = 'Please provide the SKU.';
    }

    if ($title == '') {
        $errors[] = 'Please provide the title.';
    }

    if ($price == '') {
        $errors[] = 'Please provide the price.';
    }
    //print out array of errors - will be dumped out in html
    // var_dump($errors);  //if there's no errors, the array would be empty!

    return $errors;
}
