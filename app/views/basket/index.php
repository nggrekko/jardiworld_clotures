<?php require APPROOT . '/views/inc/header.php'; ?>

<?php // print_r($data); ?>

<form class="pull-right" action="<?php echo URLROOT; ?>/basket/removeAll" method="post">
  <input type="submit" value="Delete All" class="btn btn-danger">
</form>

<?php if(empty($data)) : ?>
  <h1>Panier vide</h1>
<?php else : ?>
  <?php foreach($data as $item) : ?>
    <p><?php echo 'id : ' . $item['productId'] . ' quantity : ' . $item['quantity'] ?></p>
    <a href="<?php echo URLROOT; ?>/basket/removeItemFromBasket/<?php echo $item['productId']; ?>" class="btn btn-dark">delete2</a>

    <form action="<?php echo URLROOT; ?>/basket/updateQuantity" method="post">
        
        <input type="hidden" name="id" value="<?php echo $item['productId']; ?>"><br>
        <select name="quantity">
          <?php for ($i = 1; $i <= $item['stock'] ; $i++) : ?>
            <option value="<?php echo $i?>"><?php echo $i?></option>
          <?php endfor; ?>
        </select>

        <input type="submit" value="GO" class="btn btn-success btn-block">

      </form>

  <?php endforeach; ?>
<?php endif; ?>




<?php require APPROOT . '/views/inc/footer.php'; ?>