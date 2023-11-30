<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'deleteProduct':
            deleteProduct();
            break;
        case 'editProduct':
            editProduct();
            break;
        case 'getProduct':
            getProduct();
            break;
        case 'getCategory':
            getCategory();
            break;
        case 'editCategory':
            editCategory();
            break;
        case 'deleteCategory':
            deleteCategory();
            break;
        default:
            echo json_encode(array('error' => 'Invalid action'));
    }
}
function deleteProduct(){
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
}

function editProduct(){
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
}
function editCategory(){
    require '../database.php';
$database = new Database();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $categoryId = $_POST['categoryId'];
    $categoryName = $_POST['categoryName'];
    $categoryDescription = $_POST['categoryDescription'];
    $categoryData = [
        'name' => $categoryName,
        'description' => $categoryDescription
    ];
    $updateResult = $database->update('categories',$categoryData, 'id = '.$categoryId);

    if ($updateResult) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('error' => 'Update failed'));
    }
} else {
    echo json_encode(array('error' => 'Invalid request method'));
}
}

function getProduct(){
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
}
function getCategory(){
    if(isset($_GET['categoryId'])) {
        $categoryId = filter_var($_GET['categoryId'], FILTER_SANITIZE_NUMBER_INT);
    
        require '../database.php';
        $database = new Database();
        $categoryDetails = $database->read('categories', 'id = ' . $categoryId);
        if(!empty($categoryDetails)) {
            echo json_encode($categoryDetails[0]); 
        } else {
            echo json_encode(array('error' => 'Product not found'));
        }
    } else {
        echo json_encode(array('error' => 'Invalid request'));
    }
}


function deleteCategory(){
    if(isset($_GET['categoryId'])) {
        $categoryId = filter_var($_GET['categoryId'], FILTER_SANITIZE_NUMBER_INT);
    
        require '../database.php';
        $database = new Database();
        $delete = $database->delete('categories', 'id = ' . $categoryId);
        if(!empty($delete)) {
            echo json_encode(array('message' => 'Category deleted Successfully')); 
        } else {
            echo json_encode(array('error' => 'Category not found'));
        }
    } else {
        echo json_encode(array('error' => 'Invalid request'));
    }
}