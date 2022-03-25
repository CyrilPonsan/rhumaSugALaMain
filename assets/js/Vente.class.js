export default class Vente {

    idVente;
    dateVente;

    constructor(id, date) {
        this.idVente = id;
        this.dateVente = date;
    }

    displayVente() {
        const table = document.createElement('table');
        const thead = document.createElement('thead');
        const tr = document.createElement('tr');
        const datas = ["date", "nbreArticles", "prixTotal"];
        table.appendChild(thead);
        thead.appendChild(tr);
        for (let i = 0; i < 3; i++) { 
            const th = document.createElement('th'); 
            th.innerText = datas[i];     
            tr.append(th);
        }
        document.querySelector('section:nth-child(2)').appendChild(table);        
    }
}