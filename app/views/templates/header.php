<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['title']; ?></title>

  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/bootstrap.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="overflow-x-hidden">

  <section class="row">

    <section class="col-1 p-0">
      <section id="sidebar">
        <div class="d-flex flex-column flex-shrink-0 bg-light position-fixed" style="height: 100vh; width: 120px;">
          <a href="<?= BASE_URL; ?>" class="d-block p-3 link-dark text-decoration-none text-center" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
            <span class="text-capitalize fw-bold">Ecom</span>
          </a>
          <ul class="nav nav-pills nav-flush flex-column mb-auto text-center fs-3 ">
            <li class="nav-item">
              <a href="<?= BASE_URL; ?>" class="nav-link active py-3 border-bottom">
                <i class="bi bi-house-door-fill"></i>
              </a>
            </li>
            <li>
              <a href="<?= BASE_URL; ?>admin" class="nav-link py-3 border-bottom">
                <i class="bi bi-box-seam-fill"></i>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link py-3 border-bottom">
                <i class="bi bi-tags"></i>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link py-3 border-bottom">
                <i class="bi bi-list-check"></i>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link py-3 border-bottom">
                <i class="bi bi-door-open"></i>
              </a>
            </li>
          </ul>
        </div>
      </section>
    </section>





    <section class="col-10 px-0">
      <section id="main" class="ms-4" style="width: 100vw;">