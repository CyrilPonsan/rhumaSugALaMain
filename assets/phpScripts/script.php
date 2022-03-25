<?php
session_start();
require_once(dirname(__FILE__) . '/../phpClasses/Scripts.php');
require_once(dirname(__FILE__) . '/../phpClasses/VenteRhum.php');

$tmp = json_decode($_POST['data']);
$datas = VenteRhum::stripTag($tmp);

switch ($datas[0]):
    case "detailsProduit":
        $result = Scripts::detailsProduit($datas[1]);
        break;
    case "getClient":
        $result = $_SESSION['client'];
        break;
    case "getLogins";
        $result = VenteRhum::selectLogins($_SESSION['client']['id'])[0];
        break;
    case "testEmail":
        $result = VenteRhum::testEmail($datas[1]);
        break;
    case "updateLogins":
        VenteRhum::updateLogins($datas[1], $datas[2]);
        $result = true;
        break;
    case "ajoutPanier":
        $result = Scripts::ajoutPanier($datas[1], $datas[2]);
        break;
    case "checkPanier":
        $result = Scripts::checkPanier();
        break;
    case "suppArticle":
        $result = Scripts::suppArticle($datas[1]);
        break;
    case "resetPanier":
        $result = Scripts::resetPanier();
        break;
    case "nbreArticles":
        $result = Scripts::nbreArticles();
        break;
    case "totalPanier":
        $result = Scripts::totalPanier();
        break;
    case "vente":
        $result = Scripts::vente();
        break;
    case "client":
        $result = Scripts::client($datas[1], $datas[2], $datas[3], $datas[4], $datas[5], $datas[6], $datas[7]);
        break;
    case "detailsVente":
        $result = Scripts::detailsVente($datas[1]);
        break;
    case "login":
        $result = Scripts::login($datas[1], $datas[2]);
        break;
    case "logout":
        $result = Scripts::logout();
        break;
    case "getVentes":
        $result = Scripts::getVentes();
        break;
    case "updateAdresse":
        $result = Scripts::updateAdresse($datas[1], $datas[2], $datas[3], $datas[4], $datas[5]);
        break;
endswitch;

echo json_encode($result);
