<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhuma-Sug Accueil</title>
    <?php include './config/config.php'; ?>
    <link rel="stylesheet" <?= "href=" . CSS . "navbar.css" ?>>
    <link rel="stylesheet" <?= "href=" . CSS . "panier.css" ?>>
    <link rel="stylesheet" <?= "href=" . CSS . "boutons.css" ?>>
    <script defer type="module" <?= 'src=' . JS . 'panier.js' ?>></script>
</head>

<body>
    <input id="page" type="hidden" value="4">
    <?php include TEMPLATE . TEMPLATE_PARTS . '_navbar.php'; ?>
    <main>
        <section>
            <article>
                <h2 id="titre"></h2>
                <div>
                    <button class="bouton" id="retourBtn">Retour</button>
                </div>
            </article>
        </section>
        <section>
            <?php include TEMPLATE . TEMPLATE_PARTS . '_panier.php'; ?>
        </section>
        <section></section>
        <section class="popup" id="popup">
            <?php include TEMPLATE . TEMPLATE_PARTS . '_popup.php'; ?>
        </section>
    </main>
</body>

</html>