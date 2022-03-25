import { postData } from "./fetchData.js";
import { testPanier } from "./_panier.js";
import * as navbar from "./navbar.js";
import { phpScripts } from "./data.js";
import { closePopup } from "./popup.js";

const viderBtn = document.querySelector('#viderBtn');
const suppBtn = document.querySelectorAll('.supprimerBtn');
const cmdBtn = document.querySelector('#commanderBtn');
const leftBtn = document.querySelector('#leftBtn');
const rightBtn = document.querySelector('#rightBtn');
const ecran = document.querySelector('section:nth-child(3');
const popup = document.querySelector('#popup');

leftBtn.innerText = "Annuler";
rightBtn.innerText = "Confirmer";

navbar.deconnexion();

let data = ["checkPanier"];
const result = await postData(phpScripts + 'script.php', data);
console.log('check ', result);

testPanier(result);

for (let i = 0; i < suppBtn.length; i++) {
    suppBtn[i].id = i;
    suppBtn[i].addEventListener('click', async function () {
        let data = [
            "suppArticle",
            this.id
        ];
        console.log('this ', this.id);
        const result = await postData(phpScripts + 'script.php', data);
        console.log('resultat ', result);
        window.location.href = "panier.php";
    });
}

viderBtn.addEventListener('click', async () => {
    let data = [
        "resetPanier"
    ];
    const result = await postData(phpScripts + 'script.php', data);
    console.log('result', result);
    navbar.setIconePanier();
    testPanier(false);
});

cmdBtn.addEventListener('click', async () => {
    let data = [
        "nbreArticles"
    ];
    const nbreArticles = await postData(phpScripts + 'script.php', data);
    data = [
        "totalPanier"
    ];
    const prixTotal = await postData(phpScripts + 'script.php', data);
    ecran.style.display = "flex";
    popup.style.display = "flex";
    popup.querySelector('h2').innerText = "Confirmez l'achat de :";
    popup.querySelector('span').innerText = nbreArticles + " article(s) pour un total de : " + prixTotal;
});

leftBtn.addEventListener('click', () => {
    closePopup(ecran, popup);
});

rightBtn.addEventListener('click', async () => {
    let data = [
        "vente"
    ];
    const vente = await postData(phpScripts + 'script.php', data);
    closePopup(ecran, popup);
    window.location.href = "panier.php";
});