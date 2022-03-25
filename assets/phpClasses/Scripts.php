<?php

require_once(dirname(__FILE__) . '/../phpClasses/Produit.php');
require_once(dirname(__FILE__) . '/../phpClasses/CompteClient.php');

class Scripts
{
    private static NumberFormatter $formatter;

    static public function setFormatter(): void {
        self::$formatter = new NumberFormatter('fr-FR', NumberFormatter::CURRENCY);
    }

    static public function detailsProduit($data): array
    {
        $id = intval($data[0]);
        $produit = VenteRhum::selectById("produit", "idProduit", $id);
        return $produit;
    }

    static public function ajoutPanier(string $id, string $quantite): bool
    {
        if (!isset($_SESSION['panier'])) {
            $panier = array();
        } else {
            $panier = $_SESSION['panier'];
        }
        $datas =
            [
                $id,
                $quantite
            ];
        array_push($panier, $datas);
        $_SESSION['panier'] = $panier;
        return true;
    }

    static public function checkPanier(): bool
    {
        return (isset($_SESSION['panier']) && count($_SESSION['panier']) !== 0);
    }

    static public function suppArticle(string $data): int
    {
        $panier = $_SESSION['panier'];
        $id = intval($data);
        array_splice($panier, $id, 1);
        $_SESSION['panier'] = $panier;
        return $id;
    }

    static public function resetPanier(): string
    {
        $_SESSION['panier'] = null;
        return "panier vidé";
    }

    static public function nbreArticles(): int
    {
        $result = 0;
        if (isset($_SESSION['panier'])) {
            $result = count($_SESSION['panier']);
        }
        return $result;
    }

    static public function totalPanier(): string
    {
        $panier = $_SESSION['panier'];
        $total = 0;
        foreach ($panier as $article) :
            $result = VenteRhum::selectById("produit", "idProduit", $article[0])[0]['prixProduit'];
            $prix = (float) $result;
            $total += $prix * $article[1];
        endforeach;
        self::setFormatter();
        $total = self::$formatter->formatCurrency($total, 'EUR');
        return $total;
    }

    static public function vente(): string
    {
        $client = $_SESSION['client'];
        $panier = $_SESSION['panier'];
        $idClient = $client['id'];
        $idVente = VenteRhum::insertVente($idClient);
        for ($i = 0; $i < count($panier); $i++) :
            $idProduit = $panier[$i][0];
            $quantite = $panier[$i][1];
            $prixVente = (float) VenteRhum::selectById("produit", "idProduit", $idProduit)[0]['prixProduit'];
            VenteRhum::insertPanier($idVente, $idProduit, $quantite, $prixVente);
        endfor;
        unset($_SESSION['panier']);
        return "vente enregistrée";
    }

    static public function client($nom, $prenom, $codePostal, $ville, $adresse, $email, $password): array
    {
        $client = new CompteClient($email, $password, $nom, $prenom, $codePostal, $ville, $adresse);
        $client->insert();
        $client->__destruct();
        return $_SESSION['client'];
    }

    static public function detailsVente(string $data): array
    {
        $idVente = (int) $data;
        $achats = VenteRhum::selectById("panier", "idVente", $idVente);
        $result = array();
        foreach ($achats as $achat) :
            $nom = VenteRhum::selectById("produit", "idProduit", $achat['produitId'])[0]['nomProduit'];
            $quantite = $achat['quantite'];
            $prixTotal = $achat['prixVenteProduit'] * $quantite;
            self::setFormatter();
            $prixTotal = self::$formatter->formatCurrency($prixTotal, 'EUR');
            $tmp = [$nom, $quantite, $prixTotal];
            array_push($result, $tmp);
        endforeach;
        return $result;
    }

    static public function login(string $email, string $passwd): string
    {
        $_SESSION['logged'] = false;
        $_SESSION['client'] = null;
        $data = array();
        array_push($data, $email);
        array_push($data, $passwd);
        $result = VenteRhum::testLogin($data);

        if (count($result) === 0) {
            $response = "false";
        } else {
            if ($_SESSION['logged']) {
                $res = $result[0];
                $client = new CompteClient($res[3], $res[4], $res[1], $res[2], $res[6], $res[7], $res[5]);
                $client->setId($res[0]);
                $client->__destruct();
                $response = $_SESSION['client']['prenom'];
            } else {
                $response = "Login failure";
            }
        }
        return $response;
    }

    static public function logout(): string
    {
        unset($_SESSION['panier']);
        unset($_SESSION['client']);
        $_SESSION['logged'] = false;
        return "client déconnecté";
    }

    static public function getVentes(): array
    {
        $client = $_SESSION['client'];
        $id = $client['id'];
        return VenteRhum::selectById("vente", "compteClientId", $id);
    }

    static public function updateAdresse(string $nom, string $prenom, string $codePostal, string $ville, string $adresse): array
    {
        $datas = array();
        array_push($datas, $nom);
        array_push($datas, $prenom);
        array_push($datas, $codePostal);
        array_push($datas, $ville);
        array_push($datas, $adresse);
        VenteRhum::updateAdresse($datas, intval($_SESSION['client']['id']));
        $_SESSION['client']['nom'] = $datas[0];
        $_SESSION['client']['prenom'] = $datas[1];
        $_SESSION['client']['codePostal'] = $datas[2];
        $_SESSION['client']['ville'] = $datas[3];
        $_SESSION['client']['adresse'] = $datas[4];
        return $datas;
    }
    
}
