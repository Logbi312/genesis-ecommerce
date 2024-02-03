<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?php require APPROOT . '/views/inc/admin/navbar.php'; ?>
 <h1><?php echo $data['title']; ?></h1>
 <a href="<?php echo URLROOT; ?>/categories/addCategories">
  <button type="button" class="btn btn-primary">Add New Cataegories</button>
</a>
 <div class="card mt-5">
    <div class="card-body">
      <?php foreach($data['categories'] as $category) : ?>
        <p class="border-bottom"><?php echo (!empty($category->parent_category)) ? $category->parent_category . ' > ' . $category->category_name : $category->category_name; ?></p>
      <?php endforeach; ?> 
    </div>
 </div>
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>