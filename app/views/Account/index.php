<?php

$user = $data["user"];

?>

<section class="container-fluid my-5 px-5">
  <div class="row">
    <div class="col-6 text-center d-flex justify-content-center">
      <div class="my-1" style="width: 30vw;">
        <div class="card">
          <img src="<?= BASE_URL; ?>/images/static/default-image-user.png" class="card-img-top w-75 align-self-center mt-2" alt="...">
          <div class="card-body text-center">
            <a href="#" class="btn btn-primary">Pilih Foto</a>
            <div class="card-body">
              <p class="card-text">Besar file: maksimum 10.000.000 bytes (10 Megabytes). Ekstensi file yang diperbolehkan: .JPG .JPEG .PNG</p>
            </div>
          </div>
        </div>
        <div class="mt-3">
          <a href="#" class="btn btn-primary w-100">Ubah Password</a>
        </div>
      </div>
    </div>
    <div class="col-6">
      <div class="mx-2">
        <h4 class="fs-4">Biodata Diri</h4>
        <table class="table table-borderless w-75">
          <tr>
            <th>Nama</th>
            <td><?= $user["first_name"] . " " . $user["last_name"]; ?></td>
            <td>
              <a href="#" class="btn btn-primary">Ubah</a>
            </td>
          </tr>
          <tr>
            <th>Tanggal Lahir</th>
            <td><?= $user["birthdate"]; ?></td>
            <td>
              <a href="#" class="btn btn-primary">Ubah</a>
            </td>
          </tr>
          <tr>
            <th>Jenis Kelamin</th>
            <td class="text-capitalize"><?= $user["gender"]; ?></td>
            <td>
              <a href="#" class="btn btn-primary">Ubah</a>
            </td>
          </tr>
        </table>
      </div>
      <div class="mx-2">
        <h4 class="fs-4">Kontak</h4>
        <table class="table table-borderless w-75">
          <tr>
            <th>Email</th>
            <td><?= $user["email"]; ?></td>
            <td>
              <a href="#" class="btn btn-primary">Ubah</a>
            </td>
          </tr>
          <tr>
            <th>Nomor Hp</th>
            <td><?= $user["telephone"]; ?></td>
            <td>
              <a href="#" class="btn btn-primary">Ubah</a>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</section>