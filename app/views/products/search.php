<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/backward.php'; ?>

<?php if(empty($data['products'])) : ?>

  <div class="jumbotron jumbotron-flud text-center">
      <div class="container">
      <h1 class="display-3">Aucun produit trouvé pour la recherche : <?php echo $data['keyword']; ?></h1>
    </div>
  </div> 

<?php else : ?>

  <h3 class="mb-3">Mot-clé recherché : <?php echo $data['keyword']; ?></h3>
  <div class="card-group">
    <?php foreach($data['products'] as $product) : ?>
      <div class="col-md-3 mb-4">
        <div class="card" style="max-width:250px">
          <img class="card-img-top" src="<?php echo ASSETSROOT . $product->img_big ?>" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?php echo $product->productName ?></h5>
            <p class="card-text">Prix : <?php echo $product->prix ?> &euro;</p>
            <p class="card-text"><small class="text-muted"><?php echo $product->consultations; ?> consultations</small></p>
          </div>
          <div class="card-footer">
            <a href="<?php echo URLROOT; ?>/products/show/<?php echo $product->productId; ?>" class="btn btn-primary right"><i class="fas fa-shopping-cart"></i> Voir</a>
          </div>
        </div>    
      </div>
    <?php endforeach; ?>
  </div>

<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>