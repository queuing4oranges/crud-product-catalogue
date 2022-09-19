<!-- <?php
        header("Content-Type: application/json");
        require_once "connection.php";

        //connect to DB



        $response = array();

        //select data we want from DB
        $stmt = $connection->prepare("SELECT * FROM products");


        //execute and check query - success / error ?
        if ($stmt->execute()) {

            //array stores all of the results
            $products = array();
            $result = $stmt->get_result();

            //looping and getting single row - will be stored in movies array
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $products[] = $row;
            }

            //in case of success:
            $response['error'] = false;
            $response['products'] = $products;
            $response['message'] = "products returned successfully";
            $stmt->close(); //not mandatory - best practice to close query

        } else {
            $response['error'] = true; //there is an error
            $response['message'] = "oops, could not execute query";
            $response['response_code'] = 400;
        }

        //display results

        echo json_encode($response);



// if (
//     isset($_POST['sku'])
//     && isset($_POST['title'])
//     && isset($_POST['price'])
// ) {
//     $sku = $_POST['sku'];
//     $title = $_POST['title'];
//     $price = $_POST['price'];

//     $stmt = $connection->prepare("INSERT INTO products (sku, title, price) VALUES ( ?, ?, ? )");

//     $stmt->bind_param('dsd', $sku, $title, $price);

//     if ($stmt->execute()) {
//         $response['error'] = false;
//         $response['message'] = "Product added successfully.";
//         $stmt->close();
//     } else {
//         $response['error'] = true;
//         $response['message'] = "Failed to insert product into database.";
//     }
// } else {
//     $response['error'] = true;
//     $response['message'] = "Please provide the parameters to insert the product.";
// }

// class Product
// {
//     public $title = null;
//     public $sku = null;
//     public $price = null;

//     //here some insert function!
//     public function show(){
//         this->title = $title
//     }

//     public function create(){

//     }
//     // public function sayHello()
//     // {
//     //     echo ("hello");
//     // }
// }

// $item = new Product();

// var_dump($item);

//wie W3 - dann im html teil for each schleife?

// ...new Product

#########################################

// CREATE TABLE products (
//     id int NOT NULL AUTO_INCREMENT,
//     sku int NOT NULL,
//     title varchar(255) NOT NULL, 
//     price float(10,2) NOT NULL,
//     size int, 
//     weight int, 
//     height int, 
//     width int, 
//     length int, 
//     product_type varchar(100), 
// 	PRIMARY KEY (id))

// INSERT INTO `products` (`id`, `sku`, `title`, `price`, `size`, `weight`, `height`, `width`, `length`, `product_type`) VALUES (NULL, '1234', 'Acme DISC', '1.00', '700', NULL, NULL, NULL, NULL, 'DVD');

//"DELETE FROM products WHERE `products`.`id` = 2"

//http://localhost:8080/contact-form/src/api/products.php -->