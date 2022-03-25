import { closePopup } from "./popup.js";

export function testField(reg, input) {
    if (reg.test(input.value)) {
        input.style.border = "green solid 2px";
        return true;
    } else {
        input.style.border = "red solid 2px";
        return false;
    }
}

export function testResponse(result) {
    const formulaire = document.querySelector('#formulaire');
    const message = document.querySelector('#message');

    if (result === "false") {
        message.innerText = "Aucun compte enregistré avec cet email.";
        sessionStorage.removeItem('logged');
    } else if (result === "Login failure") {
        message.innerText = "Mot de passe incorrect, essayez à nouveau.";
        sessionStorage.removeItem('logged');
    }
    else {
        const popup = document.querySelector('#popup');
        const ecran = document.querySelector('#ecran');
        const msg = document.querySelector('#msg');
        const leftBtn = document.querySelector('#leftBtn');
        const rightBtn = document.querySelector('#rightBtn');
        popup.style.display = "flex";
        ecran.style.display = "flex";
        msg.innerHTML = "Bienvenue " + result;
        document.querySelector('section:nth-child(1)').style.display = "none";
        sessionStorage.setItem('logged', result);
        leftBtn.remove();
        rightBtn.textContent = "Retour à l'accueil";
        rightBtn.addEventListener('click', () => {
            closePopup(ecran, popup);
            window.location.href = "index.php";
        });
    }
}