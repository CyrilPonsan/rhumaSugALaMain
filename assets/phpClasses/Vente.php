<?php

class Vente
{

    private int $idVente;
    private string $date;
    private int $nbreArticles;
    private string $prixTotal;

    public function __construct(int $id, string $date, int $articles, string $prix)
    {
        $this->idVente = $id;
        $this->date = $date;
        $this->nbreArticles = $articles;
        $this->prixTotal = $prix;
    }

    public function afficherVente(): string
    {
        $html = "<div id=" . htmlspecialchars($this->idVente) . ">";
        $html .= "<table><tr>";
        $html .= "<td>" . htmlspecialchars($this->date) . "</td>";
        $html .= "<td>" . htmlspecialchars($this->nbreArticles) . " articles acheté(s)";
        $html .= "<td>" . htmlspecialchars($this->prixTotal);
        $html .= "</tr></table></div>";
        return $html;
    }
}
