<!DOCTYPE html>
<html lang="fr">

<?php
include $P_header;
include $P_script;
?>
<script>
  verifConnected(false)

</script>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href=" " class="logo d-flex align-items-center w-auto">

                  <span class="d-none d-lg-block"><?= $moi_meme['nom'] ?></span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Connexion à votre compte</h5>
                  </div>

                  <form class="row g-3 needs-validation" novalidate id="flogin">

                    <div class="col-12">
                      <label for="username" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" id="username" class="form-control" required>
                        <div class="invalid-feedback">Entrez votre username</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="userpassword" class="form-label">Mot de passe</label>
                      <input type="password" class="form-control" id="userpassword" required>
                      <div class="invalid-feedback">Entrez votre mot de passe!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="userstay">
                        <label class="form-check-label" for="userstay">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">

                    </div>
                  </form>

                </div>
              </div>

              <div class="credits">
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
    $("#flogin").submit((e) => {
      e.preventDefault()

      asyncPost("login/login", [
        { key: "user", value: $("#username").val() },
        { key: "password", value: $("#userpassword").val() },
        { key: "stay", value: $("#userstay").prop("checked") },
      ], "loginBtn")
        .then(reponse => {
          if (reponse.result) {
            notifyMy(reponse.infos, 'green')
            connectNow(reponse)
          }

        })

    })
  </script>

</body>

</html>