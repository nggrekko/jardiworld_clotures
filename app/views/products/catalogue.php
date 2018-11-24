<?php require APPROOT . '/views/inc/header.php'; ?>

<?php foreach($data['categories'] as $category) : ?>
  <p><?php echo $category->name; ?></p>
<?php endforeach; ?>


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

<?php require APPROOT . '/views/inc/footer.php'; ?>