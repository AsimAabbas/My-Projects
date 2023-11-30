<?php
if(isset($_GET['productId'])) {
    $productId = filter_var($_GET['productId'], FILTER_SANITIZE_NUMBER_INT);

    require '../database.php';
    $database = new Database();
    $delete = $database->delete('products', 'id = ' . $productId);
    if(!empty($delete)) {
        echo json_encode(array('message' => 'Product deleted Successfully')); 
    } else {
        echo json_encode(array('error' => 'Product not found'));
    }
} else {
    echo json_encode(array('error' => 'Invalid request'));
}
