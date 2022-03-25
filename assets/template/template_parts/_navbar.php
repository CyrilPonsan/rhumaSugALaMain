<nav>
    <div>
        <div>
            <img <?php echo "src=" . IMG . "makesuapirate.jpeg"; ?> alt="logo">
            <div>
                <span>laFabric'</span>
                <span>Rhum Bio since 2022</span>
            </div>
        </div>
    </div>
    <div>
        <ul>
            <li>
                <a href="index.php">Accueil</a>
            </li>
            <li>
                <a href="about.php">A Propos</a>
            </li>
            <li>
                <a href="login.php">Compte</a>
            </li>
            <li>
                <a href="accountManagement.php"></a>
            </li>
            <li>
                <a href="panier.php">
                    <img <?= "src=" . IMG . "cart.png alt='logo panier'" ?>>
                </a>
                <div class="panier">0</div>
            </li>
            <li>
                <img id="logOut" <?= "src=" . IMG . "logout.png alt='deconnection'" ?>>
            </li>
        </ul>
    </div>
</nav>