<?php
include('../inc/header.php');
require_once '../controllers/upload_controller.php';

?>

<div class="preview my-2">
    <img id="imgPreview">
</div>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3  d-flex flex-column align-items-center">
        <label for="fileToUpload"><span class="text-danger"><?= isset($errors) ? $errors : '' ?></span><span class="text-success"><?= isset($success) ? $success : '' ?></span></label>
        <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
        <input  class="btn btn-primary mt-2" type="submit" value="Enregistrer">
    </div>
</form>

<?php
include('../inc/footer.php');
