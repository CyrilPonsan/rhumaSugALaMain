<?php
$panier =  $_SESSION['panier'];
require_once './config/config.php';
require_once PHPCLASSES . "PanierEnAttente.php";
require_once PHPCLASSES . "VenteRhum.php";
?>

<table>
    <thead>
        <tr>
            <td>Produit</td>
            <td>Prix unitaire</td>
            <td>Quantité</td>
            <td>Prix total</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $total = 0;
        foreach ($panier as $produit) :
            $result = VenteRhum::selectById("produit", "idProduit", $produit[0])[0]['prixProduit'];
            $prix = (float) $result;
            $article = new PanierEnAttente($produit[0], $produit[1], $prix);
            echo $article->afficherLigne();
            $total += $article->getTotal();
        endforeach;
        $formatter = new NumberFormatter('fr-FR', NumberFormatter::CURRENCY);
        $total = $formatter->formatCurrency($total, 'EUR');
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td colspan="2">
                Total : <?= $total ?>
            </td>
        </tr>
    </tfoot>
</table>
<div>
    <button class="closeBouton" id="viderBtn">Vider</button>
    <button class="bouton" id="commanderBtn">Commander</button>
</div>