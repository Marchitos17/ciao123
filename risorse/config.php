<?php
  
    defined('FRONT_END') ? null : define('FRONT_END',__DIR__.'/templates/front/');
    defined('BACK_END') ? null : define('BACK_END',__DIR__.'/templates/back/');
    defined('IMG_UPLOADS') ? null : define('IMG_UPLOADS',__DIR__.'immagini/');

    //echo FRONT_END;
    //echo IMG_UPLOADS;

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
    session_start();