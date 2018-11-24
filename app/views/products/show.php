<?php require APPROOT . '/views/inc/header.php'; ?>

<?php print_r($data) ;?>

<div class="card">
	<div class="row">

		<aside class="col-sm-5 border-right">
      <img src="<?php echo ASSETSROOT . $data['product']->img_big ?>" alt="Card image cap">
    </aside>
    
    <aside class="col-sm-7">
      <article class="card-body p-5">
	      <h3 class="title mb-3"><?php echo $data['product']->productName ?></h3>
        <p class="price-detail-wrap"> 
          <span class="price h3 text-warning"> 
            <span class="currency">US $</span>
            <span class="num">1299</span>
          </span> 
          <span>/per kg</span> 
        </p> <!-- price-detail-wrap .// -->
        <dl class="item-property">
          <dt>Description</dt>
          <dd><p>Here goes description consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco </p></dd>
        </dl>
        <dl class="param param-feature">
          <dt>Model#</dt>
          <dd>12345611</dd>
        </dl>  <!-- item-property-hor .// -->
        <dl class="param param-feature">
          <dt>Color</dt>
          <dd>Black and white</dd>
        </dl>  <!-- item-property-hor .// -->
        <dl class="param param-feature">
          <dt>Delivery</dt>
          <dd>Russia, USA, and Europe</dd>
        </dl>  <!-- item-property-hor .// -->

        <a href="#" class="btn btn-lg btn-primary text-uppercase"> Buy now </a>
        <input type="submit" name="envoyer" value="envoyer" onclick="afficher();">
        <a href="<?php echo URLROOT; ?>/user/basket.php?id=1&quantity=2" class="btn btn-lg btn-outline-primary text-uppercase">
          <i class="fas fa-shopping-cart"></i> Add to cart
        </a>

        <form action="<?php echo URLROOT; ?>/basket/addToBasket" method="post">
        
          <?php if($data['product']->stock>0) : ?>

            <input type="hidden" name="id" value="<?php echo $data['product']->productId; ?>"><br>
            <select type="quantity" name="quantity">
              <?php for ($i = 1; $i <= $data['product']->stock ; $i++) : ?>
                <option value="<?php echo $i?>"><?php echo $i?></option>
              <?php endfor; ?>
            </select>

            <input type="submit" value="GO" class="btn btn-success btn-block">

          <?php else : ?>

            <span>Rupture de stock</span>

          <?php endif; ?>

        </form>


      </article> <!-- card-body.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// -->
</div> <!-- card.// -->

<?php require APPROOT . '/views/inc/footer.php'; ?>