<?php 
    if(isset($_GET['id'])){

        $query = query("SELECT * FROM prodotti WHERE id_prodotto={$_GET['id']}");
        conferma($query);

        while($row = fetch_array($query)){
            $nomepdt = $row['nome_prodotto'];
            $catpdt = $row['cat_prodotto'];
            $dettagli = $row['info_dettagliate'];
            $infoBreve = $row['descr_prodotto'];
            $prezzo = $row['prezzo'];
            $quantita_pdt = $row['quantita_pdt'];
            //$immaginePdt = $row['immagine'];

            $immaginePdt = mostraImg($row['immagine']);
        }
        aggiornaProdotto();
        mostraAvviso();
    }
?>

<div class="cointainer">
    <div class="col-md-12"><h2>MODIFICA UN PRODOTTO</h2></div>
    <form class="row g-3" action="" method="post" enctype="multipart/form-data">
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Nome prodotto</label>
        <input type="text" class="form-control" name="nome" value="<?php echo $nomepdt;?>">
    </div>
    <div class="col-md-1">
        <label for="inputPassword4" class="form-label">Prezzo</label>
        <input type="number" class="form-control" name="prezzo" step=".01" min="0" value="<?php echo $prezzo;?>"> <!-- La funzione STEP fa si che il numero diventi decimale. Lo stesso per min. -->
    </div>
    <div class="mb-4 col-md-6">
    <label for="exampleFormControlTextarea1" class="form-label">Dettagli</label>
    <textarea class="form-control" name="dettagli" rows="6"><?php echo $dettagli;?></textarea>
    </div>
    <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Categoria</label>
        <div class="input-group mb-3">
            <select class="form-control" name="categoria">
                <option value="<?php echo $catpdt; ?>"><?php echo titoloCat($catpdt); ?></option>
                <?php mostraCategoria(); ?>
            </select>
    </div>
    </div>
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Quantità</label>
        <input type="number" class="form-control" name="quantita" min="0" value="<?php echo $quantita_pdt;?>">
    </div>
    <div class="mb-3 col-md-6">
    <label for="formFileMultiple" class="form-label">Immagine</label>
    <input class="form-control" type="file" name="immagine" multiple>
    <img width="200" src="../../risorse<?php echo $immaginePdt;?>">
    </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label">Info</label>
        <textarea class="form-control" name="info" rows="6"><?php echo $infoBreve;?></textarea>
    </div>
    
    <div class="col-md-12 md-2">
        <button type="submit" name="aggiorna" class="btn btn-primary mt-3">Modifica prodotto</button>
    </div>
    </form>
</div>
