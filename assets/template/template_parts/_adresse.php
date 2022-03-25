<article>
    <div>
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" required>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom" id="prenom" required>
        <label for="adresse">Adresse</label>
        <textarea name="adresse" id="adresse" cols="30" rows="2" required></textarea>
    </div>
</article>
<article>
    <div>
        <label for="codePostal">Code Postal</label>
        <input type="text" id="codePostal" name="codePostal" required>
        <label for="ville">Ville</label>
        <input type="text" id="ville" name="ville" required>
    </div>
    <div>
        <h3 id="message"></h3>
    </div>
    <div>
        <span>
            <button id="submitBtn" class="bouton">Envoyer</button>
        </span>
    </div>
</article>