<?php require APPROOT . '/views/inc/header.php'; ?>

<?php // print_r($data); ?>

<form class="pull-right" action="<?php echo URLROOT; ?>/users/remove_all" method="post">
    <input type="submit" value="Delete All" class="btn btn-danger">
  </form>

<?php if(empty($data)) : ?>
  <h1>Panier vide</h1>
<?php else : ?>
  <?php foreach($data as $item) : ?>
    <p><?php echo 'id : ' . $item['productId'] . ' quantity : ' . $item['quantity'] ?></p>
    <a href="<?php echo URLROOT; ?>/users/remove_item_from_cart/<?php echo $item['productId']; ?>" class="btn btn-dark">delete2</a>


    <select name="quantity">
      <?php for ($i = 1; $i <= $item['stock'] ; $i++) : ?>
        <option value="<?php echo $i?>"><?php echo $i?></option>
      <?php endfor; ?>
    </select>

  <?php endforeach; ?>
<?php endif; ?>




<?php require APPROOT . '/views/inc/footer.php'; ?>