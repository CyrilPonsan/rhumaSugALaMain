<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include './config/config.php'; ?>
    <link rel="stylesheet" <?= "href=" . CSS . "navbar.css" ?>>
    <link rel="stylesheet" <?= "href=" . CSS . "login.css" ?>>
    <link rel="stylesheet" <?= "href=" . CSS . "boutons.css" ?>>
    <script type="module" <?= "src=" . JS . "login.js" ?>></script>
</head>

<body>
    <input type="hidden" id="page" value="2">
    <?php include TEMPLATE . TEMPLATE_PARTS . '_navbar.php'; ?>
    <main>
        <section>
            <?php include TEMPLATE . TEMPLATE_PARTS . '_login.php' ?>
        </section>
        <section id="ecran"></section>
        <section id="popup">
            <?php include TEMPLATE . TEMPLATE_PARTS . '_popup.php' ?>
        </section>
    </main>

</body>

</html>