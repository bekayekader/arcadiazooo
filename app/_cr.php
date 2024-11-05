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
  <style>
    .bar-btn {
      margin: 22px;
    }
  </style>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Administration</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="home">Accueil</a></li>
          <li class="breadcrumb-item active">Gestion</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">


              <div class="" id="attente" role="tabpanel" aria-labelledby="attente-tab">
                <div class="bar-btn">

                </div>
                <div id="tabulator"></div>
              </div>




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

  <script>
    var columns = [
      {
        "title": "Date",
        "field": "date_passage",
        formatter: (cell) => cell && moment(cell.getValue()).format("DD MMMM YYYY HH:mm")
      },
      {
        "title": "Animal",
        "field": "prenom",
        headerFilter: "true",
      },
      {
        "title": "Vétérinaire",
        "field": "email",
        headerFilter: "true",
      },
      {
        "title": "Nourriture",
        "field": "nourriture",
        headerFilter: "true",
      },
      {
        "title": " ",
        "field": "etat",
        "width": "5",
        headerFilter: "true",
        formatter: (cell) => cell && cell.getValue() && "✅"
      },
      {
        "title": "Grammage",
        "field": "grammage",
        headerFilter: "true",
      },
      {
        "title": "Commentaire",
        "field": "details",
        headerFilter: "true",
      },

    ]

    var tabulator = new Tabulator(`#tabulator`, {
      columns: columns,
      data: [],
      columnDefaults: {
        tooltip: true, //show tool tips on cells
      },
      pagination: "local", //paginate the data
      paginationSize: 10, //allow 10 rows per page of data
      paginationCounter: "rows", //display count of paginated rows in footer
      paginationSizeSelector: [10, 20, 30, 50],
      movableColumns: true,
      layout: "fitColumns",
      data: []
    })
  </script>

  <script>
    const remplirTableaux = () => {
      asyncPost("cr/get")
        .then(reponse => {
          tabulator.setData(reponse.data)
        })
    }



    $(document).ready(() => {
      remplirTableaux()
    })
  </script>

</body>

</html>