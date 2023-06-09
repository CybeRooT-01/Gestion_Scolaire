<?php if(isset($_SESSION['erreur'])): ?>
    <div class="alert alert-danger">
        <?php echo $_SESSION['erreur']; unset($_SESSION['erreur']) ?>
    </div>
<?php endif; ?>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image" draggable="false">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <h4>Bienvenu sur la page de connexion</h4>
        <form  method="POST">
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Address Email</label>
            <input type="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Entrez un Email valide" name="email"/>
          </div>
          <div class="form-outline mb-3">
          <label class="form-label" for="form3Example4">Mot de passe</label>
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Entrer un votre mot de passe" name="password" />
          </div>
          <input type="submit" class="bg-primary 500 text-white rounded-md px-2 py-1 mt-3"value="Connexion">
        </form>
      </div>
        <div class="text-center">
          <p>Vous n'avez pas de compte ? <a href="/inscription">Inscrivez-vous</a></p>
      </div>
    </div>
  </div>
</section>