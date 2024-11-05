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

              <!-- Default Tabs -->
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="attente-tab" data-bs-toggle="tab" data-bs-target="#attente"
                    type="button" role="tab" aria-controls="attente" aria-selected="true">En attente de
                    validation</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="valid-tab" data-bs-toggle="tab" data-bs-target="#valid" type="button"
                    role="tab" aria-controls="valid" aria-selected="false">Validés</button>
                </li>


              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="attente" role="tabpanel" aria-labelledby="attente-tab">
                  <div class="bar-btn">

                  </div>
                  <div id="tabulator-attente"></div>
                </div>
                <div class="tab-pane fade" id="valid" role="tabpanel" aria-labelledby="valid-tab">
                  <div class="bar-btn">

                  </div>
                  <div id="tabulator-valid"></div>
                </div>

              </div><!-- End Default Tabs -->

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
        "field": "date_creation",
        formatter: (cell) => cell && moment(cell.getValue()).format("DD MMMM YYYY HH:mm")
      },
      {
        "title": "Pseudo",
        "field": "pseudo",
      },
      {
        "title": "Commentaire",
        "field": "commentaire",
      },

    ]

    var tabulatorValid = new Tabulator(`#tabulator-valid`, {
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
    var tabulatorAttente = new Tabulator(`#tabulator-attente`, {
      columns: columns.concat({
        "title": " ",
        "field": "id",
        "formatter": (cell) => {
          if (cell)
            if (cell.getValue())
              return `
  <button class="btn btn-warning" onclick="valider(${cell.getValue()})">Valider</button>
  <button class="btn btn-danger" onclick="refuser(${cell.getValue()})">Refuser</button>
  `
        }
      }),
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
      asyncPost("avis/get")
        .then(reponse => {
          tabulatorAttente.setData(reponse.data.attente)
          tabulatorValid.setData(reponse.data.valid)
        })
    }


    const valider = (id) => {
      if (confirm("Confirmer la validation??"))
        asyncPost(`avis/valider`, [{ key: "avis", value: id }])
          .then(reponse => {
            reponse.result && remplirTableaux()
          })
    }

    const refuser = (id) => {
      if (confirm("Confirmer la suppresion??"))
        asyncPost(`avis/refuser`, [{ key: "avis", value: id }])
          .then(reponse => {
            reponse.result && remplirTableaux()
          })
    }


    $(document).ready(() => {
      remplirTableaux()
    })
  </script>

</body>

</html>