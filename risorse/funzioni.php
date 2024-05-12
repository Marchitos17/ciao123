<?php

    $cartellaImg= "/immagini/";

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


    function mostraImg($imgProdotto){

        global $cartellaImg;
        return $cartellaImg.$imgProdotto;
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
    function ProdottiAdmin(){
        $ricercaProdotti = query('SELECT * FROM prodotti'); // Puo inserire LIMIT 1-2-3 per limitare i prodotti da visualizzare nella pagina
        conferma($ricercaProdotti);
        while($row = fetch_array($ricercaProdotti)){
            $cercaCategoria = titoloCat($row['cat_prodotto']); //passa alla funzione cat_prodotto e la funzione gli restituisce 
            //echo $row['nome_prodotto'];
            $prodotti = <<<STRINGA_PDT
                <tr>
                    <th scope="row">{$row['id_prodotto']}</th>
                    <td>{$row['nome_prodotto']}</td>
                    <td><img src="../../risorse/immagini/{$row['immagine']}" alt="" style="width:15%"></td>
                    <td>{$cercaCategoria}</td>
                    <td>€{$row['prezzo']}</td>
                    <td>{$row['quantita_pdt']}</td>
                    <td><a class="btn btn-primary" href="index.php?aggiorna-pdt&id={$row['id_prodotto']}" role="button">Modifica</a></td>
                    <td><a class="btn btn-danger" href="../../risorse/templates/back/cancella-pdt.php?id={$row['id_prodotto']}" role="button">Cancella</a></td>
                </tr
            STRINGA_PDT;
            echo $prodotti;
        }
    }

    function titoloCat($catPdt){ //passa alla funziona una variabile gia utilizzata
        $titoloCat = query("SELECT * FROM categorie  WHERE id_cat = '{$catPdt}'"); 

        while($row = fetch_array($titoloCat)){
            return $row['nome_cat']; // restituisce il nome della categoria
        }
    }
 
    function AggiungiPdt(){
        if(isset($_POST['aggiungi'])){

            $nomepdt = $_POST['nome'];
            $catpdt = $_POST['categoria'];
            $dettagli = $_POST['dettagli'];
            $infoBreve = $_POST['info'];
            $prezzo = $_POST['prezzo'];
            $quantita_pdt = $_POST['quantita'];
            $immaginePdt = $_FILES['immagine']['name'];
            $immagineTemp = $_FILES['immagine']['tmp_name'];

            move_uploaded_file($immagineTemp, IMG_UPLOADS.$immaginePdt);

            $nuovoPdt = query("INSERT INTO prodotti (nome_prodotto,descr_prodotto,prezzo,info_dettagliate,quantita_pdt,cat_prodotto,immagine) VALUES ('{$nomepdt}','{$dettagli}','{$prezzo}','{$infoBreve}','{$quantita_pdt}','{$catpdt}','{$immaginePdt}')");
            conferma($nuovoPdt);

            creaAvviso("<script>alert('ATTENZIONE! Hai inserito correttamente il prodotto.');</script>");
       }
    }

    function mostraCategoria(){
            $query = query('SELECT * FROM categorie');
            conferma($query);
            
            while($row = fetch_array($query)){
                $mostraCtg = <<<STRINGA_PDT
                    <option value="{$row['id_cat']}">{$row['nome_cat']}</option>
                STRINGA_PDT;
                echo $mostraCtg;
            }
        }

    function aggiornaProdotto(){
        if(isset($_POST['aggiorna'])){

            $nomepdt = $_POST['nome'];
            $catpdt = $_POST['categoria'];
            $dettagli = $_POST['dettagli'];
            $infoBreve = $_POST['info'];
            $prezzo = $_POST['prezzo'];
            $quantita_pdt = $_POST['quantita'];
            $immaginePdt = $_FILES['immagine']['name'];
            $immagineTemp = $_FILES['immagine']['tmp_name'];

            move_uploaded_file($immagineTemp, IMG_UPLOADS.$immaginePdt);

            $update= query("UPDATE prodotti SET nome_prodotto = '{$nomepdt}',descr_prodotto = '{$infoBreve}',prezzo = '{$prezzo}',cat_prodotto = '{$catpdt}',immagine = '{$immaginePdt}',info_dettagliate = '{$dettagli}',quantita_pdt = '{$quantita_pdt}' WHERE id_prodotto = {$_GET['id']}");
            conferma($update); 

            header("Location:index.php?prodotti-admin");
            creaAvviso("<script>alert('ATTENZIONE! Hai modificato correttamente il prodotto.');</script>");
        }
    }
    ob_start(); //forza l'output, in questo caso della funzione aggiorna prodotto con questa funzione ci reindirizza alla pagina index.php?prodotti-admin
    
    
?> 