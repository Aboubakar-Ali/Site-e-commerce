<form action="" method="POST">
    <div style="padding:20px">
        <a href="/admin/"><button>Retour</button></a>
        <button type="submit" name="add_prdct">Créer un produit (ligne vide)</button>
        <button type="submit">Enregister les modifications (Produits)</button>
    </div>
    <div class="grid">
    <div class="product">
        <div class="head_" style="height:100%;">
            <h1>Produits</h1>
            Ici, vous pourrez contrôler le stock et les modèles disponibles sur le site.
        </div>
    </div>

    <?php foreach ( $prdct_ as $row ) { ?>
        <div class="product">
            <div class="head">
                    <div><button> id : <?= $row['id_product']; ?></button></div>
                    <?php foreach ($row as $key => $cell) { ?>
                        <?php if($key != 'id_product') { ?>
                            <div><input type="text" name="prdcts[<?= $row['id_product']; ?>][<?= $key ?>]" value="<?= $cell ?>"><span><?= $key ?></span></div>
                        <?php } ?>
                    <?php } ?>
                    <div><button type="button" class="show" value="<?= $row['id_product']; ?>" name="add_stock">Afficher stock</button></div>
                    <div><button type="submit" value="<?= $row['id_product']; ?>" name="add_stock">Créer du stock</button></div>
                    <div><button type="submit" value="<?= $row['id_product']; ?>" name="rmv_prdct">Supprimer le produit</button></div>
            </div>
            <div class="stock" style="padding:10px">
                <table>
                <?php foreach ( $stock_ as $row_ ) { ?>
                    <tr>
                    <?php if ( $row_['id_product'] == $row['id_product']) { ?>
                            <?php foreach ($row_ as $key => $cell) { ?>
                                <?php if($key != 'id_stock' && $key != 'id_product') { ?>
                                    <td>[<?= $key ?>] <input type="text" name="stock[<?= $row_['id_stock']; ?>][<?= $key ?>]" value="<?= $cell ?>"></td>
                                <?php } ?>
                            <?php } ?>
                            <td><button type="submit" value="<?= $row_['id_stock']; ?>" name="rmv_stock">Supprimer le stock</button</td>
                    <?php } ?>
                    </tr>
                <?php } ?>
                </table>
            </div>
        </div>
    <?php } ?>
    </div>
</form>

<script>
    var acc = document.querySelectorAll(".head");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].querySelector('.show').addEventListener("click", function() {
            head = this;
            for (let index = 0; index < 2; index++) { head = head.parentNode; }
            head.classList.toggle("active");
            var panel = head.nextElementSibling;
            if (panel.style.display === "block") {
            panel.style.display = "none";
            } else {
            panel.style.display = "block";
            }
        });
    }
</script>
<style>
    .product{
        padding: 20px;
        padding-top: 0px;
        color: white;
    }

    .head, .head_ {
        background-color: rgba(0,0,0,0.1);
        padding: 18px;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .active, .stock:hover {
        background-color: rgba(0,0,0,0.2);
    }

    .stock {
        padding: 0 18px;
        display: none;
        overflow: hidden;
        transition: all 0.5s ease-in-out;
    }
</style>