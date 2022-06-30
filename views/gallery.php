<?php
include('../inc/header.php');
require('../data/data.php');

// require_once '../controllers/upload_controller.php';

?>
<main class="container py-5">
    <hr class="my-5">
    <div class="row" data-masonry='{"percentPosition": true }'>
        <?php
        foreach ($data as $key => $value) { ?>
            <div class="col-sm-6 col-lg-4 mb-4">
                <div class="card">
                   <img src="../assets/img/<?= $value?>" alt="">
                </div>
            </div>
        <?php } ?>


    </div>
</main>
<?php
include('../inc/footer.php');
