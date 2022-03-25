<?php

require_once PHPCLASSES . "VenteRhum.php";

class PanierEnAttente
{
    private int $idProduit;
    private int $quantite;
    private float $prixVenteProduit;
    private string $formattedPrice;
    private float $total;

    public function __construct(int $prod, int $quant, float $prix)
    {
        $this->idProduit = $prod;
        $this->quantite = $quant;
        $this->prixVenteProduit = $prix;
    }

    public function afficherLigne(): string
    {
        $formatter = new NumberFormatter('fr-FR', NumberFormatter::CURRENCY);
        $html = "<tr>";
        $name = VenteRhum::selectById("produit", "idProduit", $this->idProduit)[0]['nomProduit'];
        $html .= "<td>" . htmlspecialchars($name) . "</td>";
        $html .=  "<td>" . htmlspecialchars($formatter->formatCurrency($this->prixVenteProduit, 'EUR'))."</td>";
        $html .=  "<td>" . htmlspecialchars($this->quantite) . "</td>";
        $this->total = $this->prixVenteProduit * $this->quantite;
        $this->formattedPrice = $formatter->formatCurrency($this->total, 'EUR');
        $html .=  "<td>" . htmlspecialchars($this->formattedPrice) . "</td>";
        $html .=  "<td><button class='supprimerBtn'>retirer</button></td></tr>";
        return $html;
    }

    public function getTotal(): float
    {
        return htmlspecialchars($this->total);
    }
}
