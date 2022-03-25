<article class="produit" <?= "id=" . htmlspecialchars($this->id) ?>>
    <div>
        <h2>
            <?= htmlspecialchars($this->nom) ?>
        </h2>
    </div>
    <div>
        <img <?= "src=" . htmlspecialchars($this->url) ?> alt="produit">
        <span>
            <h3>
                <?= htmlspecialchars($this->prix) ?> €
            </h3>
        </span>
    </div>
</article>