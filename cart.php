

<?php
require 'inc/head.php';
require 'inc/data/products.php';

$idCookiesAdded=[];

if (isset($_SESSION['id_cookies_added_to_cart'])) {
    $idCookiesAdded = $_SESSION['id_cookies_added_to_cart'];
}

?>
<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($idCookiesAdded as $idCookieAdded) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $idCookieAdded; ?>.jpg"
                         alt="<?= $catalog[$idCookieAdded]['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $catalog[$idCookieAdded]['name']; ?></h3>
                        <p><?= $catalog[$idCookieAdded]['description']; ?></p>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
