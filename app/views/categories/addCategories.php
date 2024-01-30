<?php require APPROOT . '/views/inc/admin/header.php'; ?>
<?php require APPROOT . '/views/inc/admin/navbar.php'; ?>
 <h3><?php echo $data['title']; ?></h3>

 <div class="container">
  <div class="row">
    <div class="col-md-12 col-lg-9">
      <div class="card mt-5">
        <div class="card-body">
          <div class="input-group">
            <span class="input-group-text" id="inputGroup-sizing-lg"><h5>Product Name</h5></span>
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
    </div>

  <div class="col-md-12 col-lg-3">
    <div class="card mt-5">
      <div class="card-body">
        <h5 class="card-title text-center">Product Categories</h5>
        <!-- You can add more content specific to your card if needed -->
      </div>
    </div>
</div>

  <div class="mb-3">
    <label for="imageInput" class="form-label">Choose Image:</label>
    <input type="file" class="form-control" id="imageInput" name="image" accept="image/*">
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