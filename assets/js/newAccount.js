import { testEmail, testPasswd } from './_newAccount.js';
import * as navbar from './navbar.js';

const message = document.querySelector('#message');
const continuerBtn = document.querySelector('#continuerBtn');

navbar.deconnexion();

document.querySelector('#formulaire > div:nth-child(1) > h3').textContent = "Créer un compte";

continuerBtn.addEventListener('click', async () => {
    if (await testEmail()) {
        testPasswd();
    }
});
