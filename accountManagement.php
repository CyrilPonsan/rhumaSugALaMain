<?php include './config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Compte</title>
    <link rel="stylesheet" <?= "href=" . CSS . "navbar.css" ?>>
    <link rel="stylesheet" <?= "href=" . CSS . "accountManagement.css" ?>>
    <link rel="stylesheet" <?= "href=" . CSS . "boutons.css" ?>>
    <script defer type="module" <?= 'src=' . JS . 'accountManagement.js' ?>></script>
</head>

<body>
    <input id="page" type="hidden" value="3">
    <?php include TEMPLATE . TEMPLATE_PARTS . '_navbar.php'; ?>
    <main>
        <section>
            <?php include TEMPLATE . TEMPLATE_PARTS . '_accountManagement.php'; ?>
        </section>
        <section class="tabs">
            <h2></h2>
            <?php include TEMPLATE . TEMPLATE_PARTS . '_historique.php'; ?>
        </section>
        <section class="tabs">
            <?php include TEMPLATE . TEMPLATE_PARTS . '_adresse.php'; ?>
        </section>
        <section class="tabs">
            <?php include TEMPLATE . TEMPLATE_PARTS . '_newAccount.php'; ?>
        </section>
        <section></section>
        <section class="popup">
            <?php include TEMPLATE . TEMPLATE_PARTS . '_popup.php'; ?>
        </section>
    </main>
</body>

</html>