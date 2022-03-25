import { regexMail, regexAddress, regexName, regexNumbers, regexPasswd, phpScripts } from "./data.js";
import { testField } from './_login.js';
import { postData } from "./fetchData.js";
import { closePopup } from "./popup.js";

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
        console.log('response', response);
        if (response === false) {
            testPasswd();
            inputEmail.readOnly = true;
        } else {
            message.innerText = "Email indisponible";
        }
    } else {
        message.innerText = "Email non conforme.";
    }
}

export function afficheAdresse(form) {
    const formAdresse = document.querySelector('.formAdresse');
    const submitBtn = document.querySelector('#submitBtn');
    const message = document.querySelector('#message');

    form.remove();
    formAdresse.style.display = "flex";

    submitBtn.addEventListener('click', async () => {
        let i = 5;  // i est le nombre de champs à vérifier
        const datas = [
            "client"
        ];
        validateForm(i).forEach((element) => {
            datas.push(element);
        });
        console.log('length ', datas.length);
        if (datas.length === (i + 1)) {
            datas.push(sessionStorage.getItem('email'));
            datas.push(sessionStorage.getItem('passwd'));
            let response = await postData(phpScripts + 'script.php', datas);
            console.log('client ', response);
            afficheReponse(response);
        } else {
            message.innerText = "Un des champs est mal rempli.";
        }
    });
}

export function validateForm(nbre) {
    const input = document.querySelectorAll('input');
    const textArea = document.querySelector('textarea');
    const checkFields = [];
    for (let i = 1; i < nbre; i++) {
        if (input[i].name !== "codePostal") {
            if (testField(regexName, input[i])) {
                checkFields.push(input[i].value);
            }
        }
        else {
            if(testField(regexNumbers, input[i]) && input[i].value !== "") {
                checkFields.push(input[i].value);
            } else {
                input[i].style.border = "red solid 2px"};
        }   
    }
    if(testField(regexAddress, textArea)) {
        checkFields.push(textArea.value);
    }
    return checkFields;
}

function afficheReponse(data) {
    const ecran = document.querySelector('#ecran');
    const popup = document.querySelector('#popup');
    const leftBtn = document.querySelector('#leftBtn');
    const rightBtn = document.querySelector('#rightBtn');
    const msg = document.querySelector('#msg');
    ecran.style.display = "flex";
    popup.style.display = "flex";
    leftBtn.remove();
    rightBtn.innerText = "Retour à l'accueil";
    msg.innerText = "Bienvenue " + data.prenom;
    sessionStorage.setItem('logged', data.prenom);
    rightBtn.addEventListener('click', () => {
        closePopup(ecran, popup);
        window.location.href = "index.php";
    });
}

export function testPasswd() {
    const inputPasswd = document.querySelector('#inputPasswd');
    const inputCfrmPasswd = document.querySelector('#inputCfrmPasswd');
    const form = document.querySelector('#formulaire');
    const message = document.querySelector('#msge');
    const validatePasswd = testField(regexPasswd, inputPasswd);
    if (validatePasswd) {
        if (inputPasswd.value === inputCfrmPasswd.value) {
            sessionStorage.setItem('email', inputEmail.value);
            sessionStorage.setItem('passwd', inputPasswd.value);
            document.querySelector('section:nth-child(1)').style.display = "none";
            afficheAdresse(form);
        } else {
            message.innerText = "Les mots de passe ne correspondent pas.";
        }
    } else {
        message.innerText = "Mot de passe non conforme.\nLe mot de passe doit comporter 8 caractères, une majuscule, un chiffre et un caractère spécial."
    }
} 