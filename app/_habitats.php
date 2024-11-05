<!DOCTYPE html>
<html lang="fr">
<?php
include $P_header;
include $P_script;
?>

<body class="blog-page">
  <?php
  include $P_tete;
  ?>

  <main class="main">
    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">

            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="home">Accueil</a></li>
            <li class="current">Habitats</li>
          </ol>
        </div>
      </nav>
    </div>
    <!-- End Page Title -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">
      <div class="container">
        <div class="row gy-4" id="listeHabitats">

        </div>
      </div>
    </section>
    <!-- /Blog Posts Section -->
  </main>
  <?php
  include $P_pied;
  ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    $(document).ready(() => {
      asyncPost('habitats/get', [], "vSubmit", false, false)
        .then(reponse => {
          reponse.data.map(habitat => {
            $("#listeHabitats").append(`<div class="col-lg-4">
            <article>
              <div class="post-img">
                <img src="assets/img/habitats/${habitat.image}" alt="" class="img-fluid" />
              </div>

              <p class="post-category">Habitat</p>

              <h2 class="title">
                <a href="habitat-detail/${habitat.slug}">${habitat.nom}</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="assets/img/pattes.jpg" alt="" class="img-fluid post-author-img flex-shrink-0" />
                <div class="post-meta">
                  <p class="post-author">Animaux présents</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">${habitat.animaux.length}</time>
                  </p>
                </div>
              </div>
            </article>
          </div>`)
          })
        })
    })
  </script>
</body>

</html>