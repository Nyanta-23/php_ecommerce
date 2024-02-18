<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>

  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/bootstrap.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">



  <main class="form-signin w-50 mt-5 m-auto">
    <form method="post" action="<?= BASE_URL; ?>Admin/SignUp" id="signup">

      <h1>Welcome!</h1>
      <h1 class="h3 mb-3 fw-normal">Please Sign Up, for adding your product</h1>

      <div class="from-floating input-group my-1">

        <input type="hidden" name="id" id="id" />

        <div class="form-floating">
          <input type="text" class="form-control rounded-start-2 " id="firstName" placeholder="Jhon" name="firstName" required />
          <label for="firstName">First Name:</label>
        </div>
        <div class="form-floating">
          <input type="text" class="form-control" id="Last Name" placeholder="Doe" name="lastName" />
          <label for="Last Name">Last Name:</label>
        </div>
      </div>

      <div class="form-floating my-1">
        <input type="text" class="form-control" id="Username" placeholder="JhonDoe12" name="username" required />
        <label for="Username">Username:</label>
      </div>

      <div class="form-floating my-1">
        <input type="email" class="form-control" id="Email" placeholder="name@example.com" name="email" required />
        <label for="Email">Email address:</label>
      </div>

      <div class="form-floating my-1">
        <input type="password" class="form-control" id="password" placeholder="Password" name="password" autocomplete="on" required />
        <label for="password">Password:</label>
      </div>

      <div class="form-floating my-1">
        <input type="password" class="form-control" id="confirmPassword" placeholder="ConfirmPassword" name="confirmPassword" autocomplete="on" required />
        <label for="confirmPassword">Confirm Password:</label>
      </div>

      <?php Flasher::authMessage("account_error") ?>

      <button id="submit" type="submit" class="btn btn-primary w-100 py-2 mt-4">Sign Up</button>

      <div class="text-center mt-3">
        <span>If you have account go to <a href="<?= BASE_URL; ?>Admin/SignIn">SignIn</a></span>
      </div>

      <p class="mt-5 mb-3 text-body-secondary">© All right reserved by Nyanta</p>
    </form>
  </main>

  <?= Flasher::alert("account_created"); ?>

  <script src="<?= BASE_URL; ?>js/jquery.js"></script>
  <script src="<?= BASE_URL; ?>js/bootstrap.js"></script>
  <script>
    $("#Username").on("input", function(e) {
      e.target.value = e.target.value.toLowerCase();
    });

    const getPost = '<?= $_SERVER['REQUEST_METHOD'] == 'POST'; ?>' ? true : false;
    const baseUrl = '<?= BASE_URL; ?>';

    const modal = new bootstrap.Modal($("#modal"));

    $(function() {
      modal.show();

      $("#modal .blue-btn").on("click", function() {
        window.location.href = `${baseUrl}Admin/SignIn`;
      });

      $("#modal .btn-close").on("click", function() {
        modal.hide();
      });
    });
  </script>
</body>

</html>