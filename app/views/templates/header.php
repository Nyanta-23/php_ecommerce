<?php

$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$split_link = explode("/", $actual_link)[5];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>P-Shop | <?= empty($data['title']) ? "" : $data['title']; ?></title>

  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/bootstrap.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

  <nav class="navbar navbar-expand-lg bg-primary px-5">
    <div class="container-fluid">
      <a class="navbar-brand fs-3 text-white" href="#">Preprocessor Shop</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavDropdown">
        <ul class="d-flex navbar-nav">
          <li class="border-end border-1 me-2 px-3">
            <button class="btn text-white fs-3 px-4">
              <i class="bi bi-cart4"></i>
            </button>
          </li>
          <li class="d-flex gap-2 align-self-center h-100 ms-2">
            <a href="<?= BASE_URL; ?>/User/SignIn" type="button" class="btn btn-outline-light fw-bold btn-md px-4">Masuk</a>
            <a href="<?= BASE_URL; ?>/User/SignUp" type="button" class="btn btn-light btn-md px-4 text-primary fw-bold">Daftar</a>
          </li>
        </ul>
        <!-- <ul class="navbar-nav">
          <li class="nav-item">
            <a class="text-white nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="text-white nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown link
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul> -->
      </div>

    </div>
  </nav>

  <!-- <section>
    <div class="px-4 py-5 mt-4 mb-5 text-center border mx-5 shadow rounded-3">
      <h1 class="display-5 fw-bold text-body-emphasis">Preprocessor Shop</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">P-Shop is just web eccommerce, this just for training skill code php. I hope this application can help to be able to get a bright future for this maker.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
          <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
        </div>
      </div>
    </div>
  </section> -->


  <section>
    <section id="main" class="ms-4">