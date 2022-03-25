import { phpScripts, regexMail, regexPasswd } from "./data.js";
import { postData } from "./fetchData.js";
import Achat from './Achat.classe.js';
import { testField } from "./_login.js";

export async function getAchats(id) {
    const data = [
        "detailsVente",
        id
    ];
    console.log('data', data);
    const reponse = await postData(phpScripts + 'script.php', data);
    return reponse;
}

export async function emailOk(email) {
    const passwd = document.querySelector('#inputPasswd').value;
    if (confirmPasswd()) {
        const datas =
            [
                "updateLogins",
                email,
                passwd
            ];
        const result = await postData(phpScripts + 'script.php', datas);
        console.log('result', result);
        return result;
    }};

export function clickVente(vente, status) {
    if (status === null) {
        afficherDetailsAchats(vente);
        status = vente.id
    } else if (status === vente.id) {
        fermerDetailsAchats(status);
        status = null;
    }
    else {
        fermerDetailsAchats(status);
        afficherDetailsAchats(vente);
        status = vente.id;
    }
    return status;
}

export async function afficherDetailsAchats(vente) {
    const reponse = await getAchats(vente.id);
    console.log('achats ', reponse);
    reponse.forEach((el) => {
        const achat = new Achat(el[0], el[1], el[2]);
        vente.querySelector('table > tbody').appendChild(achat.afficherAchat());
    });
}

export function fermerDetailsAchats(id) {
    const table = document.getElementById(id);
    const tr = table.querySelectorAll('.detailVente');
    tr.forEach((el) => {
        el.remove();
    });
}

export function setTab(titre, avant, apres) {
    const sections = document.querySelectorAll('.tabs');
    titre[avant].style.borderBottom = "solid black 0px";
    titre[apres].style.borderBottom = "solid black 2px";
    sections[avant].style.display = "none";
    sections[apres].style.display = "flex";
}

export async function displayAdresse() {
    const client = await postData(phpScripts + 'script.php', ["getClient"]);
    console.log(client);
    const adresse = document.querySelector('textarea');
    const input = document.querySelectorAll('input');
    adresse.value = client.adresse;
    input[1].value = client.nom;
    input[2].value = client.prenom;
    input[3].value = client.codePostal;
    input[4].value = client.ville;
}

export async function displayLogs() {
    const logs = await postData(phpScripts + 'script.php', ["getLogins"]);
    const email = document.querySelector('#inputEmail');
    console.log(logs);
    email.value = logs[0];
    return email.value;
}

export async function testEmail() {
    const inputEmail = document.querySelector('#inputEmail');
    const message = document.querySelector('#msge');
    if (testField(regexMail, inputEmail)) {
        let data = 
        [
            "testEmail",
            inputEmail.value
        ];
        const response = await postData(phpScripts + 'script.php', data);
        if (response === false) {
            console.log('champion');
            return true;
        } else {
            inputEmail.style.border = "solid red 2px";
            console.log('oops');
            message.innerText = "Email indisponible";
            return false;
        }
    } else {
        message.innerText = "Email non conforme.";
        inputEmail.style.border = "solid red 2px";
        console.log('oooops');
        return false;
    }
}

export function confirmPasswd() {
    const inputPasswd = document.querySelector('#inputPasswd');
    const inputCfrmPasswd = document.querySelector('#inputCfrmPasswd');
    if (testField(regexPasswd, inputPasswd)) {
        if (inputPasswd.value === inputCfrmPasswd.value) {
            inputCfrmPasswd.style.border = "solid green 2px";
            return true;
        } else {
            inputCfrmPasswd.style.border = "solid red 2px";
            return false;
        }
    }


}