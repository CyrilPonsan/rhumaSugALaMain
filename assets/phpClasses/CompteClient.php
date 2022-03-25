<?php

require_once(dirname(__FILE__) . '/../phpClasses/VenteRhum.php');

class CompteClient extends VenteRhum
{

    private int $idClient;
    private string $nomClient;
    private string $prenomClient;
    private string $email;
    private string $passwd;
    private string $adresse;
    private int $codePostal;
    private string $ville;

    public function __construct($em, $pass, $n, $p, $cp, $v, $a)
    {
        $this->nomClient = $n;
        $this->prenomClient = $p;
        $this->email = $em;
        $this->passwd = $pass;
        $this->adresse = $a;
        $this->codePostal = intval($cp);
        $this->ville = $v;
    }

    public function __destruct()
    {
        if ($_SESSION['logged']) {
            $client = [
                "id" => $this->idClient,
                "nom" => $this->nomClient,
                "prenom" => $this->prenomClient,
                "email" => $this->email,
                "adresse" => $this->adresse,
                "codePostal" => $this->codePostal,
                "ville" => $this->ville
            ];
            $_SESSION['client'] = $client;
        }
    }

    public function setId($value) : void
    {
        $this->idClient = $value;
    }

    public function insert(): void
    {
        $conn = parent::connection();
        $stmt = $conn->prepare("INSERT INTO compteClient (
            nom,
            prenom,
            email,
            passwd,
            adresse,
            codePostal,
            ville)
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $passwd = password_hash($this->passwd,  PASSWORD_DEFAULT);
        $stmt->bindParam(1, $this->nomClient);
        $stmt->bindParam(2, $this->prenomClient);
        $stmt->bindParam(3, $this->email);
        $stmt->bindParam(4, $passwd);
        $stmt->bindParam(5, $this->adresse);
        $stmt->bindParam(6, $this->codePostal);
        $stmt->bindParam(7, $this->ville);
        $stmt->execute();
        $stmt = $conn->prepare("SELECT clientId from compteClient WHERE nom = ?");
        $stmt->bindParam(1, $this->nomClient);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $this->idClient = $result[0]['clientId'];
        $stmt = null;
        $conn = null;
        $_SESSION['logged'] = true;
    }
}
