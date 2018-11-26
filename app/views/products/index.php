<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/search.php'; ?>



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