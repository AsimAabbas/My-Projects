<?php
require '../database.php';
$database = new Database();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productId = $_POST['productId'];
    $productName = $_POST['productName'];
    $productDescription = $_POST['productDescription'];
    $productCategory = $_POST['productCategory'];
    $productPrice = $_POST['productPrice'];
    $productQuantity = $_POST['productQuantity'];
    $productData = [
        'name' => $productName,
        'description' => $productDescription,
        'category' => $productCategory,
        'price' => $productPrice,
        'quantity' => $productQuantity
    ];
    $updateResult = $database->update('products',$productData, 'id = '.$productId);

    if ($updateResult) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('error' => 'Update failed'));
    }
} else {
    echo json_encode(array('error' => 'Invalid request method'));
}
?>
