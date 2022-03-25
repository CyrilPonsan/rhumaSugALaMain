<?php

require_once './config/config.php';
require_once PHPCLASSES . "Produit.php";

$result = VenteRhum::selectAll();

foreach ($result as $el) :

    $id = $el['idProduit'];
    $nom = $el['nomProduit'];
    $prix = $el['prixProduit'];
    $description = $el['descriptionProduit'];
    $url = IMG . $el['urlProduit'];
    $produit = new Produit($id, $nom, $prix, $url, $description);
    $produit->afficheProduit();

endforeach;
