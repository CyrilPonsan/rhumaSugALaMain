import { postData } from './fetchData.js';
import * as navbar from './navbar.js';
import { addToCart, addToCartUnLogged, afficherInfosPanier, closeDetails, getDetails, setTotal } from './_main.js';
import { phpScripts } from './data.js';

const produits = document.querySelectorAll('.produit');
const detailsProduit = document.querySelector('.detailsProduit');
const addToCartBtn = document.querySelector('#addToCartBtn');
const closeBtn = document.querySelector('#closeBtn');
const quantite = document.querySelector('#quantite');
let produit;

quantite.readOnly = true;

if (sessionStorage.getItem('id') !== null) {
    sessionStorage.removeItem('id');
}

if (sessionStorage.getItem('logged') === null) {
    const result = await postData(phpScripts + 'script.php', ["resetPanier"]);
    console.log(result);
}

navbar.deconnexion();

if (sessionStorage.getItem('ajout') === "true") {
    afficherInfosPanier();
}

produits.forEach((element) => {
    element.addEventListener('click', async function() {
       produit = await getDetails(detailsProduit, this.id);
       if (sessionStorage.getItem('id') !== null) {
           document.getElementById(sessionStorage.getItem('id')).style.display = "flex";
       }
       quantite.value = 1;
       document.getElementById(this.id).style.display = "none";
       sessionStorage.setItem('id', this.id);
    });
});

addToCartBtn.addEventListener('click', () => {
    console.log(sessionStorage.getItem('logged'));
    if (sessionStorage.getItem('logged') === null) {
        console.log("Vous n'êtes pas connecté");
        addToCartUnLogged();
    } else {
        addToCart();
    }
});

closeBtn.addEventListener('click', () => {
    closeDetails();
});


minusBtn.addEventListener('click', () => {
    if (quantite.value > 1) {
        quantite.value--;
        console.log('qtite ', quantite.value);
        setTotal(produit.prixProduit);
    }
});

plusBtn.addEventListener('click', () => {
    quantite.value++;
    console.log('qtite ', quantite.value);
    setTotal(produit.prixProduit);
});