<!DOCTYPE html>
<html lang="fr">

<?php
include $P_header;
include $P_script;
?>
<script>
  verifConnected(true)

</script>

<body>
  <?php
  include $P_tete;
  include $P_leftSide;
  ?>



  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Accueil</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home">Accueil</a></li>
          <li class="breadcrumb-item active"> </li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title"> Bienvenue</h5>
              <p><?= $moi_meme['description'] ?></p>
            </div>
          </div>

        </div>


      </div>
    </section>

  </main><!-- End #main -->

  <?php
  include $P_pied;
  ?>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="assets/vendor/tinymce/tinymce.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    initMenu()
  </script>

</body>

</html>