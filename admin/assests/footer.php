<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {


    $('#edit-btn').on('click', function() {
      
    var productId = $(this).data('product-id');
    $.ajax({
      url: 'ajax/ajax.php?action=getProduct&productId=' + productId,
      method: 'GET',
      data: { productId: productId },
      success: function(response) {
        var product = JSON.parse(response);
        $('#productId').val(product.id);
        $('#productName').val(product.name);
        $('#productDescription').val(product.description);
        $('#productCategory').val(product.category);
        $('#productPrice').val(product.price);
        $('#productQuantity').val(product.quantity);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });




  $('.delete').on('click', function() {
  var productId = $(this).data('product-id');
  if (confirm('Are you sure you want to delete this product?')) {
    $.ajax({
      url: 'ajax/ajax.php?action=deleteProduct&productId=' + productId,
      method: 'GET',
      data: { productId: productId },
      success: function(response) {
        console.log(response);
        var jsonResponse = JSON.parse(response);
        if (jsonResponse.message) {
          alert(jsonResponse.message);
          $(this).closest('.product-item').remove();
          window.location.reload(); 
        } else if (jsonResponse.error) {
          alert(jsonResponse.error);
        }
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  } else {
    console.log('Deletion canceled');
  }
});




  $('#editForm').submit(function(e) {
    e.preventDefault();
    $.ajax({
      url: 'ajax/ajax.php?action=editProduct&productId=' + productId,
      method: 'POST',
      data: $(this).serialize(),
      success: function(response) {
        $('#editModal').modal('hide');
        window.location.reload();
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });

  
  $('.edit-btn2').on('click', function() {
    var categoryId = $(this).data('category-id');
    // alert(categoryId);
    $.ajax({
      url: 'ajax/ajax.php?action=getCategory&categoryId=' + categoryId,
      method: 'GET',
      data: { categoryId: categoryId },
      success: function(response) {
        var category = JSON.parse(response);
        $('#categoryId').val(category.id);
        $('#categoryName').val(category.name);
        $('#categoryDescription').val(category.description);
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });

  $('#editForm2').submit(function(e) {
    e.preventDefault();
    $.ajax({
      url: 'ajax/ajax.php?action=editCategory&categoryId=' + categoryId,
      method: 'POST',
      data: $(this).serialize(),
      success: function(response) {
        $('#editModal').modal('hide');
        window.location.reload();
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  });


  $('.delete2').on('click', function() {
  var categoryId = $(this).data('category-id');
  if (confirm('Are you sure you want to delete this category?')) {
    $.ajax({
      url: 'ajax/ajax.php?action=deleteCategory&categoryId=' + categoryId,
      method: 'GET',
      data: { categoryId: categoryId },
      success: function(response) {
        window.location.reload();
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  } else {
    console.log('Deletion canceled');
  }
});



  function loadCategories() {
    $.ajax({
      // url: 'ajax/load_categories.php',
      method: 'GET',
      success: function(response) {
        var categories = JSON.parse(response);
        var categoryDropdown = $('#productCategory');
        categoryDropdown.empty();
        // categoryDropdown.append('<option value="">--- Select Category ---</option>');
        categories.forEach(function(category) {
          categoryDropdown.append('<option value="' + category.id + '">' + category.name + '</option>');
        });
      },
      error: function(xhr, status, error) {
        console.error(error);
      }
    });
  }


  $('#editModal').on('show.bs.modal', function() {
    loadCategories();
  });


});

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<footer>
  <div style="margin-top:40rem;" class="container bg-dark text-light mb-0 mt-[20px] ">
    <p>© 2023 All Rights Reserved By Asim Abbas</p>
  </div>
</footer>