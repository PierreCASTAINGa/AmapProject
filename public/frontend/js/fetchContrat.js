const userId = document.querySelector('#header').getAttribute('iduser');
const userName = document.querySelector('#header').getAttribute('nameuser');
    
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
    
                                document.querySelector('.validerContrat').disabled = true;
        
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
                        <td class="lienSupp"><button style="cursor:pointer" class="supprimer">supprimer</button></td>
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
                    <tr><td class="ajoutPdt"><button class="btAjouterPdt">ajouter/modifier</button></td></tr>
                    </table>`
    
                    
                    display += `<table class="Cheque"><tr>`
                
                    display += `<td>
                    <p><select class="selct" onchange="select(this)">
                    <option value="Nbre_Cheque">Nbre de chèque</option>`
    
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
                    
                    display += `</select></p>`
    
                    display += `<div class="listeCheque">`

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
                            display += `<p class="commandCheqNone"><input type="number" value="${parseFloat(Totals).toFixed(2)}" name="Totals" readonly></p>`
                    
                            display += `<p class="saveCheques"><a href="#" title="enregistrer la saisie de vos chèques">enregistrer les chèques</a></p>`
                    
                            display += `</div></td></tr></table>`
                    
                            display += `</div>`


                        } else {

                            for (let p = 0; p < ncheque; p++) {

                                display += `<p class="contratCheqNone"><span>Nom de la banque / n° du chèque</span><input type="text" name="nombanque" value="${this.donnees[w].Cheques[p].nom_Bq}">
                                <input type="text" name="nocheque" value="${this.donnees[w].Cheques[p].no_Cheq}"><input type="number" value="${this.donnees[w].Cheques[p].montant_Cheq}" name="total" readonly></p>`
                            }

                            display += `<p class="contratCheqNone, tot"><input type="number" value="${parseFloat(Totals).toFixed(2)}" name="Totals" readonly></p>`
                    
                            display += `<p class="saveCheques"><a href="#" title="enregistrer la saisie de vos chèques">enregistrer les chèques</a></p>`
                    
                            display += `</div></td></tr></table>`
                    
                            display += `</div>`
                        }
                }
    
                document.querySelector('#content-contrat-intra').innerHTML = display;
        }
    }
        const getContratsList = new GetLocalStorage(JSON.parse(localStorage.getItem('contrats')));



// ############################# supprimer un produit ###################################################

        document.querySelectorAll('.supprimer').forEach(
                elt => elt.addEventListener('click',

                function DeletePdt() {  

                let tr = elt.parentElement.parentElement.parentElement.parentElement;
                let r = tr.parentElement;
                let m = r.childElementCount - 2;


                let tot = parseFloat(elt.parentElement.previousElementSibling.firstChild.value).toFixed(2);
                let u = parseFloat(elt.parentElement.parentElement.parentElement.parentElement.parentElement.children[m].firstElementChild.firstElementChild.lastElementChild.firstElementChild.value).toFixed(2);

                elt.parentElement.parentElement.parentElement.parentElement.parentElement.children[m].firstElementChild.firstElementChild.lastElementChild.firstElementChild.value = parseFloat(u - tot).toFixed(2);

                let numch = elt.parentElement.parentElement.parentElement.parentElement.getAttribute('ncheque');
                let jo = elt.parentElement.parentElement.parentElement.parentElement.parentElement.lastElementChild.children[0].children[0].children[0].children[1];

                for (p = 0; p < numch; p++) {

                    jo.children[p].children[1].value = '';
                    jo.children[p].children[2].value = '';
                    jo.children[p].children[3].value = 0;
                    jo.children[numch].children[0].value = 0;
                }

                if (r.childElementCount == 3) {
                    r.remove(r);
                } else {
                    tr.parentElement.removeChild(tr);
                }


                // ####### puis : enregistrer après suppression d'un produit ########

                let nbrecontratCat = document.querySelectorAll('.contratCat').length;

                let saveData = [];
                let saveDat = [];
                let Cheques = [];

                for (let p = 0; p < nbrecontratCat; p++) {

                    let contr = document.querySelectorAll('.contratCat')[p];
                    let nbPdt = contr.childElementCount - 2;
                    let nbCheq = contr.lastElementChild.children[0].children[0].children[0].children[1].childElementCount - 2;


                    if (saveData != 0) {
                        saveDat.push({
                            'categorie': saveData,
                            'Cheques': Cheques
                        })
                    }

                    saveData = [];
                    Cheques = [];

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

                            'Nom_user': userName,
                            'Id_user': userId,
                            'Nom_SuperCategorie': nomSupCat,
                            'Nom_Categorie': nomCat,
                            'id_Categorie': idCat,
                            'Nbre_cheque': nCheque,
                            'quantite': qtite,
                            'nom_produit': nomPdt,
                            'id_produit': idPdt,
                            'total': parseFloat(totalCat).toFixed(2)
                        })
                    }

                    for (let v = 0; v < nbCheq; v++) {

                        nomBq = contr.lastElementChild.children[0].children[0].children[0].children[1].children[v].children[1].value;
                        noCheq = contr.lastElementChild.children[0].children[0].children[0].children[1].children[v].children[2].value;
                        mtCheq = parseFloat(contr.lastElementChild.children[0].children[0].children[0].children[1].children[v].children[3].value).toFixed(2);


                        Cheques.push({
                            'nom_Bq': nomBq,
                            'no_Cheq': noCheq,
                            'montant_Cheq': mtCheq
                        })
                    }

                }
                if (saveData != 0) {

                    saveDat.push({
                        'categorie': saveData,
                        'Cheques': Cheques
                    })
                    localStorage.setItem('contrats', JSON.stringify(saveDat));

                } else {
                    localStorage.removeItem('contrats');
                }
            }
        ));

// #################### bouton ajouter/modifier des produits à un contrat --> open fenêtre ####################
     
    document.querySelectorAll('.btAjouterPdt').forEach(
        elt => elt.addEventListener('click', 

        function OpenWinAjModifPdt(event) {
            event.preventDefault();


            let nb = elt.parentElement.parentElement.parentElement.parentElement.parentElement.childElementCount - 2;
            let pdt = elt.parentElement.parentElement.parentElement.parentElement.parentElement;

            let datas = [];
            for (let n = 0; n < nb; n++) {
                let nSupCat = pdt.children[n].getAttribute('nomsupcat');
                let nCat = pdt.children[n].getAttribute('nomcat');
                let idcat = pdt.children[n].getAttribute('idcat');
                let nbCheq = pdt.children[n].getAttribute('ncheque');
                let r = pdt.children[n].children[0].children[0].children[0];

                datas.push({
                    'nSupCat': nSupCat,
                    'nCat': nCat,
                    'idcateg': idcat,
                    'nbreCheq': nbCheq,
                    'qt': r.innerText,
                    'idpdts': r.getAttribute('idpdt')
                })
            }

            document.querySelector('.noDisplayPdt').style.display = 'block';
            document.querySelector('.noDisplayPdt').style.zIndex = '10';

            document.querySelector('#container').style.opacity = .2;
            document.querySelector('footer').style.opacity = .2;

            document.querySelector('.noDisplayPdt').addEventListener('click', () => {
                shutDownWin(event);
            })
            document.querySelector('.bloc-category-nodisplay').addEventListener('click', stopPropag);


            datas.forEach(categ => {
                let {
                    nSupCat,
                    nCat,
                    idcateg,
                    nbreCheq,
                    qt,
                    idpdts
                } = categ


                document.querySelectorAll('.list-categorie').forEach((elts) => {
                    if (elts.getAttribute('idcat') != idcateg) {
                        elts.classList.add('noDisplay');
                    } else {
                        elts.classList.add('displayCat');
                    }
                });

                let nb = document.querySelectorAll('.displayCat').length;
                for (let y = 0; y < nb; y++) {

                    document.querySelectorAll('.displayCat')[y].setAttribute('nomsupcat', nSupCat);
                    document.querySelectorAll('.displayCat')[y].setAttribute('nomcat', nCat);
                    document.querySelectorAll('.displayCat')[y].setAttribute('nbrecheque', nbreCheq);

                    let i = document.querySelectorAll('.displayCat')[y];
                    let r = document.querySelectorAll('.displayCat')[y].children[0].getAttribute('idpdt');

                    if (r == idpdts) {

                        let prix = parseFloat(i.children[2].children[0].value).toFixed(2);
                        i.children[3].children[1].value = parseInt(qt);
                        i.children[8].children[0].value = parseFloat(qt * prix).toFixed(2);
                    }
                }
            })
        })
    ) 
                                // ######## fin ajouter des pdts à un contrat #######


// ############################# enregistrer les contrats #############################


    function saveContrats() {

        let nbrecontratCat = document.querySelectorAll('.contratCat').length;

        let saveData = [];
        let saveDat = [];
        let Cheques = [];

        for (let p = 0; p < nbrecontratCat; p++) {

            let contr = document.querySelectorAll('.contratCat')[p];
            let nbPdt = contr.childElementCount - 2;
            let nbCheq = contr.lastElementChild.children[0].children[0].children[0].children[1].childElementCount - 2;
            console.log(nbCheq);

            if (saveData != 0) {
                saveDat.push({
                    'categorie': saveData,
                    'Cheques': Cheques
                })
            }

            saveData = [];
            Cheques = [];

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
                // console.log(totalCat);

                saveData.push({

                    'Nom_user': userName,
                    'Id_user': userId,
                    'Nom_SuperCategorie': nomSupCat,
                    'Nom_Categorie': nomCat,
                    'id_Categorie': idCat,
                    'Nbre_cheque': nCheque,
                    'quantite': qtite,
                    'nom_produit': nomPdt,
                    'id_produit': idPdt,
                    'total': parseFloat(totalCat).toFixed(2)
                })
            }

                for (let v = 0; v < nbCheq; v++) {

                nomBq = contr.lastElementChild.children[0].children[0].children[0].children[1].children[v].children[1].value;
                noCheq = contr.lastElementChild.children[0].children[0].children[0].children[1].children[v].children[2].value;
                mtCheq = parseFloat(contr.lastElementChild.children[0].children[0].children[0].children[1].children[v].children[3].value).toFixed(2);

                Cheques.push({
                    'nom_Bq': nomBq,
                    'no_Cheq': noCheq,
                    'montant_Cheq': mtCheq
                })
             }

        }
        if (saveData != 0) {

            saveDat.push({
                'categorie': saveData,
                'Cheques': Cheques
            })
            localStorage.setItem('contrats', JSON.stringify(saveDat));
            let jsonData = JSON.stringify(saveDat);
            document.querySelector('.jsonFileUser').value = jsonData;
            
        } else {
            document.querySelector('.jsonFileUser').value = '';
        }

    }
    document.querySelector('.validerContrat').addEventListener('click', saveContrats);


// ################ enregistrer la liste de produit choisis - window premier plan #############

    function saveListNewProduct() {

        // event.preventDefault();

        let idcateg = document.querySelectorAll('.displayCat')[0].getAttribute('idcat');
        let nbc = document.querySelectorAll('.contratCat').length;
        for (a = 0; a < nbc; a++) {

            let yu = document.querySelectorAll('.contratCat')[a];
            // let ol = document.querySelectorAll('.contratCat')[a].children[0];
            // let re = ol.getAttribute('idcat');
            let re = yu.children[0].attributes[3].value;
            console.log(re);

                if (re == idcateg) {

                    yu.remove(yu);
                    console.log('fait !');
                }
        }
        

                        //  enregistrement du contrat list

    let nbrecontratCat = document.querySelectorAll('.contratCat').length;

    let saveDonnees = [];
    let saveDats = [];
    let saveCheques = [];

    for (let p = 0; p < nbrecontratCat; p++) {

        let contr = document.querySelectorAll('.contratCat')[p];
        let nbPdt = contr.childElementCount - 2;
        let nbCheq = contr.lastElementChild.children[0].children[0].children[0].children[1].childElementCount - 2;

        if (saveDonnees != 0) {
            saveDats.push({
                'categorie': saveDonnees,
                'Cheques': saveCheques
            })
        }

        saveDonnees = [];
        saveCheques = [];

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
            // console.log(totalCat);

            saveDonnees.push({

                'Nom_user': userName,
                'Id_user': userId,
                'Nom_SuperCategorie': nomSupCat,
                'Nom_Categorie': nomCat,
                'id_Categorie': idCat,
                'Nbre_cheque': nCheque,
                'quantite': qtite,
                'nom_produit': nomPdt,
                'id_produit': idPdt,
                'total': parseFloat(totalCat).toFixed(2)
            })
        }

        for (let v = 0; v < nbCheq; v++) {

            nomBq = contr.lastElementChild.children[0].children[0].children[0].children[1].children[v].children[1].value;
            noCheq = contr.lastElementChild.children[0].children[0].children[0].children[1].children[v].children[2].value;
            mtCheq = parseFloat(contr.lastElementChild.children[0].children[0].children[0].children[1].children[v].children[3].value).toFixed(2);

            saveCheques.push({
                'nom_Bq': nomBq,
                'no_Cheq': noCheq,
                'montant_Cheq': mtCheq
            })
         }
        
        }
        if (saveDonnees != 0) {

            saveDats.push({
                'categorie': saveDonnees,
                'Cheques': saveCheques
            })
            localStorage.setItem('contrats', JSON.stringify(saveDats));
        }
        else {
            localStorage.removeItem('contrats');
}

                //############ enregistrer : ######### 


        let nbCat = document.querySelectorAll('.displayCat').length;
        let nc = document.querySelectorAll('.displayCat')[0].getAttribute('nbrecheque');

        let saveDat = [];
        let saveData = [];
        let Cheques =[];
        let nameUser = document.querySelector('#header').getAttribute('nameuser');
        let idUser = document.querySelector('#header').getAttribute('iduser');


        if (saveData != 0) {
            saveDat.push({
                'categorie': saveData,
                'Cheques': Cheques
            })
        }
    
        saveData = [];
        Cheques = [];
    
        for (let l = 0; l < nbCat; l++) {
    
            let ncheque = document.querySelector('.displayCat').getAttribute('nbrecheque');
            let qte = document.querySelectorAll('.displayCat > td.qtite > input.Qt')[l].value;
            let nomSuperCat = document.querySelector('.displayCat').getAttribute('nomsupcat');
            let nomCat = document.querySelector('.displayCat').getAttribute('nomcat');
            let catId = document.querySelector('.displayCat').getAttribute('idcat');
            let pdtId = document.querySelectorAll('.displayCat > td.nomPdt')[l].getAttribute('idpdt');
            let nom = document.querySelectorAll('.displayCat > td.nomPdt')[l].textContent;
            let Total = parseFloat(document.querySelectorAll('.displayCat > td > input.Tot')[l].value);
            if (Total > 0) {
    
                saveData.push({
                    'Nom_user': nameUser,
                    'Id_user': idUser,
                    'Nom_SuperCategorie': nomSuperCat,
                    'Nom_Categorie': nomCat,
                    'id_Categorie': catId,
                    'Nbre_cheque': ncheque,
                    'quantite': qte,
                    'nom_produit': nom,
                    'id_produit': pdtId,
                    'total': parseFloat(Total).toFixed(2)        
                });
            }
        }

        for (e = 0; e < nc; e++) {

            Cheques.push({
                'nom_Bq': '',
                'no_Cheq': '',
                'montant_Cheq': 0
            })
        }

            if (saveData != 0) {
                saveDat.push({
                    'categorie': saveData,
                    'Cheques': Cheques
                })
            }
     
                if (localStorage.getItem('contrats') != null) {
                let ajoutContrat = JSON.parse(localStorage.getItem('contrats'));
    
                ajoutContrat.push({
                    'categorie': saveData,
                    'Cheques': Cheques
                })

                if (saveData != 0)
    
                localStorage.setItem('contrats', JSON.stringify(ajoutContrat));
    
            } else {
    
                localStorage.setItem('contrats', JSON.stringify(saveDat));
            }
        
        // ############  shutdown window products #######

                    shutDownWin(event);

                    // document.querySelector('.noDisplayPdt').style.display = 'none';
                        
                    // document.querySelector('#container').style.opacity = 1;
                    // document.querySelector('footer').style.opacity = 1;

                    // document.querySelectorAll('.list-categorie').forEach((elmt) => {
                    //     elmt.classList.remove('noDisplay');
                    //     elmt.classList.remove('displayCat');
                    // })

                    // let globalT = document.querySelector('.globalTotal');
                    // globalT.value = 0;

                    // let NbreLigne = document.querySelectorAll('.list-categorie').length;

                    // for (let k = 0; k < NbreLigne; k++) {
                    //     let Tot = document.querySelectorAll('input.Tot')[k];
                    //     let Qte = document.querySelectorAll('input.Qt')[k];
                    //     Tot.value = 0;
                    //     Qte.value = 0;
                    // }  


            // window.location.href = '//127.0.0.1:4600/contrats';
            // const GetContratAjPdt = new GetLocalStorage(JSON.parse(localStorage.getItem('contrats')));
            // (getContratList())();
    }
    
    document.querySelector('.saveContrat').addEventListener('click', () => {
        saveListNewProduct();
        //  getContratList();
        const GetContratAjPdt = new GetLocalStorage(JSON.parse(localStorage.getItem('contrats')));
        // window.location.href = '//127.0.0.1:4600/contrats';
    });


// ########################### enregistrer les chèques ####################################

    document.querySelectorAll('.saveCheques > a').forEach(
        elt => elt.addEventListener('click', (event) => {

            event.preventDefault;

            let nbrecontratCat = document.querySelectorAll('.contratCat').length;
    
            let saveData = [];
            let saveDat = [];
            let Cheques = [];
    
            for (let p = 0; p < nbrecontratCat; p++) {
    
                let contr = document.querySelectorAll('.contratCat')[p];
                let nbPdt = contr.childElementCount - 2; // catch child cheques of contratCat
                let nbCheq = contr.lastElementChild.children[0].children[0].children[0].children[1].childElementCount - 2;
                
    
                if (saveData != 0) {
                    saveDat.push({
                        'categorie': saveData,
                        'Cheques': Cheques
                    })
                }
    
                saveData = [];
                Cheques = [];   
    
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
                    // console.log(totalCat);
    
                    saveData.push({
    
                        'Nom_user': userName,
                        'Id_user': userId,
                        'Nom_SuperCategorie': nomSupCat,
                        'Nom_Categorie': nomCat,
                        'id_Categorie': idCat,
                        'Nbre_cheque': nCheque,
                        'quantite': qtite,
                        'nom_produit': nomPdt,
                        'id_produit': idPdt,
                        'total': parseFloat(totalCat).toFixed(2)
                    })
                }
                
                for (let v = 0; v < nbCheq; v++) {

                    nomBq = contr.lastElementChild.children[0].children[0].children[0].children[1].children[v].children[1].value;
                    noCheq = contr.lastElementChild.children[0].children[0].children[0].children[1].children[v].children[2].value;
                    mtCheq = parseFloat(contr.lastElementChild.children[0].children[0].children[0].children[1].children[v].children[3].value).toFixed(2);
        
                    Cheques.push({
                        'nom_Bq': nomBq,
                        'no_Cheq': noCheq,
                        'montant_Cheq': mtCheq
                    })
                 }
    
            }
            if (saveData != 0) {
    
                saveDat.push({
                    'categorie': saveData,
                    'Cheques': Cheques
                })
                localStorage.setItem('contrats', JSON.stringify(saveDat));
    
            } else {
                
                localStorage.setItem('contrats', JSON.stringify(saveDat));
            }

            // window.location.href = '//127.0.0.1:4600/contrats';
            // const GetContratSavCheq = new GetLocalStorage(JSON.parse(localStorage.getItem('contrats')));
            // (getContratList())();

        })
    )

        // ############ function : close window (popup) ######################
        
        function shutDownWin(event) {
        
        event.preventDefault;
        

        document.querySelector('.noDisplayPdt').style.display = 'none';

        document.querySelector('#container').style.opacity = 1;
        document.querySelector('footer').style.opacity = 1;

        document.querySelectorAll('.list-categorie').forEach(elmt => {
            elmt.classList.remove('noDisplay');
            elmt.classList.remove('displayCat');
        })

        let globalT = document.querySelector('.globalTotal');
        globalT.value = 0;

        let NbreLigne = document.querySelectorAll('.list-categorie').length;
        console.log(NbreLigne)
        for (let k = 0; k < NbreLigne; k++) {
            let Tot = document.querySelectorAll('input.Tot')[k];
            let Qte = document.querySelectorAll('input.Qt')[k];
            Tot.value = 0;
            Qte.value = 0;
        }
    }

    function stopPropag(t) {
        t.stopPropagation();
    }
    
        //######## close window : click croix

        document.querySelectorAll('.shutdowncat > a').forEach(elt => {
            elt.addEventListener('click', () => {
                shutDownWin(event);
            })
        });

        //####### close window : keydown Escape

        window.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' || e.key === 'Esc') {
                shutDownWin(event);
            }
        })

        // window.location.href = '//127.0.0.1:4600/contrats';
        // const getIt = new GetLocalStorage(JSON.parse(localStorage.getItem('contrats')));
        // (getContratList())();
    
    
    // ############# boutton quantité plus ################################
    
    document.querySelectorAll('.plus').forEach(
        elem => elem.addEventListener('click', () => {
    
            let valeure = elem.previousElementSibling.value;
            //console.log(valeure);
            let QtPlus = parseInt(valeure) + 1;
            document.querySelector('.saveContrat').removeAttribute('disabled');
            elem.previousElementSibling.value = QtPlus;
            let Px = parseFloat(elem.parentElement.previousElementSibling.childNodes[0].value).toFixed(2); //firstChild.defaultValue);
            let TotalPlus = parseFloat(QtPlus * Px).toFixed(2);
            // let valuePlus = elem.parentElement.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.childNodes[0];
            let valuePlus = elem.parentElement.parentElement.children[8].childNodes[0];
    
            valuePlus.value = TotalPlus;
            //  console.log(valuePlus.value);
    
            let NbreLigne = document.querySelectorAll('.displayCat').length; //[10].getAttribute('idcat');
            //console.log("nombre de ligne: " + NbreLigne);
    
            let Ttx = 0;
            let globalT = document.querySelector('.globalTotal');
            for (let j = 0; j < NbreLigne; j++) {
                let Tx = parseFloat(document.querySelectorAll('.displayCat > td > input.Tot')[j].value);
                console.log(Tx);
                Ttx += Tx;
                console.log(Ttx);
                globalT.value = parseFloat(Ttx).toFixed(2);
                console.log(globalT.value);
            }
    
            // let m = document.querySelector('.globalTotal').value;
            // if (m > 0)
            //     document.querySelector('.saveContrat').removeAttribute('disabled');
            // else {
            //     return;
            // }
    
        }));
    
    // ############# boutton quantité moins ################################
    
    document.querySelectorAll('.moins').forEach(
        elemt => elemt.addEventListener('click', () => {
    
            let valeure = elemt.nextElementSibling.value;
            //console.log(valeure);
            let QtMoins = parseInt(valeure) - 1;
            // document.querySelector('.saveContrat').removeAttribute('disabled');
            if (QtMoins < 0) {
                return QtMoins = 0;
            }
            elemt.nextElementSibling.value = QtMoins;
            let Px = parseFloat(elemt.parentElement.previousElementSibling.childNodes[0].value).toFixed(2); //firstChild.defaultValue;
            let TotalMoins = parseFloat(QtMoins * Px).toFixed(2);
            let valueMoins = elemt.parentElement.parentElement.children[8].childNodes[0];
    
            valueMoins.value = TotalMoins;
    
            let NbreLigne = document.querySelectorAll('.displayCat').length;
            console.log("nombre de ligne: " + NbreLigne);
    
            let Ttx = 0;
            let globalT = document.querySelector('.globalTotal');
            for (let i = 0; i < NbreLigne; i++) {
                let Tx = parseFloat(document.querySelectorAll('.displayCat > td > input.Tot')[i].value);
                Ttx -= -Tx;
                //console.log(Ttx);
                globalT.value = parseFloat(Ttx).toFixed(2);
            }
    
            let n = document.querySelector('.globalTotal').value;
        console.log(n);
        if (n > 0)
            document.querySelector('.saveContrat').removeAttribute('disabled');
        else {
            document.querySelector('.saveContrat').disabled = true;
        }
    
        }));


    // ####### selection nbre de cheques ###########

    function select(elt) {

        let chcount = elt.parentElement.nextElementSibling.childElementCount - 2;

        let nb = elt.selectedOptions[0].value;
        let kl = parseInt(nb) - 1;

        for (let d = 0; d < parseInt(chcount) + 1; d++) {

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
