<?php AggiungiPdt(); 
mostraAvviso(); //Da inserire ogni volta che si fa la funziona crea avviso nella funziona
?>

<form class="row g-3" action="" method="post" enctype="multipart/form-data">
<div class="col-md-12"><h2>AGGIUNGI UN PRODOTTO</h2></div>
  <div class="col-md-6">
    <label for="" class="form-label">Nome prodotto</label>
    <input type="text" class="form-control" name="nome">
  </div>
  <div class="col-md-1">
    <label for="" class="form-label">Prezzo</label>
    <input type="number" class="form-control" name="prezzo" step=".01" min="0"> <!-- La funzione STEP fa si che il numero diventi decimale. Lo stesso per min. -->
  </div>
  <div class="mb-4 col-md-6">
  <label for="" class="form-label">Dettagli</label>
  <textarea class="form-control" name="dettagli" rows="6"></textarea>
  </div>
  <div class="col-md-6">
  <label for="" class="form-label">Categoria</label>
    <div class="input-group mb-3">
        <select class="form-select" name="categoria">
          <option value=""></option>
            <?php mostraCategoria(); ?>
        </select>
</div>
  </div>
  <div class="col-md-6">
    <label for="" class="form-label">Quantità</label>
    <input type="number" class="form-control" name="quantita" min="0">
  </div>
  <div class="mb-3 col-md-6">
  <label for="" class="form-label">Immagine</label>
  <input class="form-control" type="file" name="immagine" multiple>
</div>
  <div class="col-md-6">
    <label for="" class="form-label">Info</label>
    <textarea class="form-control" name="info" rows="6"></textarea>
  </div>
  
  <div class="col-md-12 md-2">
    <button type="submit" name="aggiungi" class="btn btn-primary mt-3">Aggiungi prodotto</button>
  </div>
</form>