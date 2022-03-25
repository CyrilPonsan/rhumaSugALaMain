export default class Achat {

    nom;
    quantite;
    prixTotal;

    constructor(nom, quantite, prixTotal) {
        this.nom = nom;
        this.quantite = quantite;
        this.prixTotal = prixTotal;
    }

    afficherAchat() {
        const tr = document.createElement('tr');
        tr.classList = "detailVente";
        const datas =
        [
            this.nom,
            this.quantite,
            this.prixTotal
        ];
        for (let i = 0; i < datas.length; i++) {
            const td = document.createElement('td');
            td.innerText = datas[i];
            if (i === 1) {
                td.innerText = "x " + datas[i];
            }
            if (i === 2) {
                td.innerText = td.innerText;
            }
            tr.appendChild(td);
        }
        
        return tr;
    }
}