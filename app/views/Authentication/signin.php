<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>

  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/bootstrap.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

  <main class="form-signin w-50 mt-5 m-auto">
    <form action="<?= BASE_URL; ?>Admin/SignIn" method="post">
      <h1>Welcome Back!</h1>
      <h1 class="h3 mb-3 fw-normal">Please sign in, for continue to the eccomerce</h1>

      <div class="form-floating">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput">Email Address</label>
      </div>

      <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" autocomplete="on" name="password">
        <label for="floatingPassword">Password</label>
      </div>

      <div class="row">
        <div class="col mt-3">
          <?php Flasher::authMessage("error_input") ?>
        </div>
      </div>

      <div class="form-check text-start my-3">
        <input class="form-check-input" type="checkbox" value="remember-me" name="remember" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
          Remember me
        </label>
      </div>
      <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
      <div class="text-center mt-3">
        <span>Dont have account? <a href="<?= BASE_URL; ?>Admin/SignUp">SignUp</a></span>
      </div>

      <p class="mt-5 mb-3 text-body-secondary">© All right reserved by Nyanta</p>
    </form>
  </main>


  <script src="<?= BASE_URL; ?>js/jquery.js"></script>
  <script src="<?= BASE_URL; ?>js/bootstrap.js"></script>
</body>

</html>