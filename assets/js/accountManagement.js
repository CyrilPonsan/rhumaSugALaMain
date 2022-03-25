import { phpScripts } from './data.js';
import { postData } from './fetchData.js';
import * as navbar from './navbar.js';
import { displayLogs, fermerDetailsAchats, setTab, displayAdresse, testEmail, clickVente, emailOk } from './_accountManagement.js';
import { validateForm } from './_newAccount.js';
import { affichePopup } from './popup.js';

const ventes = document.querySelectorAll('section:nth-child(2) > article > div');
const articles = document.querySelectorAll('section:nth-child(1) > article');
const titresArticles = document.querySelectorAll('section:nth-child(1) > article > div:nth-child(1) > h2');
let status = null;
let tab = 0;
let email;
const submitBtn = document.querySelector('#submitBtn');
const submitLogsBtn = document.querySelector('#continuerBtn');

titresArticles[0].style.borderBottom = "solid black 2px";
navbar.deconnexion();

document.querySelector('#formulaire > div:nth-child(1) > h3').textContent = "Mise à jour des informations de connexion";

document.querySelector('section:nth-child(2) > h2').innerText = "Historique des achats de " + sessionStorage.getItem('logged');

ventes.forEach((vente) => {
    vente.addEventListener('click', function () {
        status = clickVente(this, status);
    });
});

for (let i = 0; i < articles.length; i++) {
    articles[i].addEventListener('click', async () => {
        setTab(titresArticles, tab, i);
        tab = i;
        if (i == 0) {
            if (status !== null) {
                fermerDetailsAchats(status);
            }
        } else if (i == 1) {
            displayAdresse();
        } else if (i == 2) {
            email = await displayLogs();
        }
    });
}

submitBtn.addEventListener('click', async () => {
    const message = document.querySelector('#message');
    let data = [
        "updateAdresse"
    ];
    validateForm(5).forEach((element) => {
        data.push(element);
    });
    console.log(data);
    if (data.length == 6) {
        const result = await postData(phpScripts + 'script.php', data);
        console.log('result ', result);
        affichePopup("Adresse mise à jour", "Fermer", "Accueil");
        sessionStorage.setItem('logged', document.querySelector('#prenom').value);
    } else {
        message.innerText = "Un des champs est mal rempli.";
    }
});

submitLogsBtn.addEventListener('click', async () => {
    document.querySelector('#msge').textContent = "";
    const newEmail = document.querySelector('#inputEmail').value;
    let result;
    let msg;
    if(email !== newEmail && await testEmail()) {
        email = newEmail;
        result = emailOk(newEmail);
    } else {
        email = newEmail;
        result = emailOk(newEmail);
    }
    if (result) {
        msg = "Informations mises à jour";
    } else {
        msg = "Un problème est survenu, reessayer";
    }
    affichePopup(msg, "Fermer", "Accueil");
});

