<?php
$products = $data["products"];
$pathImg = BASE_URL . "/images/dynamic/img_products";

?>

<div class="wraper-home mt-3">
  <section>
    <div class="px-4 py-5 mt-4 mb-5 text-center border mx-5 shadow rounded-3">
      <h1 class="display-5 fw-bold text-body-emphasis">Beli Aja Dulu!</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Beli Aja Dulu. Merupakan web komersil yang dibuat tidak sengaja oleh developer. Yang dimana developer tersebut hanya bermain main dengan kodingan.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
        </div>
      </div>
    </div>
  </section>

  <div class="container">
    <div class="row">
      <div class="col-auto w-100">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Active</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Active</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-12 d-flex column-gap-3 row-gap-0 flex-wrap" style="margin-left: 2px !important;">

        <?php
        if ($products > 0) :
          foreach ($products as $data) :
        ?>
            <div class="card h-25" style="width: 16.68rem; height: 30% !important;">
              <img src="<?= $pathImg . "/" . $data["product_img"]; ?>" class="card-img-top h-50" />
              <div class="card-body mt-3">
                <h5 class="card-title"><?= $data["name_product"]; ?></h5>
                <h6 class="card-text">Rp.<?= number_format($data["price"], 0, '', '.'); ?>,00</h6>
              </div>
              <div>
                <a href="Home/detailproduct/<?= $data["id"]; ?>" class="btn btn-primary w-100 rounded-0 rounded-bottom-1">Beli Sekarang</a>
              </div>
            </div>
        <?php
          endforeach;
        endif;
        ?>

      </div>
    </div>
  </div>

</div>