<?php
  
    defined('FRONT_END') ? null : define('FRONT_END',__DIR__.'/templates/front/');
    defined('BACK_END') ? null : define('BACK_END',__DIR__.'/templates/back/');

    //echo FRONT_END;

    //connessione database

    define("DB_HOST","localhost");
    define("DB_UTENTE","root");
    define("DB_PASSWORD","");
    define("DB_DATABASE","negozio");

    $connessione = mysqli_connect(DB_HOST,DB_UTENTE,DB_PASSWORD,DB_DATABASE);

    if(!$connessione){
        //echo "non sei connesso";
    }else{
        //echo 'Sei connesso';
    }

    require_once('funzioni.php');
    require_once('carrello.php');
    session_start();