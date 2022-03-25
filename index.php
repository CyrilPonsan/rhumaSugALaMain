<?php include './config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhuma-Sug Accueil</title>
    <link rel="stylesheet" <?= "href=" . CSS . "navbar.css" ?>>
    <link rel="stylesheet" <?= "href=" . CSS . "main.css" ?>>
    <link rel="stylesheet" <?= "href=" . CSS . "boutons.css" ?>>
    <script defer type="module" <?= 'src=' . JS . 'main.js' ?>></script>
    <!--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
-->
</head>

<body>
    <input id="page" type="hidden" value="0">
    <?php include TEMPLATE . TEMPLATE_PARTS . '_navbar.php'; ?>
    <main>
        <section class="detailsProduit">
            <?php include TEMPLATE . TEMPLATE_PARTS . '_detailsProduit.php'; ?>
        </section>
        <section>
            <?php include PHPSCRIPTS . 'catalogue.php'; ?>
        </section>
        <section></section>
        <section class="popup" id="addToCart">
            <?php include TEMPLATE.TEMPLATE_PARTS.'_popup.php'; ?>
        </section>
    </main>
</body>

</html>