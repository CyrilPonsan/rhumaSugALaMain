export function affichePopup(message, leftTxt, rightTxt) {
    const popup = document.querySelector('.popup');
    const titre = popup.querySelector('h2');
    const ecran = document.querySelector('main > section:nth-child(5)');
    const leftBtn = document.querySelector('#leftBtn');
    const rightBtn = document.querySelector('#rightBtn');
    titre.innerText = message;
    popup.style.display = "flex";
    ecran.style.display = "flex";
    leftBtn.innerText = leftTxt;
    rightBtn.innerText = rightTxt;
    leftBtn.addEventListener('click', () => {
        closePopup(ecran, popup);
    });
    rightBtn.addEventListener('click', () => {
        window.location.href = "index.php";
    });
}

export function closePopup(ecran, popup) {
    ecran.style.display = "none";
    popup.style.display = "none";
}