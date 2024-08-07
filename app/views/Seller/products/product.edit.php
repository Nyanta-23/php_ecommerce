<?php
$path = BASE_URL . "/images/dynamic/img_products/";
$id = array_slice(explode("/", $_SERVER["REQUEST_URI"]), -1)[0];
?>

<section class="container-fluid ms-3 mt-2 mb-4">

  <div class="row mb-2">
    <div class="col-12">
      <div class="ms-2">
        <h1>Products</h1>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">
          <div class="mb-4 mt-2 mx-4">
            <h2>Edit Products</h2>
          </div>
          <div class="mx-5">
            <form action="<?= BASE_URL; ?>/products/editProduct/<?= $id; ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $id; ?>">
              <div class="mb-3">
                <label for="product" class="form-label">Nama Product</label>
                <input type="text" class="form-control" id="product" name="name_product" value="<?= $data["products"]["name_product"]; ?>" placeholder="Nama Product" />
              </div>

              <div class="mb-3">
                <label for="quantity" class="form-label">Jumlah Product</label>
                <input type="number" min="0" class="form-control" id="quantity" name="quantity" value="<?= $data["products"]["quantity"]; ?>" placeholder="Jumlah Product" />
              </div>

              <div class="mb-3">
                <label for="price" class="form-label">Harga</label>
                <div class="input-group">
                  <span class="input-group-text">Rp.</span>
                  <input type="number" min="0" class="form-control" id="price" name="price" value="<?= $data["products"]["price"]; ?>" placeholder="Harga" />
                </div>

              </div>
              <div class="mb-3">
                <label for="categories" class="form-label">Kategori</label>
                <div class="input-group">
                  <select id="categories" class="form-select text-capitalize" name="category_id">
                    <option>Pilih Kategori</option>
                    <?php
                    foreach ($data["categories"] as $category) :
                    ?>
                      <option class="text-capitalize" value="<?= $category["id"]; ?>" <?= $category["id"] == $data["products"]["category_id"] ? "selected" : false; ?>>
                        <?= $category["name_category"]; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>

              </div>

              <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea class="form-control" name="description" id="description" name="description" placeholder="Deskripsi product"><?= $data["products"]["description"]; ?></textarea>
              </div>

              <div class="mb-3">
                <label for="">Image Product</label>
                <div class="input-group">
                  <input type="file" name="product_image" class="form-control" id="product_image_input" value="<?= $data["products"]["product_img"]; ?>" />
                </div>
                <div class="mt-2">
                  <img id="product_image_highlight" src=" <?= $path . $data["products"]["product_img"] ?>" class="img-thumbnail w-50 rounded"/>
                </div>
              </div>

              <div class="mt-5 mb-4 d-flex gap-2 justify-content-end">
                <a href="<?= BASE_URL; ?>/products" class="btn btn-outline-secondary px-4">Kembali</a>
                <button type="submit" name="submit" class="btn btn-success px-4">Edit</button>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>

</section>

<?= Flasher::alert("edit_product"); ?>