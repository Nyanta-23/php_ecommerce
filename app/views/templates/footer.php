</main>
</section>

<section id="footer">
  <footer class="align-items-center py-3  border-top w-100 <?= $_GET == null ? "my-4" : (strtolower(explode("/", $_GET["url"])[0]) == "seller" ? "my-0" : false); ?>">
    <div class="container">
      <p class="mb-0 text-muted text-center">© 2024 All right reserved by Nyanta</p>
    </div>
  </footer>
</section>


<script src="<?= BASE_URL; ?>/js/jquery.js"></script>
<script src="<?= BASE_URL; ?>/js/popper.min.js"></script>
<script src="<?= BASE_URL; ?>/js/bootstrap.js"></script>
<script src="<?= BASE_URL; ?>/js/script.js"></script>


</body>

</html>