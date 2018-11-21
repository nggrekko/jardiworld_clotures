<?php require APPROOT . '/views/inc/header.php'; ?>
<?php echo $data['product']->img_big ;?>
<?php echo "success";?>
<?php print_r($data) ;?>

<?php echo dirname(__FILE__); ?>
<img src="https://www.google.fr/images/branding/googlelogo/2x/googlelogo_color_272x92dp.png" alt="alter 1"/>
<img src="50010-big.jpg" alt="alter 2"/>
<img src='50010-big.jpg' alt="alter 2"/>
<img src="../50010-big.jpg" alt="alter 3"/>
<img src="public/assets/50010-big.jpg" alt="alter 4"/>
<img src="/public/assets/50010-big.jpg" alt="alter 4"/>
<img src="images/banana1.jpg"/>


<div class="card">
	<div class="row">
		<aside class="col-sm-5 border-right">
            
           <img src="/public/assets/<?php echo $data['product']->img_big ?>" alt="Card image cap">

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
        <a href="#" class="btn btn-lg btn-outline-primary text-uppercase"> <i class="fas fa-shopping-cart"></i> Add to cart </a>
      </article> <!-- card-body.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// -->
</div> <!-- card.// -->

<?php require APPROOT . '/views/inc/footer.php'; ?>