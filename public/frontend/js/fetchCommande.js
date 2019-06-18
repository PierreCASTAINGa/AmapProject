const userId = document.querySelector('#header').getAttribute('userid');
const userName = document.querySelector('#header').getAttribute('nameuser');

// let donnees = JSON.parse(localStorage.getItem('contrats'));

//             let display = `
//             <p>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</p>
//             <h2>Saisir mes chèques - valider ma commande</h2>
//             <p>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</p>`;

//             let titreCat = `<span></span>`;
//             let ncheque = 0;
//             let nbd = donnees.length
//             let nch = 0;

//                 for (let w = 0; w < nbd; w++) {

//                 display += `<div class="contratCat">`

//                 let Totals = 0;

//                 let nb = donnees[w].categorie.length;

//                     for (let y = 0; y < nb; y++) {

//                         if(donnees[w].categorie[0].Commande) {

//                             document.querySelector('.validerCommande').disabled = true;
//                         }

//                     titreCat = `<span>${donnees[w].categorie[y].Nom_Categorie}</span>`;
//                     ncheque = donnees[w].categorie[y].Nbre_cheque;
//                     nch = parseInt(ncheque) + 1;

//                     display +=
//                         `<table class="pdtCat" nomSupCat="${donnees[w].categorie[y].Nom_SuperCategorie}" nomCat="${donnees[w].categorie[y].Nom_Categorie}" idCat="${donnees[w].categorie[y].id_Categorie}" ncheque="${donnees[w].categorie[y].Nbre_cheque}">
                   
//                     <tr>
//                     <td class="qte" namePdt="${donnees[w].categorie[y].nom_produit}" idPdt="${donnees[w].categorie[y].id_produit}">${donnees[w].categorie[y].quantite}</td>
//                     <td class="nomPdt">${donnees[w].categorie[y].nom_produit}</td>
//                     <td class="totalCat"><input type="number" value="${donnees[w].categorie[y].total}" readonly></td>
                    
//                     </tr>
//                     </table>`

//                     Totals += parseFloat(donnees[w].categorie[y].total);
//                     }

//                     display +=
//                         `<table class="pdtCatTotals">
//                <tr class="tabgTotal">
//                <td class="titreCat" colspan="3">${titreCat}</td> 
//                <td class="gTotal" colspan="1"><input class="gTotal" type="number" value="${parseFloat(Totals).toFixed(2)}" readonly></td>
//                </tr>
//                </table>`

//                display += `<table class="Cheque"><tr>`
            
//                 display += `<td>
//                 <p><select class="selct" onchange="select(this)">
//                 <option value="Nbre_Cheque">Nbre de chèque</option>`

//                 for (let l = 1; l < nch; l++) {

//                     if (nch) {
//                         display += `<option value="${l}" selected>${l}</option>`
//                     } else {
//                         display += `<option value="${l}">${l}</option>`   
//                     }
//                 }
                
//                 display += `</select></p>`

//                 display += `<div class="listeCheque">`

//                 for (let p = 0; p < ncheque; p++) {

//                 display += `<p class="commandCheqNone"><span>Nom de la banque / n° du chèque</span><input type="text" name="nombanque" value="${donnees[w].Cheques[p].nom_Bq}">
//                 <input type="text" name="nocheque" value="${donnees[w].Cheques[p].no_Cheq}"><input type="number" value="${parseFloat(donnees[w].Cheques[p].montant_Cheq).toFixed(2)}" name="total" readonly></p>`
//                 }
//                 display += `<p class="commandCheqNone, tot"><input type="number" value="${parseFloat(Totals).toFixed(2)}" name="Totals" readonly></p>`
                
//                 display += `</div></td></tr></table>`
               
//                 display += `</div>`
//             }

//             document.querySelector('#content-contrat-intra').innerHTML = display;

class GetLocalStorage {

    constructor (donnees) {
        this.donnees = donnees;
        this.afficher();
    }


    afficher() {

            let display = `
            <p>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</p>
            <h2>Mes contrats par Catégorie</h2>
            <p>-----------------------------------------------------</p>
            <h2>Ajouter, modifier, supprimer mes contrats et leurs produits</h2>
            <p>~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~</p>`;

            let titreCat = `<span></span>`;
            let ncheque = 0;
            let nch = 0;

                for (let w = 0; w < this.donnees.length; w++) {

                display += `<div class="contratCat">`

                let Totals = 0;

                let nb = parseInt(this.donnees[w].categorie.length);

                    for (let y = 0; y < nb; y++) {

                        if(this.donnees[w].categorie[0].Commande) {

                            document.querySelector('.validerCommande').disabled = true;
    
                            }

                    titreCat = `<span>${this.donnees[w].categorie[y].Nom_Categorie}</span>`;
                    ncheque = this.donnees[w].categorie[y].Nbre_cheque;
                    nch = parseInt(ncheque) + 1;

                    display +=
                        `<table class="pdtCat" nomSupCat="${this.donnees[w].categorie[y].Nom_SuperCategorie}" nomCat="${this.donnees[w].categorie[y].Nom_Categorie}" idCat="${this.donnees[w].categorie[y].id_Categorie}" ncheque="${this.donnees[w].categorie[y].Nbre_cheque}">
                    <tr>
                    <td class="qte" namePdt="${this.donnees[w].categorie[y].nom_produit}" idPdt="${this.donnees[w].categorie[y].id_produit}">${this.donnees[w].categorie[y].quantite}</td>
                    <td class="nomPdt">${this.donnees[w].categorie[y].nom_produit}</td>
                    <td class="totalCat"><input type="number" value="${parseFloat(this.donnees[w].categorie[y].total).toFixed(2)}" readonly></td>
                    </tr>
                    </table>`

                    Totals += parseFloat(this.donnees[w].categorie[y].total);
                 }

                display +=
                    `<table class="pdtCatTotals">
                <tr class="tabgTotal">
                <td class="titreCat" colspan="3">${titreCat}</td> 
                <td class="gTotal" colspan="1"><input class="gTotal" type="number" value="${parseFloat(Totals).toFixed(2)}" readonly></td>
                </tr>
                </table>`

                
                display += `<table class="Cheque"><tr>`
            
                display += `<td>
                <p style="display:none"><select class="selct" onchange="select(this)">
                <option value="Nbre_Cheque">Nbre de chèque</option>`

                // for (let l = 1; l < nch; l++) {

                //     if (nch) {
                //         display += `<option value="${l}" selected>${l}</option>`
                //     } else {
                //         display += `<option value="${l}">${l}</option>`
                //     }
                // }
                
                // display += `</select></p>`

                // display += `<div class="listeCheque">`

                // for (let p = 0; p < ncheque; p++) {

                // display += `<p class="commandCheqNone"><span>Nom de la banque / n° du chèque</span><input type="text" name="nombanque" value="${this.donnees[w].Cheques[p].nom_Bq}">
                // <input type="text" name="nocheque" value="${this.donnees[w].Cheques[p].no_Cheq}"><input type="number" value="${this.donnees[w].Cheques[p].montant_Cheq}" name="total" readonly></p>`
                // }

                 // for (let l = 1; l < nch; l++) {
                    let c = 0;
                    for (let t = 0; t < ncheque; t++) {

                        if (this.donnees[w].Cheques[t].nom_Bq != 0) {
                            c += 1;
                        }
                    }

                    if (c > 0) {
                        for (let l = 1; l < nch; l++) {
                            if (l == c) {
                                display += `<option value="${l}" selected>${l}</option>`
                            } else {
                                display += `<option value="${l}">${l}</option>`
                            }
                        }
                    } else {
                        for (let l = 1; l < nch; l++) {
                            display += `<option value="${l}">${l}</option>`
                        }
                    }

                    // display += `<option value="${l}">${l}</option>`
                    // }
                    
                    display += `</select></p>`
    
                    display += `<div class="listeCheque">`
    
                    // for (let p = 0; p < ncheque; p++) {

                        if (c > 0) {

                            for (let d = 0; d < c; d++) {
                                display += `<p class="commandCheqNone"><span>Nom de la banque / n° du chèque</span><input type="text" name="nombanque" value="${this.donnees[w].Cheques[d].nom_Bq}">
                                <input type="text" name="nocheque" value="${this.donnees[w].Cheques[d].no_Cheq}"><input type="number" value="${this.donnees[w].Cheques[d].montant_Cheq}" name="total" readonly></p>`
                            }
                            let res = ncheque - c;
                            for (let v = c; v < res + c; v++) {
                                display += `<p class="contratCheqNone"><span>Nom de la banque / n° du chèque</span><input type="text" name="nombanque" value="${this.donnees[w].Cheques[v].nom_Bq}">
                                <input type="text" name="nocheque" value="${this.donnees[w].Cheques[v].no_Cheq}"><input type="number" value="${this.donnees[w].Cheques[v].montant_Cheq}" name="total" readonly></p>`
                            }
                        } else {

                            for (let p = 0; p < ncheque; p++) {

                                display += `<p class="contratCheqNone"><span>Nom de la banque / n° du chèque</span><input type="text" name="nombanque" value="${this.donnees[w].Cheques[p].nom_Bq}">
                                <input type="text" name="nocheque" value="${this.donnees[w].Cheques[p].no_Cheq}"><input type="number" value="${this.donnees[w].Cheques[p].montant_Cheq}" name="total" readonly></p>`
                            }
                        }

                display += `<p class="commandCheqNone, tot"><input type="number" value="${parseFloat(Totals).toFixed(2)}" name="Totals" readonly></p>`
                
                // display += `<p class="saveCheques"><a href="#" title="enregistrer la saisie de vos chèques">enregistrer les chèques</a></p>`
                
                display += `</div></td></tr></table>`
                
                display += `</div>`

            }

            document.querySelector('#content-contrat-intra').innerHTML = display;
    }
}
    const getContratsList = new GetLocalStorage(JSON.parse(localStorage.getItem('contrats')));

            // ####### supprimer un produit d'un contrat ########

            document.querySelectorAll('.supprimer').forEach(
                elt => elt.addEventListener('click', () => {

                    let p = elt.parentElement.parentElement.parentElement.parentElement.parentElement.childElementCount - 2;
                    console.log(p);

                    let tot = parseFloat(elt.parentElement.previousElementSibling.firstChild.value).toFixed(2);
                    let u = parseFloat(elt.parentElement.parentElement.parentElement.parentElement.parentElement.children[p].firstElementChild.firstElementChild.lastElementChild.firstElementChild.value).toFixed(2);

                    elt.parentElement.parentElement.parentElement.parentElement.parentElement.children[p].firstElementChild.firstElementChild.lastElementChild.firstElementChild.value = parseFloat(u - tot).toFixed(2);

                    let tr = elt.parentElement.parentElement.parentElement.parentElement;
                    let r = tr.parentElement;

                    if (r.childElementCount == 3) {
                        r.remove(r);
                    } else {
                        tr.parentElement.removeChild(tr);
                    }
                })
            )

function select(elt) {

    let chcount = elt.parentElement.nextElementSibling.childElementCount - 2;

    let nb = elt.selectedOptions[0].value;
    let kl = parseInt(nb) - 1;

    for (let d = 0; d < chcount; d++) {

        elt.parentElement.nextElementSibling.children[d].style.display = 'none';
    }


    for (let f = 0; f < nb; f++) {

        elt.parentElement.nextElementSibling.children[f].style.display = 'block';
    }

    let tot = elt.parentElement.nextElementSibling.children[chcount].children[0].value;
    let rest = parseFloat(tot % nb).toFixed(2);

    if (rest == 0) {
        let diviser = tot / nb;

        for (let f = 0; f < nb; f++) {
            elt.parentElement.nextElementSibling.children[f].children[3].value = diviser;
        }

    } else {

        let totalCorrige = parseFloat(tot - rest).toFixed(2);
        let divise = parseFloat(totalCorrige / nb).toFixed(2);

        for (let f = 0; f < kl; f++) {
            elt.parentElement.nextElementSibling.children[f].children[3].value = divise;
        }

        let m = parseFloat(divise) + parseFloat(rest);
        elt.parentElement.nextElementSibling.children[kl].children[3].value = parseFloat(m).toFixed(2);
    }

    elt.parentElement.nextElementSibling.children[chcount].style.display = 'block';
    elt.parentElement.nextElementSibling.lastElementChild.style.display = 'block';
}

    

function saveCommande() {

    // event.preventDefault();

    let nbrecontratCat = document.querySelectorAll('.contratCat').length;
    console.log(nbrecontratCat);

    if (nbrecontratCat == 0) {
        let jsonData = '';
        let inputJson = document.querySelector('.jsonFile');
        inputJson.value = jsonData;
        return;
    }

    console.log(`ceci est le nbr de produits : ${nbrecontratCat} `);

    let saveData = [];
    let saveDat = [];
    let ListeCheq = [];

    for (let p = 0; p < nbrecontratCat; p++) {

        let contr = document.querySelectorAll('.contratCat')[p];
        let nbPdt = contr.childElementCount - 2;
        let nbCheq = contr.lastElementChild.children[0].children[0].children[0].children[1].childElementCount - 2;

        if (saveData != 0) {
            saveDat.push({
                'categorie': saveData,
                'Cheques': ListeCheq
            })
        }

        saveData = [];
        ListeCheq = [];

        let nomBq = '';
        let noCheq = '';
        let mtCheq = 0;

        for (let k = 0; k < nbPdt; k++) {

            let nomSupCat = contr.children[k].getAttribute('nomSupCat');
            let nomCat = contr.children[k].getAttribute('nomCat');
            let idCat = contr.children[k].getAttribute('idCat');
            let nCheque = contr.children[k].getAttribute('ncheque');

            let qtite = contr.children[k].children[0].children[0].children[0].textContent;
            let nomPdt = contr.children[k].children[0].children[0].children[0].getAttribute('namePdt');

            let idPdt = contr.children[k].children[0].children[0].children[0].getAttribute('idPdt');
            let totalCat = contr.children[k].children[0].children[0].children[2].children[0].value;
        
                saveData.push({

                    'Commande': 'locked',
                    'Nom_user': userName,
                    'Id_user': userId,
                    'Nom_SuperCategorie': nomSupCat,
                    'Nom_Categorie': nomCat,
                    'id_Categorie': idCat,
                    'Nbre_cheque': nCheque,
                    'quantite': qtite,
                    'nom_produit': nomPdt,
                    'id_produit': idPdt,
                    'total': parseFloat(totalCat).toFixed(2),
                })
            }

            for (let v = 0; v < nbCheq; v++) {

                nomBq = contr.lastElementChild.children[0].children[0].children[0].children[1].children[v].children[1].value;
                noCheq = contr.lastElementChild.children[0].children[0].children[0].children[1].children[v].children[2].value;
                mtCheq = parseFloat(contr.lastElementChild.children[0].children[0].children[0].children[1].children[v].children[3].value).toFixed(2);

                ListeCheq.push({
                    'nom_Bq': nomBq,
                    'no_Cheq': noCheq,
                    'montant_Cheq': mtCheq
                })
             }

        }
        if (saveData != 0) {

        saveDat.push({
            'categorie': saveData,
            'Cheques': ListeCheq  
        })
} 


    localStorage.setItem('contrats', JSON.stringify(saveDat));
    let jsonData = JSON.stringify(saveDat);
    document.querySelector('.jsonFile').value = jsonData;
    document.querySelector('.jsonFileUser').value = jsonData;

}
document.querySelector('.validerCommande').addEventListener('click', saveCommande);