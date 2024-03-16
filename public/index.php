<?php require_once("../risorse/config.php"); ?>

<?php include(FRONT_END.'header.php'); 

?>

    <!-- Page Content -->
    <div class="container my-5">

      <div class="row">
        <?php include(FRONT_END.'sidebar.php'); ?>

        <div class="col-lg-9">

        <?php include(FRONT_END.'carousel.php'); ?>

          <div class="row">

            <?php 
              mostraProdotti();
            ?>



            

          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->
        <a href="session.php"><button type="button" class="btn btn-danger btn-small btn-block">Sessione 0</button></a>
      </div>
      <!-- /.row -->
      
    </div>
    <!-- /.container -->

<?php include(FRONT_END."footer.php"); ?>