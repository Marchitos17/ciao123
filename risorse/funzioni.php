<?php

    function query($sql){
        global $connessione;
        return mysqli_query($connessione,$sql);
    }

    function conferma($risultato){
        global $connessione;
        if(!$risultato){
            die("Richiesta fallita".mysqli_error($connessione));
          }
    }

    function fetch_array($risultato){

        return mysqli_fetch_array($risultato);
    }

    function mostraProdotti(){
        $ricercaProdotti = query('SELECT * FROM prodotti'); // Puo inserire LIMIT 1-2-3 per limitare i prodotti da visualizzare nella pagina
        conferma($ricercaProdotti);
        
        while($row = fetch_array($ricercaProdotti)){
            //echo $row['nome_prodotto'];
        $prodotti = <<<STRINGA_PDT
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="../risorse/{$row['immagine']}" alt=""></a>
                    <div class="card-body">
                    <h4 class="card-title">
                        <a href="prodotto.php?id={$row['id_prodotto']}">{$row['nome_prodotto']}</a>
                    </h4>
                    <h5>€{$row['prezzo']}</h5>
                    <p class="card-text">{$row['descr_prodotto']}</p>
                    </div>
                    <div class="card-footer text-center">
                    <small class="text-body-secondary">Quantità: {$row['quantita_pdt']}</small>
                    <a href="carrello.php?add={$row['id_prodotto']}"><button type="button" class="btn btn-outline-primary btn-small btn-block">Acquista</button></a><a><button type="button" class="btn btn-outline-primary btn-small btn-block">Dettagli</button></a> 
                    
                    </div>
                </div>
            </div>
        STRINGA_PDT;
        echo $prodotti;
        }
    }
    function distruggisessione(){
        session_destroy();
        header('Location:index.php');
    }
    function mostraCategorie(){

        $ricercaCategorie= query('SELECT * FROM categorie');
        conferma($ricercaCategorie);

        while($row = fetch_array($ricercaCategorie)){
        $categorie= <<< STRINGA_CAT
            <a href='categorie.php?id={$row['id_cat']}' class='list-group-item'>{$row['nome_cat']}</a>

        STRINGA_CAT;
        echo $categorie;    
        }
    }

    function paginaCategorie(){
        $pdtCategoria = query("SELECT * FROM prodotti WHERE cat_prodotto = {$_GET['id']}");
        conferma($pdtCategoria);

        while($row = fetch_array($pdtCategoria)){

        $pdfSingolaCat = <<<STRINGA_PDT
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card altezza">
                <img class="card-img-top" src="../risorse/{$row['immagine']}" alt="">
                <div class="card-body">
                    <h4 class="card-title">{$row['nome_prodotto']}...</h4>
                    <p class="card-text">{$row['descr_prodotto']}</p>
                </div>
                <div class="card-footer text-center">
                <a><button type="button" class="btn btn-outline-primary btn-small btn-block">Acquista</button></a><a><button type="button" class="btn btn-outline-primary btn-small btn-block">Dettagli</button></a> 
                </div>
                </div>
            </div>
        STRINGA_PDT;
        echo $pdfSingolaCat;
        }
    }

    function catologoProdotti(){ //mostra prodotti nel sito negozio.php

        $catalogo = query('SELECT * FROM prodotti'); // Puo inserire LIMIT 1 per limitare i prodotti da visualizzare nella pagina
        conferma($catalogo);

        while($row = fetch_array($catalogo)){

        $shopCatalogo = <<<STRINGA_PDT
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="../risorse/{$row['immagine']}" alt=""></a>
                    <div class="card-body">
                    <h4 class="card-title">
                        <a href="prodotto.php?id={$row['id_prodotto']}">{$row['nome_prodotto']}</a>
                    </h4>
                    <h5>€{$row['prezzo']}</h5>
                    <p class="card-text">{$row['descr_prodotto']}</p>
                    </div>
                    <div class="card-footer text-center">
                    <a><button type="button" class="btn btn-outline-primary btn-small btn-block">Acquista</button></a><a><button type="button" class="btn btn-outline-primary btn-small btn-block">Dettagli</button></a> 
                    </div>
                </div>
            </div>
        STRINGA_PDT;
        echo $shopCatalogo;
        }
    }

    function creaAvviso($msg){
        if(!empty($msg)){
            $_SESSION['messaggio'] = $msg;
        }else{
            $msg = "";
        }
    }

    function mostraAvviso(){
        if(isset($_SESSION['messaggio'])){
            echo ($_SESSION['messaggio']);
            unset($_SESSION['messaggio']);
        }
    }