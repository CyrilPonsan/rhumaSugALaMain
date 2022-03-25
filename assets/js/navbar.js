import { postData } from "./fetchData.js";
import { phpScripts } from "./data.js";

export const li = document.querySelectorAll('nav > div:nth-child(2) > ul:nth-child(1) > li');
export const page = document.querySelector('#page').value;
export const logOut = document.querySelector('#logOut')

export function logTest() {

}

export function deconnexion() {
    logOut.addEventListener('click', async () => {
        let data = [
            "logout"
        ];
        const result = await postData(phpScripts + 'script.php', data);
        sessionStorage.removeItem('logged');
        if (page === "3" || page === "4") {
            window.location.href = "index.php";
        }
        console.log('deco ', result);
        pageActive();
    });
    pageActive();
}

export async function setIconePanier() {
    const panierContent = document.querySelector('.panier');
    let data = [
        "nbreArticles"
    ];
    const articles = await postData(phpScripts + 'script.php', data);
    if(articles === 0) {
        panierContent.style.display = "none";
    } else {
        panierContent.style.display = "flex";
        panierContent.innerText = articles;
    }
}

export function pageActive() {
    li[page].id = "active";
    if (sessionStorage.getItem('logged') !== null) {
        document.querySelector('ul > li:nth-child(6)').style.display = "flex";
        document.querySelector('ul > li:nth-child(4) > a').innerText = sessionStorage.getItem('logged');
    } else {
        document.querySelector('ul > li:nth-child(4) > a').innerText = "";
        document.querySelector('ul > li:nth-child(6)').style.display = "none";
    }
    setIconePanier();
}