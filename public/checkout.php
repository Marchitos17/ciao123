<?php require_once("../risorse/config.php"); 
require_once('carrello.php');?>

<?php include(FRONT_END.'header.php'); ?>

<?php echo $_SESSION['prodotto_1'];?>

<div class="container-fluid my-5 ">
  <!-- PAYPAL -->
  <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="business" value="sb-1yt0a29884659@business.example.com"> 
    <input type="hidden" name="cmd" value="_cart">
    <INPUT TYPE="hidden" name="charset" value="utf-8">
    <INPUT TYPE="hidden" NAME="currency_code" value="EUR">
    
    <div class="row g-5 ">
      <div class="col-md-8 mx-auto">
        <h4 class="d-flex justify-content-center align-items-center mb-3">
          <span class="text-primary">CARRELLO</span>
          <span class="badge bg-primary rounded-pill">0</span>
        </h4>
        <ul class="list-group mb-3">
         <?php carrello(); ?> 
        <!--
          <li class="list-group-item d-flex justify-content-between lh-sm ">
            <div>
              <h6 class="my-0">Product name</h6>
              <small class="text-body-secondary">Brief description</small>
            </div>
            <span class="text-body-secondary">$12</span>
            <div class="">
              <a class="btn btn-primary " href="carrello.php?add=1" role="button">Aggiungi</a>
              <a class="btn btn-warning" href="carrello.php?remove=1" role="button">Rimuovi</a>
              <a class="btn btn-danger" href="carrello.php?delete=1" role="button">Cancella</a>
            </div>
          </li> 
          
          
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Second product</h6>
              <small class="text-body-secondary">Brief description</small>
            </div>
            <span class="text-body-secondary">$8</span>
          </li>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Third item</h6>
              <small class="text-body-secondary">Brief description</small>
            </div>
            <span class="text-body-secondary">$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
            <div class="text-success">
              <h6 class="my-0">Promo code</h6>
              <small>EXAMPLECODE</small>
            </div>
            <span class="text-success">−$5</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (USD)</span>
            <strong>$20</strong>
          </li>
        </ul>-->

        <!--<form class="card p-2 ">-->
        
        <span class="text-primary text-center">Articoli: <?php echo isset($_SESSION['totale_art']) ? $_SESSION['totale_art'] : $_SESSION['totale_art'] = '0';?></span>
          <span class="text-primary text-center">Totale ordine: € <?php echo isset($_SESSION['totale']) ? $_SESSION['totale'] : $_SESSION['totale'] = '0';?></span>
          <div class="input-group mb-1">
            <input type="text" class="form-control" placeholder="Promo code">
          </div>
          <button type="submit" class="btn btn-secondary">CheckOut</button>
          <div class="text-center"><input type="image" name="submit" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online"></div>
        </form>
      </div>
    </div>
</div>

    <h4><?php mostraAvviso(); ?></h4>
