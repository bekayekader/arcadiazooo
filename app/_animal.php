<!DOCTYPE html>
<html lang="fr">

<?php
include $P_header;
include $P_script;
?>
<script>
  var href = window.location.href;
  var url_ = href.split("/")
  var slug = ""
  console.log(url_[5])
  if (!url_[5]) {
    window.location.replace("error")

  }
  slug = url_[5]
</script>

<body class="blog-details-page">

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
            <li><a id="hcurrentP" href="habitat-detail">Habitats</a></li>
            <li class="current" id="hcurrent">Animal</li>
          </ol>
        </div>
      </nav>
    </div>
    <!-- End Page Title -->


    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 id="nom_animal">...</h2>
        <p><b>Race: </b> <span id="race_animal"></span></p>
        <p><b>Habitat: </b> <span id="habitat_animal"></span></p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <!--
          <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-app">App</li>
            <li data-filter=".filter-product">Card</li>
            <li data-filter=".filter-branding">Web</li>
          </ul>   -->

          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200" id="listePhotos"></div>
          <!-- End Portfolio Container -->

        </div>

      </div>

    </section><!-- /Portfolio Section -->



  </main>

  <?php
  include $P_pied;
  ?>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <!-- <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script> -->
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    $(document).ready(() => {
      asyncPost("animaux/info", [{ key: "main", value: slug }], "vSubmit", false, false)
        .then(reponse => {
          if (reponse.result) {
            $('#hcurrentP').html(reponse.data.maison)
            $('#hcurrentP').attr('href', "habitat-detail/" + reponse.data.slug_maison)
            $('#hcurrent').html(reponse.data.prenom)
            $('#nom_animal').html(reponse.data.prenom)
            $('#race_animal').html(reponse.data.race)
            $('#habitat_animal').html(reponse.data.maison)
            reponse.data.images.map(image => {
              $("#listePhotos").append(`
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="assets/img/animaux/${reponse.data.id}/${image}" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>${reponse.data.prenom}</h4>
                <p>${reponse.data.race}</p>
                <a href="assets/img/animaux/${reponse.data.id}/${image}"
                  data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                
              </div>
            </div><!-- End Portfolio Item -->`)
            })

          } else {
            window.location.replace('error')
          }
        })
    })
  </script>

</body>

</html>