<?php require APPROOT . '/views/inc/header.php'; ?>




<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <?php foreach($data as $product) : ?>
      <div class="carousel-item active">
        <img class="d-block w-100" src="<?php echo ASSETSROOT . $product->img_big ?>" alt="First slide">
        <div class="carousel-caption d-none d-md-block">
          <h5><?php echo $product->productName ?></h5>
          <p><?php echo $product->description ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <!-- <div class="carousel-inner"> -->
    <div class="carousel-item active">
      <img class="d-block w-100" src="..." alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="..." alt="Third slide">
    </div>
  <!-- </div> -->
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>