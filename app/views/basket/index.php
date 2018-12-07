<?php require APPROOT . '/views/inc/header.php'; ?>

<?php if(empty($data)) : ?>

  <!-- Message d'info -->
   <?php flash('new_order'); ?>

  <div class="jumbotron jumbotron-flud text-center">
      <div class="container">
      <h1 class="display-3">Votre panier est vide</h1>
    </div>
  </div> 

<?php else : ?>

  <!-- Message d'info -->
  <?php flash('update_quantite'); ?>

  <div class="row">
    <div class="col-12">
      <form class="float-right" action="<?php echo URLROOT; ?>/basket/removeAll" method="post">
        <input type="submit" value="Vider le panier" class="btn btn-danger">
      </form>
    </div>
  </div>
  
  <div class="container mb-4">
      <div class="row">
          <div class="col-12">
              <div class="table-responsive">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th scope="col">Produit</th>
                              <th scope="col">Prix unitaire</th>
                              <th scope="col">Quantité</th>
                              <th scope="col">Prix total</th>
                              <th> </th>
                          </tr>
                      </thead>
                      <tbody>

                        <!-- Display all products -->
                        <?php foreach($data as $item) : ?>
                          <tr>
                              <td><?php echo $item['productName']?></td>
                              <td><?php echo $item['prix']?> &euro;</td>
                              <td>
                                <form action="<?php echo URLROOT; ?>/basket/updateQuantity" method="post">
                                  <input type="hidden" name="id" value="<?php echo $item['productId']; ?>">

                                  <select name="quantity">
                                    <?php for ($i = 1; $i <= $item['stock'] ; $i++) : ?>

                                      <?php if($i == $item['quantity']) : ?>
                                        <option selected value="<?php echo $i?>"><?php echo $i?></option>
                                      <?php else : ?>
                                        <option value="<?php echo $i?>"><?php echo $i?></option>
                                      <?php endif; ?>

                                    <?php endfor; ?>
                                  </select>

                                  <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-redo"></i></button>

                                </form>                            
                              </td>
                              <td><?php echo $item['quantity']*$item['prix'] ?> &euro;</td>
                              <td>
                                <a href="<?php echo URLROOT; ?>/basket/removeItemFromBasket/<?php echo $item['productId']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                              </td>
                          </tr>
                        <?php endforeach; ?>

                        <!-- Display total -->
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td><strong>
                            <?php $total = 0 ; 
                              foreach($data as $item) : 
                                $total += $item['quantity'] * $item['prix'];
                              endforeach;
                              echo $total ?> &euro;
                            </strong></td>
                        </tr>
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="col mb-2">
              <div class="row">
                  <div class="col-sm-12  col-md-6">
                    <a href="<?php echo URLROOT; ?>/products/catalogue" class="btn btn-block btn-light">Poursuivre les achats</a>
                  </div>
                  <div class="col-sm-12 col-md-6 text-right">
                    <a href="<?php echo URLROOT; ?>/basket/order" class="btn btn-lg btn-block btn-success text-uppercase">Passer commande</a>
                  </div>
              </div>
          </div>
      </div>
  </div>

<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>