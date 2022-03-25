import DetailsProduit from './DetailsProduit.classe.js';
import { postData } from './fetchData.js';
import { setIconePanier } from './navbar.js';
import { phpScripts, pathImg } from './data.js';
import { closePopup } from './popup.js';

export async function getDetails(detailsProduit, id) {
    const catalogue = document.querySelector('main > section:nth-child(2)');
    let data =
        ["detailsProduit",
            id];
    const response = await postData(phpScripts + 'script.php', data);
    const tmp = response[0];
    const produit = new DetailsProduit(
        tmp.idProduit,
        tmp.nomProduit,
        tmp.descriptionProduit,
        tmp.prixProduit,
        tmp.urlProduit
    );
    detailsProduit.style.display = "flex";
    catalogue.style.width = "50%";
    produit.afficherDetails();
    return produit;
}

export function addToCartUnLogged() {
    const ecran = document.querySelector('section:nth-child(3');
    const popup = document.querySelector('#addToCart');
    const leftBtn = document.querySelector('#leftBtn');
    const rightBtn = document.querySelector('#rightBtn');
    ecran.style.display = "block";
    popup.style.display = "flex";
    leftBtn.innerText = "Annuler";
    rightBtn.innerText = "Se Connecter";
    popup.querySelector('h2').innerText = "Vous n'êtes pas connecté";
    leftBtn.addEventListener('click', () => {
        closePopup(ecran, popup);
    });
    rightBtn.addEventListener('click', async () => {
        const details =
            [
                "ajoutPanier",
                sessionStorage.getItem('id'),
                document.querySelector('#quantite').value
            ];
        const result = await postData(phpScripts + 'script.php', details);
        sessionStorage.setItem('ajout', "true");
        window.location.href = "compte.php";
        closePopup(ecran, popup);
    });
}

export async function addToCart() {
    /*
    const ecran = document.querySelector('section:nth-child(3');
    const popup = document.querySelector('#addToCart');
    */
    const vente =
        [
            "ajoutPanier",
            sessionStorage.getItem('id'),
            document.querySelector('#quantite').value,
        ];
    const result = await postData(phpScripts + 'script.php', vente);
    /*
    ecran.style.display = "block";
    popup.style.display = "flex";
    popup.querySelector('h2').innerText = "Article(s) ajouté(s) au panier";
    sessionStorage.removeItem('prix');
    leftBtn.addEventListener('click', () => {
        closeDetails();
        setIconePanier();
        closePopup(ecran, popup);
    });
    rightBtn.addEventListener('click', () => {
        window.location.href = "panier.php";
    });
    */
    if (result) {
        setIconePanier();
        closeDetails();
    }
}

export function closeDetails() {
    const detailsProduit = document.querySelector('.detailsProduit');
    const catalogue = document.querySelector('main > section:nth-child(2)');

    catalogue.style.width = "75%";
    detailsProduit.style.display = "none";
    document.getElementById(sessionStorage.getItem('id')).style.display = "flex";
}

export function afficherInfosPanier() {
    const ecran = document.querySelector('section:nth-child(3');
    const popup = document.querySelector('#addToCart');
    ecran.style.display = "flex";
    popup.style.display = "flex";
    popup.querySelector('h2').innerText = "Un article a été ajouté au panier";
    sessionStorage.removeItem('ajout');
    leftBtn.addEventListener('click', () => {
        setIconePanier();
        closePopup(ecran, popup);
    });
    rightBtn.addEventListener('click', () => {
        window.location.href = "panier.php";
    });

}

export function setTotal(prixProduit) {
    const formatter = new Intl.NumberFormat('fr-FR', {
        style: 'currency',
        currency: 'EUR'
    });
    const total = document.querySelector('#prixTotal');
    const quantite = document.querySelector('#quantite');
    let tmp = prixProduit * parseInt(quantite.value, 10);
    console.log('tmp ', prixProduit);
    let prixTotal = formatter.format(tmp);
    total.innerText = "Prix total : " + prixTotal;
}