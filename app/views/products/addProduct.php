<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?php require APPROOT . '/views/inc/admin/navbar.php'; ?>
 <h1><?php echo $data['title']; ?></h1>

 <div class="card mt-5">
    <div class="card-body">
        <div class="input-group input-group-lg">
            <span class="input-group-text" id="inputGroup-sizing-lg"><h4>Product Name</h4></span>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
        </div>
    </div>
 </div>
 <div class="card mt-2">
    <div class="card-body">
            <div class="mb-3">
        <label for="quillEditor" class="form-label"><h4>Product Description</h4></label>
        <div id="quillEditor" style="height: 300px;"></div>
    </div>      
    </div>
 </div>

 <div class="mb-3">
      <label for="imageInput" class="form-label">Choose Image:</label>
      <input type="file" class="form-control" id="imageInput" name="image" accept="image/*">
    </div>

 <script>
  document.addEventListener("DOMContentLoaded", function() {
    var quill = new Quill('#quillEditor', {
      theme: 'snow'  // 'snow' is a clean and simple theme
    });
  });
</script>
<?php require APPROOT . '/views/inc/admin/footer.php'; ?>