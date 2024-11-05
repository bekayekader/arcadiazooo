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
            <li><a href="habitats">Habitats</a></li>
            <li class="current" id="hcurrent">Habitats</li>
          </ol>
        </div>
      </nav>
    </div>
    <!-- End Page Title -->

    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section">
            <div class="container">
              <article class="article">
                <h2 class="title" id="nom-habitat">
                  Dolorum
                </h2>

                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center">
                      <i class="bi bi-browser-firefox"></i>
                      <a href="">Animaux: <span id="nbrAn"></span></a>
                    </li>

                  </ul>
                </div>
                <!-- End meta top -->

                <div class="content">
                  <p id="decription-habitat">
                  </p>


                  <span id="img-habitat">
                    <img src="assets/img/blog/blog-inside-post.jpg" class="img-fluid" alt="" />
                  </span>
                  <h3>
                    Animaux
                  </h3>

                </div>
                <!-- End post content -->

                <div class="container">
                  <div class="row gy-5" id="listeAnimaux">

                  </div>

                </div>
          </section>
          </article>
        </div>
        </section>
        <!-- /Blog Details Section -->


      </div>
    </div>
    </div>
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
      asyncPost("habitats/info", [{ key: "main", value: slug }], "vSubmit", false, false)
        .then(reponse => {
          if (reponse.result) {
            $('#decription-habitat').html(reponse.data.description)
            $('#nom-habitat').html(reponse.data.nom)
            $('#hcurrent').html(reponse.data.nom)
            $('#nbrAn').html(toNum(reponse.data.animaux.length))
            $('#img-habitat').html(`<img style="object-fit:cover;width:100%;height:550px" src="assets/img/habitats/${reponse.data.image}" class="img-fluid" alt="" />`)
            reponse.data.animaux.map(animal => {
              $("#listeAnimaux").append(`
               <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100" onclick="goToAnimal('${animal.slug}')">
                      <div class="member-img">
                        <img src="assets/img/animaux/${animal.id}/${animal.image}" class="img-fluid" style="object-fit:cover;width:100%;height:150px" alt="" />
                        <div class="social" key="savane"></div>
                      </div>
                      <div class="member-info text-center">
                        <h4>${animal.prenom}</h4>
                        <p>
                           ${animal.race}
                        </p>
                      </div>
                    </div>
              `)
            })
          } else {
            window.location.replace('error')
          }
        })
    })
    const goToAnimal = (slug) => {
      window.location.href = "animal/" + slug
    }
  </script>
</body>

</html>