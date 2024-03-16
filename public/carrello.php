<?php require_once("../risorse/config.php"); ?>



<?php
    //$_SESSION['prodotto_'.$_GET['add']]+=1; //incremento quando clicchi nella sessione
        //header('Location:index.php');
        //} else {
      //  echo 'index does not exist';

    if(isset($_GET['add'])){
        
        $controllaQuantità = query("SELECT * FROM prodotti WHERE id_prodotto = {$_GET['add']}");
        conferma($controllaQuantità);

        while($row = fetch_array($controllaQuantità)){
            if($row['quantita_pdt'] == 0){
                creaAvviso("<script>alert('Pezzi terminati o gia presenti nel carrello');</script>" );
                header('Location:checkout.php');
                }else{
                    if($row['quantita_pdt']!= $_SESSION['prodotto_'.$_GET['add']]){
                    $_SESSION['prodotto_'.$_GET['add']]+=1;
                    header('Location:checkout.php');
                    }else{
                        //creaAvviso("<br><br>I ". $row['quantita_pdt']. "pz del prodotto ".$row['nome_prodotto']." sono terminati." );
                    creaAvviso("<script>alert('Pezzi terminati o gia presenti nel carrello');</script>" );
                    header('Location:checkout.php');
                    }
                }
            }
      }
      if(isset($_GET['remove'])){

        $_SESSION['prodotto_'.$_GET['remove']]-=1;
        unset($_SESSION['totale']);
        unset($_SESSION['totale_art']);
        header('Location:checkout.php');
        }
        if(isset($_GET['delete'])){

            $_SESSION['prodotto_'.$_GET['delete']]=0;
            unset($_SESSION['totale']);
            unset($_SESSION['totale_art']);
            header('Location:checkout.php');
        }
        function carrello(){
            $importo= 0;
            $totArticoli= 0;
            foreach($_SESSION as $name => $value){
                if($value > 0){
              
                if(substr($name , 0, 9) == 'prodotto_'){
                    $lungStringa = strlen($name);
                    //echo $lungStringa;
                    $id = substr($name , 9 , $lungStringa); 
                    //echo $id;
                    $prodotti = query("SELECT * FROM prodotti WHERE id_prodotto = {$id}");
                    conferma($prodotti);
                    
                    while($row = fetch_array($prodotti)){
                                $importoparziale = $row['prezzo'] * $value;
                                $totArticoli += $value;

                                $prodottoCarrello = <<< STRINGA_PDT
                
                                    <li class="list-group-item d-flex justify-content-between lh-sm ">
                                    <div>
                                    <h6 class="my-0">{$row['nome_prodotto']}</h6>
                                    <small class="text-body-secondary">Quantità: {$value}</small>
                                    </div>
                                    <span class="text-body-secondary">{$row['prezzo']}</span>
                                    <span class="text-body-secondary">Totale :{$importoparziale}</span>
                                    <div class="">
                                    <a class="btn btn-primary " href="carrello.php?add={$row['id_prodotto']}" role="button">Aggiungi</a>
                                    <a class="btn btn-warning" href="carrello.php?remove={$row['id_prodotto']}" role="button">Rimuovi</a>
                                    <a class="btn btn-danger" href="carrello.php?delete={$row['id_prodotto']}" role="button">Cancella</a>
                                    </div>
                                </li>
                
                                STRINGA_PDT;
                                
                                echo $prodottoCarrello;
                            }
                            $_SESSION['totale']= $importo += $importoparziale;
                            $_SESSION['totale_art']= $totArticoli;
                        }
                    }
            }
            }
        




?>

