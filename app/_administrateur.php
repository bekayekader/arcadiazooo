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
                  <button class="nav-link active" id="comptes-tab" data-bs-toggle="tab" data-bs-target="#comptes"
                    type="button" role="tab" aria-controls="comptes" aria-selected="true">Comptes</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="horaires-tab" data-bs-toggle="tab" data-bs-target="#horaires"
                    type="button" role="tab" aria-controls="horaires" aria-selected="false">Horaires</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="services-tab" data-bs-toggle="tab" data-bs-target="#services"
                    type="button" role="tab" aria-controls="services" aria-selected="false">Services</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="habitats-tab" data-bs-toggle="tab" data-bs-target="#habitats"
                    type="button" role="tab" aria-controls="habitats" aria-selected="false">Habitats</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="animaux-tab" data-bs-toggle="tab" data-bs-target="#animaux" type="button"
                    role="tab" aria-controls="animaux" aria-selected="false">Animaux</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="myTabContent">
                <div class="tab-pane fade show active" id="comptes" role="tabpanel" aria-labelledby="comptes-tab">
                  <div class="bar-btn">
                    <button class="btn btn-primary" id="ajout-compte">Ajouter un compte <i
                        class="fa fa-plus"></i></button>
                  </div>
                  <div id="tabulator-comptes"></div>
                </div>
                <div class="tab-pane fade" id="horaires" role="tabpanel" aria-labelledby="horaires-tab">
                  <div class="bar-btn">

                  </div>
                  <div id="tabulator-horaires"></div>
                </div>
                <div class="tab-pane fade" id="services" role="tabpanel" aria-labelledby="services-tab">
                  <div class="bar-btn">
                    <button class="btn btn-primary" id="ajout-service">Ajouter un service <i
                        class="fa fa-plus"></i></button>
                  </div>
                  <div id="tabulator-services"></div>
                </div>
                <div class="tab-pane fade" id="habitats" role="tabpanel" aria-labelledby="habitats-tab">
                  <div class="bar-btn">
                    <button class="btn btn-primary" id="ajout-habitat">Ajouter un habitat <i
                        class="fa fa-plus"></i></button>
                  </div>
                  <div id="tabulator-habitats"></div>
                </div>
                <div class="tab-pane fade" id="animaux" role="tabpanel" aria-labelledby="animaux-tab">
                  <div class="bar-btn">
                    <button class="btn btn-primary" id="ajout-animal">Ajouter un animal <i
                        class="fa fa-plus"></i></button>
                  </div>
                  <div id="tabulator-animaux"></div>
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

  <div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"> </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="" id="modal-body">
            ...
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>

        </div>
      </div>
    </div>
  </div>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    var tableElts = {
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
    }
  </script>
  <script>
    var tabulatorComptes = new Tabulator(`#tabulator-comptes`, {
      columns: [
        {
          "title": "Email",
          "field": "email",
        },
        {
          "title": "Role",
          "field": "role",
        },
        {
          "title": " ",
          "field": "id",
          "formatter": (cell) => {
            if (cell)
              if (cell.getValue())
                return `
          <button class="btn btn-warning" onclick="modifier('users', ${cell.getValue()})">Modifier</button>
          <button class="btn btn-danger" onclick="supprimer('users', ${cell.getValue()})">Supprimer</button>
            `
          }
        }
      ],
      ...tableElts
    });
    var tabulatorHoraires = new Tabulator(`#tabulator-horaires`, {
      columns: [
        {
          "title": "Ouverture",
          "field": "ouverture",
        },
        {
          "title": "Fermeture",
          "field": "fermeture",
        },
        {
          "title": " ",
          "field": "id",
          "formatter": () => `<button class="btn btn-warning">Modifier</button>`

        }
      ],
      ...tableElts
    });
    var tabulatorServices = new Tabulator(`#tabulator-services`, {
      columns: [
        {
          "title": "Nom",
          "field": "nom",
        },
        {
          "title": "Description",
          "field": "description",
        },
        {
          "title": "Icone",
          "field": "icone",
        },
        {
          "title": " ",
          "field": "id",
          "formatter": (cell) => {
            if (cell)
              if (cell.getValue())
                return `
          <button class="btn btn-warning" onclick="modifier('services', ${cell.getValue()})">Modifier</button>
          <button class="btn btn-danger" onclick="supprimer('services', ${cell.getValue()})">Supprimer</button>
            `
          }
        }
      ],
      ...tableElts
    });
    var tabulatorHabitats = new Tabulator(`#tabulator-habitats`, {
      columns: [
        {
          "title": "Nom",
          "field": "nom",
        },
        {
          "title": "Description",
          "field": "description",
        },
        {
          "title": "Image",
          "field": "image",
        },
        {
          "title": " ",
          "field": "id",
          "formatter": (cell) => {
            if (cell)
              if (cell.getValue())
                return `
          <button class="btn btn-warning" onclick="modifier('habitats', ${cell.getValue()})">Modifier</button>
          <button class="btn btn-danger" onclick="supprimer('habitats', ${cell.getValue()})">Supprimer</button>
            `
          }
        }
      ],
      ...tableElts
    });
    var tabulatorAnimaux = new Tabulator(`#tabulator-animaux`, {
      columns: [
        {
          "title": "Prénom",
          "field": "prenom",
        },
        {
          "title": "Race",
          "field": "race",
        },
        {
          "title": "Image",
          "field": "image",
        },
        {
          "title": "Habitat",
          "field": "nom",
        },
        {
          "title": " ",
          "field": "id",
          "formatter": (cell) => {
            if (cell)
              if (cell.getValue())
                return `
          <button class="btn btn-warning" onclick="modifier('animaux', ${cell.getValue()})"> Modifier</button>
          <button class="btn btn-danger" onclick="supprimer('animaux', ${cell.getValue()})">Supprimer</button>
            `
          }
        }
      ],
      ...tableElts
    });
  </script>
  <script>
    initMenu()
    const reafficher = (type, table) => {
      // mettre le tableau à jour
      asyncPost(type + "/get")
        .then(reponse => {
          if (reponse.result) {
            table.setData(reponse.data)
          }
        })
    }
  </script>
  <script>
    const toutCharger = () => {
      reafficher("users", tabulatorComptes)
      reafficher("horaires", tabulatorHoraires)
      reafficher("services", tabulatorServices)
      reafficher("habitats", tabulatorHabitats)
      reafficher("animaux", tabulatorAnimaux)
    }
    $(document).ready(() => {
      toutCharger()
    })
  </script>

  <script>
    var linkToGo = "",
      apiToGo = "",
      formulaireToGo = null,
      tabulatorToGo = null,
      tabulatorToGoAll = null

    var formulaireCompte = {
      link: "users/add",
      edit: "users/edit",
      api: "users",
      form: [{ type: "email", nom: "email", }, { type: "select", nom: "role", data: [] }, , { type: "hidden", nom: "id" }]
    }
    var formulaireServices = {
      link: "services/add",
      edit: "services/edit",
      api: "services",
      form: [{ type: "text", nom: "nom", }, { type: "text", nom: "description", }, { type: "text", nom: "icone", }, , { type: "hidden", nom: "id" }]
    }
    var formulaireHabitat = {
      link: "habitats/add",
      edit: "habitats/edit",
      api: "habitats",
      form: [{ type: "text", nom: "nom", }, { type: "text", nom: "description", }, { type: "file", nom: "image", }, , { type: "hidden", nom: "id" }]
    }
    var formulaireAnimal = {
      link: "animaux/add",
      edit: "animaux/edit",
      api: "animaux",
      form: [{ type: "text", nom: "prenom", }, { type: "text", nom: "race", }, { type: "file", nom: "image", }, { type: "select", nom: "habitat", data: [] }, { type: "hidden", nom: "id" }]
    }
    asyncPost("roles/get")
      .then(reponse => {
        if (reponse.result) formulaireCompte.form[1].data = reponse.data
      })
    asyncPost("habitats/get")
      .then(reponse => {
        if (reponse.result) formulaireAnimal.form[3].data = reponse.data
      })
  </script>
  <script>
    $("#ajout-compte").click(() => {
      linkToGo = formulaireCompte.link
      apiToGo = formulaireCompte.api
      tabulatorToGo = tabulatorComptes
      formulaireToGo = formulaireCompte.form
      formulaireToGoAll = formulaireCompte
      afficherModal()
    })
    $("#ajout-service").click(() => {
      linkToGo = formulaireServices.link
      apiToGo = formulaireServices.api
      tabulatorToGo = tabulatorServices
      formulaireToGo = formulaireServices.form
      formulaireToGoAll = formulaireServices
      afficherModal()
    })
    $("#ajout-habitat").click(() => {
      linkToGo = formulaireHabitat.link
      apiToGo = formulaireHabitat.api
      tabulatorToGo = tabulatorHabitats
      formulaireToGo = formulaireHabitat.form
      formulaireToGoAll = formulaireHabitat
      afficherModal()
    })
    $("#ajout-animal").click(() => {
      linkToGo = formulaireAnimal.link
      apiToGo = formulaireAnimal.api
      tabulatorToGo = tabulatorAnimaux
      formulaireToGo = formulaireAnimal.form
      formulaireToGoAll = formulaireAnimal
      afficherModal()
    })
  </script>

  <script>
    const afficherModal = () => {
      $("#modal-body").html("")
      $("#basicModal").modal("show");
      formulaireToGo.map(input => {
        if (input.type != "select") {

          if (input.type == "hidden") {
            $("#modal-body").append(`
              <div class="row mb-3">
                <div class="col-sm-10">
                  <input required="" id="ff_${input.nom}" type="hidden">
                </div>
              </div>
                `)
          } else {
            $("#modal-body").append(`
              <div class="row mb-3">
                <label for="ff_${input.nom}" class="col-sm-2 col-form-label">${input.nom}</label>
                <div class="col-sm-10">
                  <input required="" id="ff_${input.nom}" type="${input.type}" class="form-control" placeholder="${input.nom}">
                </div>
              </div>
                `)
          }
        }
        else {

          let selects = ""
          input.data.map(select => {
            selects = `${selects} <option value="${select.id}">${select.nom}</option>`
          })
          $("#modal-body").append(`
      <div class="row mb-3">
        <label for="ff_${input.nom}" class="col-sm-2 col-form-label">${input.nom}</label>
        <div class="col-sm-10">
          <select required="" id="ff_${input.nom}" class="form-select" aria-label="${input.nom}">
            <option ></option>
            ${selects}
          </select>
        </div>
      </div>
        `)

        }

      })
      $("#modal-body").append(`<button class="btn btn-primary">Enregistrer</button>`)
    }
    $("#modal-body").submit((e) => {
      e.preventDefault()
      let array = []
      formulaireToGo.map(input => {
        if (input.type == "file") {
          array.push({ key: input.nom, value: $("#ff_" + input.nom).prop('files')[0] })
          console.log($("#ff_" + input.nom).prop('files')[0])
        } else
          array.push({ key: input.nom, value: $("#ff_" + input.nom).val() })
      })
      axx(linkToGo, array)
        .then(reponse => {
          if (reponse.result) {

            notifyMy(reponse.infos, "green")
            reafficher(apiToGo, tabulatorToGo)
            $("#basicModal").modal("hide");
          }
        })
    })

    const modifier = (type, id) => {
      if (type == "users")
        $("#ajout-compte").click()
      if (type == "services")
        $("#ajout-service").click()
      if (type == "habitats")
        $("#ajout-habitat").click()
      if (type == "animaux")
        $("#ajout-animal").click()

      linkToGo = formulaireToGoAll.edit
      axx(`${type}/unique`, [{ key: "main", value: id }])
        .then(reponse => {
          if (reponse.result) {
            Object.keys(reponse.data).map(unite => {
              $("#ff_" + unite).val(reponse.data[unite])
            })
          }
          // reponse.result && toutCharger()
        })
      // afficherModal()
    }
    const supprimer = (type, id) => {
      if (confirm("Confirmer la suppression??"))
        axx(`${type}/delete`, [{ key: "elt", value: id }])
          .then(reponse => {
            reponse.result && toutCharger()
          })
    }
  </script>

</body>

</html>