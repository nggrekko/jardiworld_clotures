<?php require APPROOT . '/views/inc/header.php'; ?>

<?php print_r($data) ;?>

<div class="card">
	<div class="row">

		<aside class="col-sm-5 border-right">
      <img src="<?php echo URLROOT; ?>/assets/<?php echo $data['product']->img_big ?>" alt="Card image cap">
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

        <hr>
          <div class="row">
          
            <div class="col-sm-5">
              <dl class="param param-inline">
                <dt>Quantity: </dt>
                <dd>
                  <select class="form-control form-control-sm" style="width:70px;">
                    <option> 1 </option>
                    <option> 2 </option>
                    <option> 3 </option>
                  </select>
                </dd>
              </dl>  <!-- item-property .// -->
            </div> <!-- col.// -->

            <div class="col-sm-7">
              <dl class="param param-inline">
                  <dt>Size: </dt>
                  <dd>
                    <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <span class="form-check-label">SM</span>
                  </label>
                  <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <span class="form-check-label">MD</span>
                  </label>
                  <label class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                    <span class="form-check-label">XXL</span>
                  </label>
                  </dd>
              </dl>  <!-- item-property .// -->
            </div> <!-- col.// -->

          </div> <!-- row.// -->
        <hr>
        <a href="#" class="btn btn-lg btn-primary text-uppercase"> Buy now </a>
        <input type="submit" name="envoyer" value="envoyer" onclick="afficher();">
        <a href="<?php echo URLROOT; ?>/user/basket.php?id=1&quantity=2" class="btn btn-lg btn-outline-primary text-uppercase">
          <i class="fas fa-shopping-cart"></i> Add to cart
        </a>

        <form action="<?php echo URLROOT; ?>/users/addtocart" method="post">
          <input type="id" name="id" class="form-control form-control-lg" value="<?php echo $data['product']->productId ?>">
          <input type="quantity" name="quantity" class="form-control form-control-lg" value="3">
          <input type="submit" value="GO" class="btn btn-success btn-block">
        </form>


      </article> <!-- card-body.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// -->
</div> <!-- card.// -->

<?php require APPROOT . '/views/inc/footer.php'; ?>