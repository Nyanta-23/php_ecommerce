<?php

$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$split_link = explode("/", $actual_link)[5];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= empty($data['title']) ? "" : $data['title']; ?></title>

  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/bootstrap.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="overflow-x-hidden">

  <!-- Modal -->
  <form action="<?= BASE_URL; ?>Admin/SignOut" method="post">
    <input name="signout" value="true" hidden />
    <div class="modal fade" id="logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Sign Out</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <i class="bi bi-question-circle-fill text-warning" style="font-size: 5em;"></i>
            <h2>Are you want to SignOut?</h2>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary px-5" data-bs-dismiss="modal">No</button>
            <button type="submit" class="btn btn-primary px-5">Yes</button>
          </div>
        </div>
      </div>
    </div>
  </form>


  <section class="row">

    <section class="col-1 p-0">
      <section id="sidebar">
        <div class="d-flex flex-column flex-shrink-0 bg-light position-fixed" style="height: 100vh; width: 120px;">
          <a href="<?= BASE_URL; ?>" class="d-block p-3 link-dark text-decoration-none text-center" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
            <span class="text-capitalize fw-bold">Ecom</span>
          </a>
          <ul class="nav nav-pills nav-flush flex-column mb-auto text-center fs-3 ">

            <li class="nav-item">
              <a href="<?= BASE_URL; ?>" class="nav-link py-3 border-bottom <?= ($split_link == "" || $split_link == "Home" || $split_link == "home") ? "active" : ""; ?>">
                <i class="bi bi-house-door-fill"></i>
              </a>
            </li>
            <li>
              <!-- Products -->
              <a href="<?= BASE_URL; ?>products" class="nav-link py-3 border-bottom <?= ($split_link == "products") ? "active" : ""; ?>">
                <i class="bi bi-box-seam-fill"></i>
              </a>
            </li>
            <li>
              <!-- Category -->
              <a href="<?= BASE_URL; ?>categories" class="nav-link py-3 border-bottom <?= ($split_link == "categories") ? "active" : ""; ?>">
                <i class="bi bi-tags"></i>
              </a>
            </li>
            <li>
              <!-- Order & Completed Order -->
              <a href="<?= BASE_URL; ?>orders" class="nav-link py-3 border-bottom <?= ($split_link == "orders") ? "active" : ""; ?>">
                <i class="bi bi-list-check"></i>
              </a>
            </li>

            <li>
              <a type="button" class="nav-link py-3 border-bottom link-danger" data-bs-toggle="modal" data-bs-target="#logout">
                <i class="bi bi-door-open"></i>
              </a>
            </li>

          </ul>
        </div>
      </section>
    </section>




    <section class="col-10 px-0">
      <section id="main" class="ms-4" style="width: 100vw;">