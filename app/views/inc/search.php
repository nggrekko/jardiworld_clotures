<!-- Category dropdown -->
<div class="btn-group">
  <button class="btn btn-dark btn-lg dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Sélectionner une catégorie
  </button>
  <div class="dropdown-menu">
    <?php foreach($data['categories'] as $category): ?>
      <a class="dropdown-item" href="<?php echo URLROOT; ?>/products/category/<?php echo $category->name ?>"> <?php echo $category->name ?></a>
    <?php endforeach ; ?>
  </div>
</div>

<!-- Search bar -->
<div class="row mb-4">
    <div class="col-12 col-md-10 col-lg-8">
        <form class="card card-sm" action="<?php echo URLROOT; ?>/products/search" method="post">
            <div class="card-body row no-gutters align-items-center py-2">
                <div class="col-auto">
                    <i class="fas fa-search h4 text-body"></i>
                </div>
                <!--end of col-->
                <div class="col">
                    <input class="form-control form-control-lg form-control-borderless border-0" name="search" type="search" placeholder="Rechercher un produit">
                </div>
                <!--end of col-->
                <div class="col-auto">
                    <button class="btn btn-lg btn-success" type="submit">Rechercher</button>
                </div>
                <!--end of col-->
            </div>
        </form>
    </div>
    <!--end of col-->
</div>