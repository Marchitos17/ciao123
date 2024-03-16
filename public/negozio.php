<<?php require_once("../risorse/config.php"); ?>

<?php include(FRONT_END.'header.php'); ?>

    <div class="container my-5">


      <header class="jumbotron my-4">
        <h1 class="display-3">Benvenuto nel mio negozio</h1>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
        <a href="#" class="btn btn-primary btn-lg">Acquista!</a>
      </header>

      <!-- Page Features -->
      <div class="row">
        <?php catologoProdotti(); ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<?php include(FRONT_END."footer.php"); ?>