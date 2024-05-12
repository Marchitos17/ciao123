<?php require_once("../../config.php");

if(isset($_GET['id'])){

    $cancellaPdt = query("DELETE FROM prodotti WHERE id_prodotto= $_GET[id]");
    conferma($cancellaPdt);

    creaAvviso("<script>alert('ATTENZIONE! Hai cancellato correttamente il prodotto.');</script>");
    header('Location: ../../../public/admin/index.php?prodotti-admin');
}else{
    header('Location: ../../../public/admin/index.php?prodotti-admin');
}