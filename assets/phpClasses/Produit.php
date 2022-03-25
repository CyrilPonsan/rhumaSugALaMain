<?php

require_once(dirname(__FILE__) . '/../phpClasses/VenteRhum.php');

class Produit extends VenteRhum
{

    private int $id;
    private string $nom;
    private string $prix;
    private string $url;
    private string $description;

    public function __construct($id, $nom, $prix, $url, $description)
    {   
        $this->id = $id;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->url = $url;
        $this->description = $description;
    }

    public function afficheProduit()
    {
        include TEMPLATE . TEMPLATE_PARTS . '_produit.php';
    }
}
