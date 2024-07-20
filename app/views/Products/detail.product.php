<?php
$pathImg = BASE_URL . "/images/dynamic/img_products";
$product = $data["product"];

?>

<section class="py-5">
  <div class="container px-4 px-lg-5 my-5">
    <div class="row align-items-center">
      <div class="col-md-6">
        <span class="text-capitalize"><?= $product["name_category"]; ?></span>
        <h1 class="display-5 fw-bolder"><?= $product["name_product"]; ?></h1>
        <div class="fs-5 mb-5">
          <span id="price">Rp.<?= number_format($product["price"], 0, '', '.'); ?>,00</span>
        </div>

        <p class="lead"><?= $product["description"]; ?></p>
        <?php
        if (!isset($_SESSION["user"]) || $product["user_id"] != $_SESSION["user"]) :
        ?>
          <form action="<?= BASE_URL; ?>/Home/checkout" method="post">
            <input type="hidden" name="id_product" value="<?= $product['id'] ?>" />
            <div class="mb-2">
              <div class="d-flex mb-3 gap-2">
                <button type="button" class="btn btn-outline-dark controller-value">-</button>
                <input class="form-control text-center" id="inputQuantity" type="num" min="1" value="1" name="quantity" style="max-width: 3rem" />
                <button type="button" class="btn btn-outline-dark controller-value">+</button>
              </div>

              <button type="submit" name="submit" class="btn btn-primary w-75">Beli Sekarang</button>
            </div>
          </form>

        <?php
        endif;
        ?>
      </div>
      <div class="col-md-6">
        <img class="card-img-top mb-5 mb-md-0" src="<?= $pathImg; ?>/<?= $product["product_img"]; ?>" alt="..." />
      </div>

    </div>
  </div>