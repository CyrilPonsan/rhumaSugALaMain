<?php include './config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rhuma-Sug Accueil</title>
    <link rel="stylesheet" <?= "href=" . CSS . "navbar.css" ?>>
    <link rel="stylesheet" <?= "href=" . CSS . "boutons.css" ?>>
    <link rel="stylesheet" <?= "href=" . CSS . "about.css" ?>>
    <script defer type="module" <?= 'src=' . JS . 'about.js' ?>></script>

<body>
    </head>
    <header>
        <?php include TEMPLATE . TEMPLATE_PARTS . '_navbar.php' ?>
    </header>
    <input id="page" type="hidden" value="1">
    <main>
        <section>
            <article>
                <div>
                    <img <?= "src=" . IMG . "caraibes1.jpg alt='photos'" ?>>
                </div>
                <div>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, alias. Nisi, ab in! Ea voluptates, consequuntur eius inventore culpa autem accusantium quas dolorem nihil provident eaque quasi ab amet vero est quae omnis, excepturi ad odio! Alias magnam quae, commodi non deleniti nam dignissimos facilis, totam quas modi odio voluptatum, provident sunt quaerat culpa veritatis iste quibusdam in est aliquid itaque cum consequuntur deserunt. At fugiat, odit placeat, explicabo non laudantium veniam repellat nam vero ad commodi deleniti neque repudiandae? Et, facere eaque. Accusantium adipisci soluta fugit molestias ducimus quae qui tempora non, excepturi eum sint necessitatibus suscipit voluptatibus, laboriosam perspiciatis saepe asperiores architecto iusto vero ipsam voluptatum. Id expedita totam in fugit suscipit quisquam numquam officia autem. Quibusdam qui at ex deserunt cum ducimus veritatis voluptatibus repellat similique aliquid suscipit, nesciunt sunt atque? Officia sint dolore atque sequi quas temporibus, enim eos assumenda magnam, odit asperiores architecto excepturi at.
                </div>
            </article>
        </section>
        <section>
            <article>
                <div>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, alias. Nisi, ab in! Ea voluptates, consequuntur eius inventore culpa autem accusantium quas dolorem nihil provident eaque quasi ab amet vero est quae omnis, excepturi ad odio! Alias magnam quae, commodi non deleniti nam dignissimos facilis, totam quas modi odio voluptatum, provident sunt quaerat culpa veritatis iste quibusdam in est aliquid itaque cum consequuntur deserunt. At fugiat, odit placeat, explicabo non laudantium veniam repellat nam vero ad commodi deleniti neque repudiandae? Et, facere eaque. Accusantium adipisci soluta fugit molestias ducimus quae qui tempora non, excepturi eum sint necessitatibus suscipit voluptatibus, laboriosam perspiciatis saepe asperiores architecto iusto vero ipsam voluptatum. Id expedita totam in fugit suscipit quisquam numquam officia autem. Quibusdam qui at ex deserunt cum ducimus veritatis voluptatibus repellat similique aliquid suscipit, nesciunt sunt atque? Officia sint dolore atque sequi quas temporibus, enim eos assumenda magnam, odit asperiores architecto excepturi at.
                </div>
                <div>
                    <img <?= "src=" . IMG . "caraibes1.jpg alt='photos'" ?>>
                </div>
            </article>
        </section>
        <section></section>
    </main>
</body>