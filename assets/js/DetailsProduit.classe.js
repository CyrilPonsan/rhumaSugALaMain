import { pathImg } from "./data.js";

export default class DetailsProduit {

    idProduit;
    nomProduit;
    descriptionProduit;
    prixProduit;
    urlProduit;
    formatter;

    constructor(id, nom, description, prix, url) {

        this.idProduit = id;
        this.nomProduit = nom;
        this.descriptionProduit = description;
        this.prixProduit = prix;
        this.urlProduit = url;
    }

    afficherDetails() {
        document.querySelector('#nom').innerText = this.nomProduit;
        document.querySelector('#img').src = pathImg + this.urlProduit;
        document.querySelector('#description').innerText = this.descriptionProduit;
        document.querySelector('#prix').innerText = "Prix unitaire : " + this.prixProduit + " €";
        document.querySelector('#prixTotal').innerText = "Prix total : " + this.prixProduit + " €";

    }

}