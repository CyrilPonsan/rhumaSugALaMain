import * as navbar from "./navbar.js";

const createAccountBtn = document.querySelector('#createAccountBtn');
const loginBtn = document.querySelector('#loginBtn');

navbar.deconnexion();

createAccountBtn.addEventListener('click', () => {
    window.location.href = "accountCreation.php";
});

loginBtn.addEventListener('click', () => {
    window.location.href = "login.php";
});