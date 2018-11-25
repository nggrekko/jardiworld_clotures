<?php require APPROOT . '/views/inc/header.php'; ?>


<!-- Category dropdown -->
<div class="btn-group">
  <button class="btn btn-dark btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Sélectionner une catégorie
  </button>
  <div class="dropdown-menu">
    <?php foreach($data['categories'] as $category): ?>
      <a class="dropdown-item" href="<?php echo URLROOT; ?>/products/category/<?php echo $category->name ?>"> <?php echo $category->name ?></a>
    <?php endforeach ; ?>
  </div>
</div>

<!-- Search bar -->
<div class="row mb-4">
    <div class="col-12 col-md-10 col-lg-8">
        <form class="card card-sm" action="<?php echo URLROOT; ?>/products/search" method="post">
            <div class="card-body row no-gutters align-items-center py-2">
                <div class="col-auto">
                    <i class="fas fa-search h4 text-body"></i>
                </div>
                <!--end of col-->
                <div class="col">
                    <input class="form-control form-control-lg form-control-borderless border-0" name="search" type="search" placeholder="Rechercher un produit">
                </div>
                <!--end of col-->
                <div class="col-auto">
                    <button class="btn btn-lg btn-success" type="submit">Rechercher</button>
                </div>
                <!--end of col-->
            </div>
        </form>
    </div>
    <!--end of col-->
</div>


<!-- Carousel of sales -->
<h3>Les produits les plus vendus</h3>
<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators mb-0 pb-0 pt-1">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <!-- <li data-target="#demo" data-slide-to="2"></li> -->
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner no-padding my-3">
  
    <div class="carousel-item active">
      <?php for($i=0 ; $i <3 ; $i++): ?>
        <div class="col-xs-4 col-sm-4 col-md-4 mb-5">
          <a href="<?php echo URLROOT; ?>/products/show/<?php echo $data['sales'][$i]->productId; ?>" onclick=abc(this) class="slider_info">
            <img class="img-fluid card-img-top rounded" src="<?php echo ASSETSROOT . $data['sales'][$i]->img_big ?>" alt="Card image cap">
            <div class="card-img-overlay t_img">
              <span class="float-left text-light bg-dark px-1"><?php echo $data['sales'][$i]->productName ?></span>
            </div>
          </a>
        </div>
      <?php endfor; ?>
    </div>

    <div class="carousel-item">
      <?php for($i=3 ; $i <6 ; $i++): ?>
        <div class="col-xs-4 col-sm-4 col-md-4 mb-5">
          <a href="<?php echo URLROOT; ?>/products/show/<?php echo $data['sales'][$i]->productId; ?>" onclick=abc(this) class="slider_info">
            <img class="img-fluid card-img-top rounded" src="<?php echo ASSETSROOT . $data['sales'][$i]->img_big ?>" alt="Card image cap">
            <div class="card-img-overlay t_img">
              <span class="float-left text-light bg-dark px-1"><?php echo $data['sales'][$i]->productName ?></span>
            </div>
          </a>
        </div>
      <?php endfor; ?>
    </div>

  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon sp"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon sp"></span>
  </a>

</div>


<!-- Carousel of sales -->
<h3>Les produits les plus consultés</h3>
<div id="demo2" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators mb-0 pb-0 pt-1">
    <li data-target="#demo2" data-slide-to="0" class="active"></li>
    <li data-target="#demo2" data-slide-to="1"></li>
    <!-- <li data-target="#demo" data-slide-to="2"></li> -->
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner no-padding my-3">
  
    <div class="carousel-item active">
      <?php for($i=0 ; $i <3 ; $i++): ?>
        <div class="col-xs-4 col-sm-4 col-md-4 mb-5">
          <a href="<?php echo URLROOT; ?>/products/show/<?php echo $data['consultations'][$i]->productId; ?>" onclick=abc(this) class="slider_info">
            <img class="img-fluid card-img-top rounded" src="<?php echo ASSETSROOT . $data['consultations'][$i]->img_big ?>" alt="Card image cap">
            <div class="card-img-overlay t_img">
              <span class="float-left text-light bg-dark px-1"><?php echo $data['consultations'][$i]->productName ?></span>
            </div>
          </a>
        </div>
      <?php endfor; ?>
    </div>

    <div class="carousel-item">
      <?php for($i=3 ; $i <6 ; $i++): ?>
        <div class="col-xs-4 col-sm-4 col-md-4 mb-5">
          <a href="<?php echo URLROOT; ?>/products/show/<?php echo $data['consultations'][$i]->productId; ?>" onclick=abc(this) class="slider_info">
            <img class="img-fluid card-img-top rounded" src="<?php echo ASSETSROOT . $data['consultations'][$i]->img_big ?>" alt="Card image cap">
            <div class="card-img-overlay t_img">
              <span class="float-left text-light bg-dark px-1"><?php echo $data['consultations'][$i]->productName ?></span>
            </div>
          </a>
        </div>
      <?php endfor; ?>
    </div>

  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo2" data-slide="prev">
    <span class="carousel-control-prev-icon sp"></span>
  </a>
  <a class="carousel-control-next" href="#demo2" data-slide="next">
    <span class="carousel-control-next-icon sp"></span>
  </a>



</div>



<?php require APPROOT . '/views/inc/footer.php'; ?>