<?php require_once("../../risorse/config.php"); ?>
<?php include(BACK_END."header.php"); ?>
<?php include(BACK_END."sidebar.php"); ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Pannello di amministrazione 
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="material-icons">dashboard</i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
    

    <?php 
        if($_SERVER['REQUEST_URI'] == "/negozio/public/admin" || $_SERVER['REQUEST_URI'] == "/negozio/public/admin/index.php"){
            include(BACK_END."content_admin.php");
        }
        if(isset($_GET['ordini'])){
            include(BACK_END."ordini.php");
        }
        if(isset($_GET['prodotti-admin'])){
            include(BACK_END."prodotti-admin.php");
        }
        if(isset($_GET['aggiungi-pdt'])){
            include(BACK_END."aggiungi-pdt.php");
        }
        if(isset($_GET['aggiorna-pdt'])){
            include(BACK_END."aggiorna-pdt.php");
        }
    ?>

    
    
    
    <!-- jQuery -->
    <!--<script src="js/jquery.js"></script> -->

    <!-- Bootstrap Core JavaScript -->
    <!--<script src="js/bootstrap.min.js"></script>-->
</body>
<?php include(BACK_END.'footer.php'); ?>
</html>
