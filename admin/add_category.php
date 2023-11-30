<?php 
    include 'assests/sidebar.php';
    include 'assests/header.php';
    include 'database.php';

    $create = new Database;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = addslashes($_POST['name']) ;
      $description = addslashes($_POST['description']);
  
      $data = array(
          'name' => $name,
          'description' => $description
      );
  
      $result = $create->create('categories', $data);
  
      if ($result) {
        $_SESSION['message'] = "Category added successfully";
      } else {
        $_SESSION['message'] = "Data Insertion faild";
      }
  }
     ?>
    <div class="container" style="margin-left: 250px;">
    <h1>Add Category</h1>
    <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      <?= $_SESSION['message'] ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php } ?>
    <form action="add_category.php" method="POST">
  <div class="mb-3">
    <label class="form-label">Category Name</label>
    <input type="text" name="name" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Category Description</label>
    <textarea type="text" name="description" class="form-control" required rows="5"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
     
    </div>
<?php include 'assests/footer.php'; ?>
