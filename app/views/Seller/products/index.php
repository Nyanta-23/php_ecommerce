<?php
$i = 1;
$pathImg = BASE_URL . "/images/dynamic/img_products/";
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
                  if ($data["products"] > 0) :
                    foreach ($data["products"] as $data) : ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $data["name_product"]; ?></td>
                        <td><?= $data["quantity"]; ?></td>
                        <td><?= $data["price"]; ?></td>
                        <td><?= $data["name_category"]; ?></td>
                        <td style="width: 300px;"><?= $data["description"]; ?></td>
                        <td class="text-center"><img width="250px" src="<?= $pathImg; ?><?= $data["product_img"]; ?>" alt="<?= $data["name_product"]; ?>.<?= $data["product_img"]; ?>"></td>
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

          <div class="row">
            <div class="col-sm-12 col-md-5">
              <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
            </div>
            <div class="col-sm-12 col-md-7">
              <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                <ul class="pagination">
                  <li class="paginate_button page-item previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                  <li class="paginate_button page-item active">
                    <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                  </li>
                  <li class="paginate_button page-item ">
                    <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                  </li>
                  <li class="paginate_button page-item ">
                    <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                  </li>
                  <li class="paginate_button page-item ">
                    <a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                  </li>
                  <li class="paginate_button page-item ">
                    <a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                  </li>
                  <li class="paginate_button page-item ">
                    <a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                  </li>
                  <li class="paginate_button page-item next" id="example2_next">
                    <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
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