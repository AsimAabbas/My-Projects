<?php 
    include 'assests/sidebar.php';
    include 'assests/header.php';
    require 'database.php';
    $database = new Database();
     ?>
     <div class="container" style="margin-left: 250px;">
     
    <div class="container-fluid">
    <h1>All Categories</h1>
    <table class="table border">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php $result = $database->read('categories'); 
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