<?php require APPROOT . '/views/inc/header.php'; ?>

  <div class="container">

    <?php foreach($data['categories'] as $category) : ?>
      <p><?php echo $category->name; ?></p>
    <?php endforeach; ?>

    <!-- <div class="card-deck"> -->
    <div class="col-md-4">
      <?php foreach($data['products'] as $product) : ?>
      <?php echo dirname(__FILE__) ?>
        <?php echo APPROOT . "\assets\\" . $product->img_vignette ?>
        
        <img src="assets/50010.jpg" alt="fuck">

        <div class="card">

          <img class="card-img-top" src="assets/<?php echo $product->img_vignette ?>" alt="Card image cap">
      
          <div class="card-body">
            <h5 class="card-title"><?php echo $product->productName ?></h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>

        </div>    
        <p><?php echo $product->productName; ?></p>
      <?php endforeach; ?>
    </div>
  </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>