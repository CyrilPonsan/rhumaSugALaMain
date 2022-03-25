<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhuma-Sug Compte</title>
    <?php include './config/config.php'; ?>
    <link rel="stylesheet" <?= "href=" . CSS . "navbar.css" ?>>
    <link rel="stylesheet" <?= "href=" . CSS . "compte.css" ?>>
    <link rel="stylesheet" <?= "href=" . CSS . "boutons.css" ?>>
    <script defer type="module" <?= 'src=' . JS . 'compte.js' ?>></script>
</head>

<body>
    <input id="page" type="hidden" value="2">
    <?php include TEMPLATE . TEMPLATE_PARTS . '_navbar.php'; ?>
    <main>
        <section>
            <article>
                <div>
                    <h2>Se connecter avec un compte existant</h2>
                </div>
                <div>
                    <button class="bouton" id="loginBtn">Se Connecter</button>
                </div>
            </article>
            <article>
                <div>
                    <h2>Creer un nouveau compte</h2>
                </div>
                <div>
                    <button class="bouton" id="createAccountBtn">Nouveau Compte</button>
                </div>
            </article>
        </section>
    </main>
</body>

</html>