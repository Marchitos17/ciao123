<?php require_once("../risorse/config.php"); ?>
<?php require_once("carrello.php"); ?>

<?php include(FRONT_END.'header.php'); ?>

<div class="container">
    <h4>Grazie per aver acquistato il prodotto</h4>
</div>

<?php

if(isset($_GET['tx'])){

    $prezzo= $_GET['amt'];
    $valuta= $_GET['cc'];
    $transazione= $_GET['tx'];
    $stato= $_GET['st'];

    $invioOrdine= query("INSERT INTO ordini(importo_ordine, num_ordine, status_ordine, cur_ordine) VALUES('{$prezzo}','{$valuta}','{$transazione}','{$stato}')");
    conferma($invioOrdine);

    session_destroy();
}else{
    header('Location:index.php');
}



?>
<?php include(FRONT_END."footer.php"); ?>