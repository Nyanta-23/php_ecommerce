<?php
$actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$split_link = explode("/", $actual_link)[5];

$username = $data ? ($data["user"] ? $data["user"] : false) : false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>P-Shop<?= empty($data['title']) ? "" : " | " . $data['title']; ?></title>

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

            <?= isset($_SESSION["user"]) ? "
            <button class='btn text-white fs-3 px-4'
                  data-tooltip='seller'
                  data-bs-toggle='tooltip' 
                  data-bs-placement='bottom'
                  data-bs-title='Ayo jual barangmu!'>
              <i class='bi bi-shop'></i>
            </button>"
              :
              "<button class='btn text-white fs-3 px-4' 
                  data-tooltip='buyer'
                  data-bs-toggle='tooltip' 
                  data-bs-placement='bottom'
                  data-bs-title='Ayo mulai belanja!'>
              <i class='bi bi-cart4'></i>
            </button>"; ?>
          </li>

          <?php
          if (empty($_SESSION["user"])) :
          ?>
            <li class="d-flex gap-2 align-self-center h-100 ms-2">
              <a href="<?= BASE_URL; ?>/User/SignIn" type="button" class="btn btn-outline-light fw-bold btn-md px-4">Masuk</a>
              <a href="<?= BASE_URL; ?>/User/SignUp" type="button" class="btn btn-light btn-md px-4 text-primary fw-bold">Daftar</a>
            </li>
          <?php
          endif;
          ?>
        </ul>

        <?php
        if (isset($_SESSION["user"])) :
        ?>
          <ul class="navbar-nav pe-2">
            <li class="nav-item dropdown">
              <a class="text-white nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?= $username; ?>
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= BASE_URL; ?>/Account">Akun</a></li>
                <li><a class="dropdown-item" href="#">Keranjang</a></li>
                <li>
                  <form action="<?= BASE_URL; ?>/User/ModalSignOut" method="post">
                    <input type="hidden" name="tosignout" />
                    <button type="submit" class="dropdown-item hover-header" href="#">Keluar</button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        <?php endif; ?>
      </div>

    </div>
  </nav>

  <?= Flasher::alert("logout"); ?>

  <section class="overflow-x-hidden">
    <section id="main" class="ms-4">