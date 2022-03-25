export function testPanier(result) {
    const titre = document.querySelector('#titre');
    const retourBtn = document.querySelector('#retourBtn');
    if (result === false) {
        titre.innerText = "Panier vide";
        retourBtn.style.display = "flex";
        retourBtn.addEventListener('click', () => {
            window.location.href = "index.php";
        });
        document.querySelector('section:nth-child(2)').style.display = "none";
    } else {
        document.querySelector('section:nth-child(2)').style.display = "flex";
        titre.innerText = "Contenu du panier de " + sessionStorage.getItem('logged');
    }
}