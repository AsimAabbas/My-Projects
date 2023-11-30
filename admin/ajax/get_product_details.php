<?php
if(isset($_GET['productId'])) {
    $productId = filter_var($_GET['productId'], FILTER_SANITIZE_NUMBER_INT);

    require '../database.php';
    $database = new Database();
    $productDetails = $database->read('products', 'id = ' . $productId);
    if(!empty($productDetails)) {
        echo json_encode($productDetails[0]); 
    } else {
        echo json_encode(array('error' => 'Product not found'));
    }
} else {
    echo json_encode(array('error' => 'Invalid request'));
}
?>
