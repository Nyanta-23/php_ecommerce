<section class="container-fluid my-5">

  <div class="row d-flex justify-content-center">
    <div class="col-5 text-center align-self-center">
      <i class="bi bi-shop" style="font-size: 180px;"></i>
      <p class="fs-3 fw-bold">Dapatkan profit dari hasil jualan toko kamu menggunakan fitur kami!</p>
    </div>
    <div class="col-5">
      <form action="<?= BASE_URL; ?>/Seller/beseller" method="post">
        <input type="hidden" name="id">
        <input type="hidden" value="<?= $data["be_seller"]["user_id"]; ?>" name="user_id">
        <div class="mb-3">
          <label for="telephone" class="form-label">Masukan No Telepon</label>
          <input id="telephone" class="form-control" type="number" value="<?= $data["be_seller"]["telephone"]; ?>" name="telephone" readonly style="background-color: #e9ecef;">
        </div>
        <div class="mb-3">
          <label for="storeName" class="form-label">Masukkan Nama Toko</label>
          <input type="text" class="form-control" id="storeName" placeholder="Store Name" name="store_name" required/>
        </div>
        <div class="mb-3">
          <div class="mb-3">
            <label for="province" class="form-label">Masukkan Provinsi</label>
            <input type="text" class="form-control" id="province" placeholder="Seller Province" name="province" required />
          </div>
          <div class="mb-3">
            <label for="city_or_regency" class="form-label">Masukkan Kota/Kabupaten</label>
            <input type="text" class="form-control" id="city_or_regency" placeholder="Seller City/Regency" name="city_or_regency" required/>
          </div>
          <div class="mb-3">
            <label for="post_code" class="form-label">Masukan Kode Pos</label>
            <input type="number" class="form-control" id="post_code" placeholder="Seller Post Code" name="post_code" required/>
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Masukkan Alamat Toko</label>
            <textarea  class="form-control" id="address" placeholder="Seller Address" name="address" required></textarea>
          </div>
        </div>

        <button type="submit" class="btn btn-primary w-100">Konfirmasi</button>
        <?= Flasher::authMessage("seller_error") ?>
      </form>
    </div>
  </div>

</section>
<?= Flasher::alertSeller("seller_success"); ?>