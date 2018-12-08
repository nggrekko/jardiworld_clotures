<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3 sticky-top">
  <div class="container">
  
    <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">

      <ul class="navbar-nav mr-auto">

        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>">Accueil</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="<?php echo URLROOT; ?>/products/catalogue">Catalogue</a>
        </li>

      </ul>
      
      <ul class="navbar-nav ml-auto">

        <?php if(isset($_SESSION['user_id'])) : ?>

          <li class="nav-item">
            <a class="nav-link" href="#"><?php echo $_SESSION['user_name']; ?></a>
          </li>

          <li class="nav-item">
            <a class="mt-1 btn btn-success btn-sm " href="<?php echo URLROOT; ?>/basket/index">
              <i class="fa fa-shopping-cart"></i> Panier
              <span class="badge badge-light">
                <?php echo count($_SESSION['basket']) ?>
              </span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/logout">Se déconnecter</a>
          </li>

        <?php else : ?>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/register">S'enregistrer</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo URLROOT; ?>/users/login">Se connecter</a>
          </li>

        <?php endif; ?>

      </ul>
    </div>
  </div>
</nav>