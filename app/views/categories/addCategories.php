<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?php require APPROOT . '/views/inc/admin/navbar.php'; ?>
 <h3><?php echo $data['title']; ?></h3>

<div class="container">
  <div class="row col-12">
    <div class="card">
      <div class="card-body">
        <h5 class="text-center">Add New Category</h5>
        <?php flash('post_message'); ?>
        <form method="post" action="<?php echo URLROOT; ?>/categories/add">
          <div class="mb-3">
            <label for="categoryName" class="form-label">Name</label>
            <input type="text" name="categoryName" class="form-control <?php echo (!empty($data['categoryName_error'])) ? 'is-invalid' : ''; ?>" id="category">
              <span class="invalid-feedback"><?php echo $data['categoryName_error'] ?></span>
          </div>
          <div class="mb-3">
            <label for="parentCategory" class="form-label">Parent Category</label>
            <select name="parentCategory" class="form-select" aria-label="Default select example">
              <option selected>None</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>       
      </div>
    </div>
  </div>
</div>



 <script>
  document.addEventListener("DOMContentLoaded", function() {
    var quill = new Quill('#quillEditor', {
      theme: 'snow'  // 'snow' is a clean and simple theme
    });
  });
</script>
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>