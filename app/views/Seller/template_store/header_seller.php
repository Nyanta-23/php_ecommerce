<?php

$selectedUrl = strtolower(explode("/", $_GET["url"])[0]);

?>

<section class="d-flex">


  <section >
    <div class="d-flex flex-column flex-shrink-0 bg-light rounded-1 py-5" style="width: 6rem; margin-left: -1rem;">
      <a href="<?= BASE_URL; ?>/Seller" class=" d-block ps-4 pb-4 link-dark text-decoration-none text-center">
        <img src="<?= BASE_URL; ?>/images/static/default-image-user.png" class="card-img-top w-75 rounded-5" alt="">
      </a>
      <ul class="nav nav-pills nav-flush flex-column mb-auto text-center ps-4">
        <li class="nav-item">
          <a href="<?= BASE_URL; ?>/Seller" class="nav-link py-3  <?= $selectedUrl == "seller" ? "active" : ""; ?>" data-tooltip="dashboard" data-bs-toggle="tooltip" data-bs-placement="right" data-bstitle="Dashboard">
            <i class="bi bi-speedometer2 fs-2"></i>
          </a>
        </li>
        <li>
          <a href="<?= BASE_URL; ?>/Orders" class="nav-link py-3  <?= $selectedUrl == "orders" ? "active" : ""; ?>" data-tooltip="orders" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Orders">
            <i class="bi bi-basket fs-2"></i>
          </a>
        </li>
        <li>
          <a href="<?= BASE_URL ?>/Products" class="nav-link py-3  <?= $selectedUrl == "products" ? "active" : ""; ?>" data-tooltip="products" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Products">
            <i class="bi bi-box-seam-fill fs-2"></i>
          </a>
        </li>

      </ul>
    </div>
  </section>

  <section class="mt-3 col-11">