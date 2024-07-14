<?php
$i = 1;
$pathImg = BASE_URL . "/images/dynamic/img_products/";

$products = $data["products"];

$amount_page = $data["amount_page"];
$active_page = $data["active_page"];
?>

<section class="container-fluid">

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

        <div class="card-header">
          <div class="d-flex justify-content-between">

            <h3 class="card-title">Data Products</h3>

            <a href="<?= BASE_URL ?>/Products/addProduct" class="btn btn-primary">Tambah Product</a>
          </div>
        </div>

        <div class="card-body">
          <div class="row">
            <div class="col-sm-12">
              <table class="table table-bordered table-hover table-striped">

                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Product</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th class="text-center">Gambar</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>


                <tbody>

                  <?php
                  if ($products > 0) :
                    foreach ($products as $data) :
                  ?>
                      <tr class="text-center align-self-center">
                        <td><?= $i++; ?></td>
                        <td><?= $data["name_product"]; ?></td>
                        <td><?= $data["quantity"]; ?></td>
                        <td><?= $data["price"]; ?></td>
                        <td><?= $data["name_category"]; ?></td>
                        <td style="width: 300px;"><?= $data["description"]; ?></td>
                        <td class="text-center"><img width="190px" height="200px" src="<?= $pathImg; ?><?= $data["product_img"]; ?>" alt="<?= $data["name_product"]; ?>.<?= $data["product_img"]; ?>"></td>
                        <td class="text-center my-auto">
                          <a href="<?= BASE_URL; ?>/products/editProduct/<?= $data['id']; ?>" class="btn btn-success">Ubah</a>
                          <a href="<?= BASE_URL; ?>/products/deleteProduct/<?= $data['id']; ?>" class="btn btn-danger" onclick="return confirm('yakin?');">Hapus</a>
                        </td>
                      </tr>
                  <?php
                    endforeach;
                  endif;
                  ?>
                </tbody>
              </table>
            </div>
          </div>

          <div class="row d-flex justify-content-center">
            <div class="col-sm-12 col-md-7">
              <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                <ul class="pagination justify-content-center">

                  <li class="paginate_button page-item previous <?= ($active_page - 1 < 1) ? "d-none" : false; ?>">
                    <a href="<?= $active_page - 1; ?>" class="page-link">Previous</a>
                  </li>

                  <?php
                  for ($i = 0; $i < $amount_page; $i++) :
                  ?>
                    <li class="paginate_button page-item <?= ($active_page == $i + 1) ? "active" : false; ?>">
                      <a href="<?= $i + 1; ?>" class="page-link"><?= $i + 1; ?></a>
                    </li>
                  <?php endfor; ?>

                  <li class="paginate_button page-item next <?= ($active_page + 1 > $amount_page) ? "d-none" : false; ?>">
                    <a href="<?= $active_page + 1; ?>" class="page-link">Next</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>


        </div>
      </div>

    </div>

  </div>

  </div>