<?php
require_once PHPCLASSES . "VenteRhum.php";
require_once PHPCLASSES . "Vente.php";
session_start();
?>

<article>
    <?php
    $formatter = new NumberFormatter('fr-FR', NumberFormatter::CURRENCY);
    $client = $_SESSION['client'];
    $id = $client['id'];
    $result = VenteRhum::selectById("vente", "compteClientId", $id);
    foreach ($result as $el) :
        $idVente = $el['idVente'];
        $achats = VenteRhum::selectById("panier", "idVente", $el['idVente']);
        $nbreArticles = count($achats);
        $prix = 0;
        $date = $el['vente'];
        foreach ($achats as $achat) :
            $prix += $achat['quantite'] * $achat['prixVenteProduit'];
        endforeach;
        $prix = $formatter->formatCurrency($prix, "EUR");
        $vente = new Vente($idVente, $date, $nbreArticles, $prix);
        echo $vente->afficherVente();
    endforeach;
    ?>
</article>