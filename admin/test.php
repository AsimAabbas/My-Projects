

    <?php 
    session_start();
    if (!isset($_SESSION['email']) && $_SESSION['loggedin'] !== true) {
      header('Location: ../user/index.php');
      exit;
  }
    include 'assests/sidebar.php';
    include 'assests/header.php';
    
    require 'database.php';
    $database = new Database();
     
     ?>
    <div class="container" style="margin-left: 250px;">
    <div class="container-fluid">
    <div id="messageContainer" class="mt-3"></div>
    <h1>Latest Products</h1>
    <table class="table border">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Description</th>
      <th scope="col">Category</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Actions</th>
      <th scope="col"><a href="add_product.php" class="btn btn-primary btn-sm">New Product +</a></th>
    </tr>
  </thead>
  <tbody>
    <?php $result = $database->read('products', "", 5, 'id DESC');
        $i = 1;
        foreach($result as $row){
    ?>
    <tr>
      <th scope="row"><?= $i ?></th>
      <td><?= $row["name"] ?></td>
      <td><?= $row["description"] ?></td>
      <?php $category = $database->read('categories', "id = " . $row['category']); ?>
      <td><?= $category[0]['name'] ?></td>
      <td>$<?= $row["price"] ?></td>
      <td><?= $row["quantity"] ?></td>
      <td><button type="button" class="btn btn-primary edit-btn" id="edit-btn" data-toggle="modal" data-target="#editModal" data-product-id="<?= $row['id'] ?>">Edit</button>
      <button type="button" class="btn btn-danger delete" id="delete" data-product-id="<?= $row['id'] ?>">Delete</button>
    </td>
    </tr>
   
    <?php
     $i++;
  } ?>
  </tbody>
</table>
</div>
    <div class="container-fluid">
    <h1>Latest Categories</h1>
    <table class="table border">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
      <th scope="col"><a href="add_category.php" class="btn btn-primary btn-sm">New Category +</a></th>
    </tr>
  </thead>
  <tbody>
  <?php $result = $database->read('categories', "", 5, 'id DESC');
        $i = 1;
        foreach($result as $row){
    ?>
    <tr>
      <th scope="row"><?= $i ?></th>
      <td><?= $row["name"] ?></td>
      <td><?= $row["description"] ?></td>
      <td>
        <button type="button" class="btn btn-primary edit-btn2" 
                data-toggle="modal" data-target="#editModal2" 
                data-category-id="<?= $row['id'] ?>">
            Edit
        </button>
      <button type="button" class="btn btn-danger delete2" id="delete2" data-category-id="<?= $row['id'] ?>">Delete</button>
      </td>
    </tr>
    <?php
     $i++;
        } 
    ?>
  </tbody>
</table>
</div>


<!-- product modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editForm">
        <div class="modal-body">
          <input type="hidden" id="productId" name="productId" required>
          <label for="productName">Name</label>
          <input type="text" class="form-control" id="productName" name="productName" required>
          <label for="productDescription">Description</label>
          <textarea type="text" class="form-control" id="productDescription" name="productDescription" rows="5" required></textarea>
          <label for="productCategory">Category</label>
          <select class="form-control" aria-label="Default select example" name="productCategory" id="productCategory">
           
            <?php 
              $result = $database->read('categories');
              foreach($result as $row){
            ?>
            <option value="<?= $row["id"] ?>"><?= $row["name"] ?></option>
            <?php } ?>
          </select>
          <label for="productPrice">Price</label>
          <input type="text" class="form-control" id="productPrice" name="productPrice" required>
          <label for="productQuantity">Quantity</label>
          <input type="text" class="form-control" id="productQuantity" name="productQuantity" required>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>


<!-- category Modal -->
<div class="modal fade" id="editModal2" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editForm2">
        <div class="modal-body">
          <input type="hidden" id="categoryId" name="categoryId" required>
          <label for="categoryName">Name</label>
          <input type="text" class="form-control" id="categoryName" name="categoryName" required>
          <label for="categoryDescription">Description</label>
          <textarea type="text" class="form-control" id="categoryDescription" name="categoryDescription" rows="5" required></textarea>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
    </div>

   
<?php include 'assests/footer.php'; ?>

</html>