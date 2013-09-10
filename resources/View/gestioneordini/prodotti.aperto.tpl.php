<?php if($this->updated): ?>
    <div id="updated">
        <div class="isa_success">La lista dei prodotti per quest'ordine è stata aggiornata con successo!</div>
    </div>
<?php endif; ?>
    
<h3>Prodotti:</h3>
<p>Segue l'elenco di <b>tutti</b> i <a href="/prodotti/list/idproduttore/<?php echo $this->produttore->idproduttore;?>">prodotti di <?php echo $this->produttore->ragsoc;?></a>.<br />
    Puoi escludere i prodotti non disponibili cliccando sulla X a destra e modificare il prezzo nel caso di variazioni per quest'ordine.</p>

    <form id="prod_ordini_form" action="/gestione-ordini/prodotti/idordine/<?php echo $this->ordine->idordine;?>" method="post">
        <div id="list_box">
        <?php foreach ($this->list as $key => $prodotto):
                ?>
            <div class="box_row<?php echo ($prodotto->selected) ? "" : " box_row_dis" ; ?>" id="box_<?php echo $prodotto->idprodotto;?>">
                <div class="sub_menu">
                    <a href="javascript:void(0)" onclick="jx_SelProdottoOrdine(<?php echo $prodotto->idprodotto;?>)"><img class="btn_icon <?php echo ($prodotto->selected) ? "delete" : "ok" ; ?>" src="/images/icon/empty_32.png" id="img_sel_<?php echo $prodotto->idprodotto;?>" /></a>
                </div>

                <h3 class="dom_title"><?php echo $prodotto->descrizione;?></h3>

                <p>
                    Categoria: <strong><?php echo $prodotto->categoria; ?></strong><br />
                    <br />
                    <label>Costo:</label>
                    <input type="text" id="prodotto_<?php echo $prodotto->idprodotto;?>" name="prodotto[<?php echo $prodotto->idprodotto;?>]" value="<?php echo $prodotto->costo;?>" size="10" /> <strong>&euro;</strong> / <strong><?php echo $prodotto->udm; ?></strong>
                    <input type="hidden" id="prod_sel_<?php echo $prodotto->idprodotto;?>" name="prod_sel[<?php echo $prodotto->idprodotto;?>]" value="<?php echo ($prodotto->selected) ? "S" : "N" ; ?>" />
                </p>
            </div>
        <?php endforeach; ?>
        </div>
        <fieldset class="for_submit">
            <input type="submit" id="submit" value="SALVA" />
        </fieldset>
    </form>