<<?php require_once("../risorse/config.php"); ?>

<?php include(FRONT_END.'header.php'); ?>

    <!-- Page Content -->
    <div class="container my-5">

      <div class="row">

      <?php include(FRONT_END.'sidebar.php'); ?>
      
      <?php
        $pdtSingolo= query("SELECT * FROM prodotti WHERE id_prodotto = {$_GET['id']}");
        conferma($pdtSingolo);

        while($row = fetch_array($pdtSingolo)):
      ?>


        <div class="col-lg-9">

          <div class="card mt-4">
            <img class="card-img-top img-fluid" src="../risorse/<?php echo $row['immagine'];?>" alt="">
            <div class="card-body">
              <h3 class="card-title"><?php echo $row['nome_prodotto'];?></h3>
              <h4>€<?php echo $row['prezzo'];?></h4>
              <p class="card-text"><?php echo $row['descr_prodotto'];?></p>
              <button type="button" class="btn bg-primary btn-small btn-block">Acquista</button>
            </div>
          </div>
          <!-- /.card -->

          <div class="card card-outline-secondary my-4">
            <div class="card-header">
              Info Dettagliate
            </div>
            <div class="card-body">
              <h3 class="card-text"><?php echo $row['info_dettagliate'];?></h3>
              <hr>
            </div>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->
      <?php endwhile ?>
      </div>

    </div>
    <!-- /.container -->

    <?php include(FRONT_END."footer.php"); ?>
