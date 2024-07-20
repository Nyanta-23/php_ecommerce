
<div class="row d-flex justify-content-center align-items-center">
  <div class="col-12">
    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
      <div class="card-body p-0">
        <div class="row g-0">
          <div class="col-lg-8">
            <div class="p-5">
              <div class="d-flex justify-content-between align-items-center mb-5">
                <h1 class="fw-bold mb-0">List Belanja</h1>
                <h6 class="mb-0 text-muted">3 items</h6>
              </div>

              <?php
              foreach ($data['products'] as $product) :
              ?>
                <hr class="my-4">
                <div class="row mb-4 d-flex justify-content-between align-items-center">
                  <div class="col-md-2 col-lg-2 col-xl-2">
                    <img src="<?= BASE_URL; ?>/images/dynamic/img_products/<?= $product['product_img']; ?>" class="img-fluid rounded-3">
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-3">
                    <h6 class="mb-0"><?= $product['name_product']; ?></h6>
                  </div>
                  <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                    <span><?= $product['quantity']; ?></span>
                  </div>
                  <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                    <h6 class="mb-0">Rp.<?= number_format($product['price'] * $product['quantity'] , 0, ',', '.') ?>,00</h6>
                  </div>
                  <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                    <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                  </div>
                </div>
                <hr class="my-4">
              <?php endforeach;  ?>


              <div class="pt-5">
                <h6 class="mb-0"><a href="<?= BASE_URL; ?>" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Kembali ke Halaman Utama</a></h6>
              </div>
            </div>
          </div>
          <div class="col-lg-4 bg-body-tertiary">
            <div class="p-5">

              <div class="d-flex justify-content-between mb-4">
                <h5 class="text-uppercase"><?= $data['products'][0]['quantity']; ?> Items</h5>
              
              </div>

              <hr class="my-4">

              <div class="d-flex justify-content-between mb-5">
                <h5 class="text-uppercase">Total price</h5>
                <h5>Rp.<?= number_format($product['price'] * $product['quantity'] , 0, ',', '.') ?>,00</h5>
              </div>

              <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Beli Sekarang</button>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= Flasher::FlashMessage('add_checkout') ?>