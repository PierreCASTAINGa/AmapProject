const userId = document.querySelector('#header').getAttribute('iduser');
const userName = document.querySelector('#header').getAttribute('nameuser');

if (localStorage.getItem('contrats') == 0 || localStorage.getItem('contrats') == null || localStorage.getItem('contrats') == undefined) {

class GetContrat {

    constructor(path) {
        this.path = path;
        this.get();
    }

    get() {

        const params = {

            method: 'POST',
            header: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8'
            }
        }

        fetch(this.path, params

        ).then((res) => {

                return res.json();
                
        }).then((donnees) => {

        localStorage.setItem('contrats', JSON.stringify(donnees));
        
        
        }).catch((error) => {
            
            console.log(`Something is wrong : ${error}`);
        })
    }
}
const Faire = new GetContrat(`frontend/json/commande/${userId}.json`);
}



// ## function openListProduit : display list product ####

function openListProduit(elt, nbreCheque, nomsupcat) {

    document.querySelector('.noDisplayPdt').style.display = 'block';
    document.querySelector('.noDisplayPdt').style.zIndex = '10';

    document.querySelector('#container').style.opacity = .2;
    document.querySelector('footer').style.opacity = .2;

    let catId = elt.getAttribute('idcategory');
    let catNom = elt.getAttribute('nomcategory');

    document.querySelectorAll('.list-categorie').forEach((elts) => {
        if (elts.getAttribute('idcat') != catId) {
            elts.classList.add('noDisplay');
        } else {
            elts.classList.add('displayCat');
            elts.setAttribute('nomcat', `${catNom}`);
            elts.setAttribute('nomsupcat', `${nomsupcat}`);
            elts.setAttribute('nbrecheque', `${nbreCheque}`);
        }
    });

}

// ## call function : open div(list product) when click each category link ##

document.querySelectorAll('.list-category').forEach(
    elt => elt.addEventListener('click', () => {
        let nbreCheque = elt.getAttribute('nbrecheque');
        let nomsupcat = elt.getAttribute('nsc')
        // let nomsupcat = elt.parentElement.parentElement.parentElement.childNodes[1].innerText 
        openListProduit(elt, nbreCheque, nomsupcat);
    }));


// ################ boutton enregistrer le contrat #############

function saveListProduct(event) {

    event.preventDefault();

    let nbCat = document.querySelectorAll('.displayCat').length;
    let nc = document.querySelectorAll('.displayCat')[0].getAttribute('nbrecheque');
    console.log(nc);
   
    let saveDat = [];
    let saveData = [];
    let Cheques = [];
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
                // 'Cheques': [{
                //         'nom_Bq': '',
                //         'no_Cheq': '',
                //         'montant_Cheq': 0
                //     },
                //     {
                //         'nom_Bq': '',
                //         'no_Cheq': '',
                //         'montant_Cheq': 0
                //     },
                //     {
                //         'nom_Bq': '',
                //         'no_Cheq': '',
                //         'montant_Cheq': 0
                //     },
                //     {
                //         'nom_Bq': '',
                //         'no_Cheq': '',
                //         'montant_Cheq': 0
                //     },
                //     {
                //         'nom_Bq': '',
                //         'no_Cheq': '',
                //         'montant_Cheq': 0
                //     }]
            })

            localStorage.setItem('contrats', JSON.stringify(ajoutContrat));

        } else {

            localStorage.setItem('contrats', JSON.stringify(saveDat));
        }

    
    // let dataJson = JSON.stringify(saveDat);
    // let inputvalue = document.querySelector('.jsonFile');
    // inputvalue.value = dataJson;
    

    // #### shutdown window products ###########

    document.querySelector('.noDisplayPdt').style.display = 'none';

    document.querySelector('#container').style.opacity = 1;
    document.querySelector('footer').style.opacity = 1;

    document.querySelectorAll('.list-categorie').forEach((elmt) => {
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

    window.location.href = '//127.0.0.1:4600/contrats';
}

document.querySelector('.saveContrat').addEventListener('click', saveListProduct);


// ############ croix shutdown window products ######################


document.querySelectorAll('.shutdowncat > a').forEach(
    elt => elt.addEventListener('click', (event) => {
        
        event.preventDefault;

        document.querySelector('.noDisplayPdt').style.display = 'none';

        document.querySelector('#container').style.opacity = 1;
        document.querySelector('footer').style.opacity = 1;

        document.querySelectorAll('.list-categorie').forEach((elmt) => {
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

    }));

    // ############ shutdown window products when click out of window ######################

// document.querySelector('body').onclick = () => {

//         event.preventDefault;

//         document.querySelector('.noDisplayPdt').style.display = 'none';

//         document.querySelector('#container').style.opacity = 1;
//         document.querySelector('footer').style.opacity = 1;

//         document.querySelectorAll('.list-categorie').forEach((elmt) => {
//             elmt.classList.remove('noDisplay');
//             elmt.classList.remove('displayCat');
//         })

//         let globalT = document.querySelector('.globalTotal');
//         globalT.value = 0;

//         let NbreLigne = document.querySelectorAll('.list-categorie').length;
//         console.log(NbreLigne)
//         for (let k = 0; k < NbreLigne; k++) {
//             let Tot = document.querySelectorAll('input.Tot')[k];
//             let Qte = document.querySelectorAll('input.Qt')[k];
//             Tot.value = 0;
//             Qte.value = 0;
//         }

//     }


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
    elem => elem.addEventListener('click', () => {

        let valeure = elem.nextElementSibling.value;
        //console.log(valeure);
        let QtMoins = parseInt(valeure) - 1;
        if (QtMoins < 0) {
            return QtMoins = 0;
        }
        elem.nextElementSibling.value = QtMoins;
        let Px = parseFloat(elem.parentElement.previousElementSibling.childNodes[0].value).toFixed(2); //firstChild.defaultValue;
        let TotalMoins = parseFloat(QtMoins * Px).toFixed(2);
        let valueMoins = elem.parentElement.parentElement.children[8].childNodes[0];

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
