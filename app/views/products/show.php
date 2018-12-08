<?php require APPROOT . '/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/backward.php'; ?>

<!-- Message d'info -->
<?php flash('ajout_panier'); ?>

<div class="row">

  <!-- Image -->
  <div class="col-12 col-lg-6 my-auto">
      <div class="card bg-transparent border-0">
          <div class="card-body mx-auto">
              <!-- <a href="" data-toggle="modal" data-target="#productModal"> -->
                  <img class="zoom" src="<?php echo ASSETSROOT . $data['product']->img_big ?>" />
              <!-- </a> -->
          </div>
      </div>
  </div>

  <!-- Add to cart -->
  <div class="col-12 col-lg-6 add_to_cart_block">
    <div class="card bg-transparent mb-3 border-0">
      <div class="card-body">

        <h3 class="title mb-3"><?php echo $data['product']->productName ?></h3>

        <p class=""><span class="">Référence : <?php echo $data['product']->reference ?></span></p> 
        <p class=""><span class="">Consultations : <?php echo $data['product']->consultations ?></span></p> 


        <p class="title mb-3">Prix : <?php echo $data['product']->prix ?> &euro;</p>


        <!-- Form -->
        <form action="<?php echo URLROOT; ?>/basket/addToBasket" method="post">

          <?php if($data['product']->stock>0) : ?>

            <input type="hidden" name="id" value="<?php echo $data['product']->productId; ?>">

            <div class="form-group">
              <label for="colors">Quantité : </label>
              <select type="quantity" name="quantity" class="custom-select" id="colors">

                <?php for ($i = 1; $i <= $data['product']->stock ; $i++) : ?>
                  <?php if($i == 1) : ?>
                    <option selected value="<?php echo $i?>"><?php echo $i?></option>
                  <?php else : ?>
                    <option value="<?php echo $i?>"><?php echo $i?></option>
                  <?php endif; ?>
                <?php endfor; ?>
                
              </select>
            </div>

            <button type="submit" class="btn btn-success btn-lg text-uppercase">
              <i class="fa fa-shopping-cart"></i> Ajouter au panier
            </button>

          <?php else : ?>
            <h3><strong class="text-danger">Rupture de stock</strong></h3>
          <?php endif; ?>

        </form>

      </div>
    </div>
  </div>
</div>


<div class="row">
  <!-- Description -->
  <div class="col-12">
    <div class="card bg-transparent mb-3 border-0">
      <div class="card-header bg-dark text-white text-uppercase"><i class="fa fa-align-justify"></i> Détails du produit</div>
      <div class="card-body">

        <?php if($data['product']->description != "") : ?>
        <p class="card-text">
          <strong>Description : </strong>
          <?php echo $data['product']->description ?>
        </p>
        <?php endif; ?>

        <?php if($data['product']->composants != "") : ?>
        <p class="card-text">
          <strong>Composants : </strong>
          <?php echo $data['product']->composants ?>
        </p>
        <?php endif; ?>

        <?php if($data['product']->montage != "") : ?>
        <p class="card-text">
          <strong>Montage : </strong>
          <?php echo $data['product']->montage ?>
        </p>
        <?php endif; ?>

        <?php if($data['product']->caracteristiques != "") : ?>
        <p class="card-text">
          <strong>Caractéristiques : </strong>
          <?php echo $data['product']->caracteristiques ?>
        </p>
        <?php endif; ?>

        <?php if($data['product']->dimensions != "") : ?>
        <p class="card-text">
          <strong>Dimensions : </strong>
          <?php echo $data['product']->dimensions ?>
        </p>
        <?php endif; ?>

      </div>
    </div>
  </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>