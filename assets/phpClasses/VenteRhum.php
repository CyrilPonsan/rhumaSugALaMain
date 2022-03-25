<?php

require_once(dirname(__FILE__) . '/../../config/config.php');

class VenteRhum
{

    static public string $dns = DNS;
    static private string $user = USER;
    static private string $passwd = PASSWD;

    static public function connection(): PDO
    {
        try {
            return new PDO(self::$dns, self::$user, self::$passwd);
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    static public function selectAll(): array
    {
        $conn = self::connection();
        $stmt = $conn->prepare("SELECT * FROM  produit");
        $stmt->execute();
        $result = $stmt->fetchAll();
        self::closeConn($stmt, $conn);
        return $result;
    }

    static public function selectById(string $table, string $col, int $id): array
    {
        $conn = self::connection();
        $stmt = $conn->prepare("SELECT * FROM " . $table . " WHERE " . $col . " = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        self::closeConn($stmt, $conn);
        return $result;
    }

    static public function testClient(string $value): array
    {
        $conn = self::connection();
        $stmt = $conn->prepare("SELECT * FROM compteClient WHERE email = ?");
        $stmt->bindParam(1, $value);
        $stmt->execute();
        $result = $stmt->fetchAll();
        self::closeConn($stmt, $conn);
        return $result;
    }

    static public function testLogin(array $value): array
    {
        $result = self::testClient($value[0]);
        if (count($result) !== 0) {
            $_SESSION['logged'] = password_verify($value[1], $result[0]['passwd']);
        }
        return $result;
    }

    static public function testEmail($email): bool
    {
        $result = self::testClient($email);
        return count($result) !== 0;
    }

    static public function insertVente(int $idClient): int
    {
        $conn = self::connection();
        $stmt = $conn->prepare("INSERT INTO vente (compteClientId) VALUES (?)");
        $stmt->bindParam(1, $idClient);
        $stmt->execute();
        self::closeConn($stmt, $conn);
        return $conn->lastInsertId();
    }

    static public function insertPanier(int $idVente, int $idProduit, int $quantite, float $prixVente): void
    {
        $conn = self::connection();
        $stmt = $conn->prepare("INSERT INTO panier (idVente, produitId, quantite, prixVenteProduit)
            VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $idVente);
        $stmt->bindParam(2, $idProduit);
        $stmt->bindParam(3, $quantite);
        $stmt->bindParam(4, $prixVente);
        $stmt->execute();
        self::closeConn($stmt, $conn);
    }

    static private function closeConn($s, $c): void
    {
        $s = null;
        $c = null;
    }

    static public function stripTag(array $tmp) : array
    {
        $datas = array();
        foreach($tmp as $el) :
            $value = strip_tags($el);
            array_push($datas, $value);
        endforeach;
        return $datas;
    }

    static public function updateAdresse(array $data, int $id) : void
    {
        $conn = self::connection();
        $stmt = $conn->prepare("UPDATE compteClient SET nom = ?, prenom = ?, codePostal = ?, ville = ?, adresse = ?
            WHERE clientId = ?");

        $stmt->bindParam(1, $data[0]);
        $stmt->bindParam(2, $data[1]);
        $stmt->bindParam(3, $data[2]);
        $stmt->bindParam(4, $data[3]);
        $stmt->bindParam(5, $data[4]);
        $stmt->bindParam(6, $id);
        $stmt->execute();
        self::closeConn($stmt,$conn);
    }

    static public function selectLogins($id): array {
        $conn = self::connection();
        $stmt = $conn->prepare("SELECT email, passwd FROM compteClient WHERE clientId = ?");
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetchAll();
        self::closeConn($stmt, $conn);
        return $result;
    }

    static public function updateLogins($email, $passwd) : void {
        $conn = self::connection();
        $stmt = $conn->prepare("UPDATE compteClient SET email = ?, passwd = ? WHERE clientId = ?");
        $hash = password_hash($passwd, PASSWORD_DEFAULT);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $hash);
        $stmt->bindParam(3, $_SESSION['client']['id']);
        $stmt->execute();
        self::closeConn($stmt, $conn);
    }
}
