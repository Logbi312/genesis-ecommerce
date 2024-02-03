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
            <option selected value="">None</option>
            <?php foreach($data['categories'] as $category) : ?>
              <option value="<?php echo (!empty($category->parent_category)) ? $category->parent_category . ' > ' . $category->category_name : $category->category_name; ?>">
                <?php echo (!empty($category->parent_category)) ? $category->parent_category . ' > ' . $category->category_name : $category->category_name; ?>
              </option>
              <?php endforeach; ?> 
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form> 
      </div>
    </div>
  </div>
</div>



<?php require APPROOT . '/views/inc/admin/footer.php'; ?>