<?php 
    include 'assests/sidebar.php';
    include 'assests/header.php';
    include 'database.php';

    $database = new Database;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = addslashes($_POST['name']) ;
      $description = addslashes($_POST['description']);
      $category = addslashes($_POST['category']);
      $price = addslashes($_POST['price']);
      $quantity = addslashes($_POST['quantity']);
  
      $data = array(
          'name' => $name,
          'description' => $description,
          'category' => $category,
          'price' => $price,
          'quantity' => $quantity
      );
  
      $result = $database->create('products', $data);
  
      if ($result) {
        $_SESSION['message'] = "Product added successfully";
      } else {
        $_SESSION['message'] = "Data Insertion faild";
      }
  }
     ?>
     <div class="container" style="margin-left: 250px;">
    <h1>Add Product</h1>
    <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= $_SESSION['message'] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>
    <form action="add_product.php" method="POST">
  <div class="mb-3">
    <label class="form-label">Product Name</label>
    <input type="text" name="name" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Product Description</label>
    <textarea type="text" name="description" class="form-control" required rows="5"></textarea>
  </div>
  <div class="mb-3">
  <label class="form-label">Product Category</label>
  <select class="form-control" aria-label="Default select example" name="category">
    
  <option selected>--- Select Category ---</option>
  <?php $result = $database->read('categories');
  foreach($result as $row){
  ?>
  <option value="<?= $row["id"] ?>"><?= $row["name"] ?></option>
  <?php } ?>
</select>
  </div>
  <div class="mb-3">
    <label class="form-label">Product Price $</label>
    <input type="number" name="price" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Quantity</label>
    <input type="number" name="quantity" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
     
    </div>
     <?php include 'assests/footer.php'; ?>