<?php
$titre = "Accueil";
include_once $_SERVER['DOCUMENT_ROOT'] . "/template/header.php";
?>


<div id="prout">
    <label for="truc"> disque: </label>
    <input type="text" id="truc" v-model="teste" name="titre" v-show="aff">
    <button class="btn btn-primary" @click="clickbtn">recherche image</button>
    <img :src="'/view/assets/images/'+nom" alt="ptin">
</div>

<script>
    const azertyui = new Vue({
        el: '#prout',
        data: {
            liste: {},
            aff: true,
            teste: 'placeholder',
            nom: ''
        },
        methods: {
            clickbtn: function (evt) {
                axios.get("/view/listedisque.php/", {params: {titre: this.teste}}).then(response => {
                    console.log(response.data);
                    azertyui.nom = response.data[0] != null ? response.data[0].disc_picture : 'fuck.jpg';
                });
                console.log(azertyui.nom);
            }
        }
    });
</script>
<!--result=parseInt(chif)+parseInt(chiff)-->
<div id="addition">
    <div class="d-flex flex-row">
        <input type="text" v-model="chif" @keyup="tesrr">+<input type="text" v-model="chiff"
                                                                 @keyup="tesrr">=<span>{{result}}</span>
    </div>
</div>
<script>
    const addi = new Vue({
        el: "#addition",
        data: {
            chif: 0,
            chiff: 0,
            result: 0
        },
        methods: {
            // tesr : function(evt){
            //     result = addition.chif+addition.chiff;
            // },
            tesrr: function (event) {
                addi.result = parseInt(addi.chif) + parseInt(addi.chiff);
                if (event) {
                    addition.result = addi.result;
                    console.log(result)
                }

            }
        }
    })
</script>

<hr>
<div id="rand">
    <button class="btn btn-info" @click="nbaleat">générer nombre aléatoire</button>
    <br>
    <label for=" nbrand">nombre magique : devinez le entre 0 et 100</label>
    <div class="d-flex flex-row">
        <input type="text" v-model="nbre" id="nbrand"><span></span>
        <button class="btn btn-secondary" @click="verif"> vérifier</button>
        <span>{{indice}}</span><br>
    </div>
    <button class="btn btn-warning" @click="soluce">solution</button>
    <span v-show="affichage">{{solution}}</span>
</div>

<script>
    const rando = new Vue({
        el: '#rand',
        data: {
            nb: 0,
            solution: 0,
            affichage: false,
            nbre: 0,
            indice: '',
        },
        methods: {
            nbaleat: function (event) {
                rando.nb = parseInt(100 * Math.random());
                console.log(rando.nb);
            },
            verif: function (event) {
                if (rando.nbre > rando.nb) {
                    rando.indice = 'trop grand';
                } else if (rando.nbre < rando.nb) {
                    rando.indice = 'trop petit';
                } else {
                    rando.indice = 'trouvé!';
                }
            },
            soluce: function (event) {
                rando.solution = rando.nb;
                rando.affichage = true;
            }
        }
    })
</script>
<hr>
<div class="" id="calculatrice">
    <table>
        <tr>
            <td>
                <button type="button" @click="setNb(1)">1
            </td>
            <td>
                <button type="button" @click="setNb(2)">2
            </td>
            <td>
                <button type="button" @click="setNb(3)">3
            </td>
        </tr>
        <tr>
            <td>
                <button type="button" @click="setNb(4)">4
            </td>
            <td>
                <button type="button" @click="setNb(5)">5
            </td>
            <td>
                <button type="button" @click="setNb(6)">6
            </td>
        </tr>
        <tr>
            <td>
                <button type="button" @click="setNb(7)">7
            </td>
            <td>
                <button type="button" @click="setNb(8)">8
            </td>
            <td>
                <button type="button" @click="setNb(9)">9
            </td>
        </tr>
        <tr>
            <td>
                <button type="button" @click="setOp('+')">+
            </td>
            <td>
                <button type="button" @click="setNb(0)">0
            </td>
            <td>
                <button type="button" @click="setOp('-')">-
            </td>
        </tr>
        <tr>
            <td>
                <button type="button" @click="setOp('*')">*
            </td>
            <td>
                <button type="button" @click="setOp('/')">/
            </td>
            <td>
                <button type="button" @click="setRendu">=
            </td>
        </tr>
        <tr>
            <td>
                <button type="button" @click="resett">C</button>
            </td>
        </tr>
    </table>
    <p v-show="affichageuh">{{resultatt}}</p>
</div>
<script>

    const calculer = new Vue({
        el: "#calculatrice",
        data: {
            opun: 0,
            opdeux: 0,
            affichageuh: false,
            resultatt: 0
        },
        methods: {
            setNb: function (nb) {
                if (this.op === 0) {
                    this.opun += nb;
                } else {
                    this.opdeux += nb;
                }
            },
            setOp: function (ope) {
                this.op = ope;

            },
            setRendu: function () {
                console.log(this.op);
                switch (this.op) {
                    case "+":
                        this.resultatt = parseInt((this.opun)) + parseInt((this.opdeux));
                        this.affichageuh = true;
                        break;
                    case "-":
                        this.resultatt = parseInt((this.opun)) - parseInt((this.opdeux));
                        this.affichageuh = true;
                        break;
                    case "*":
                        this.resultatt = parseInt((this.opun)) * parseInt((this.opdeux));
                        this.affichageuh = true;
                        break;
                    case "/":
                        this.resultatt = parseInt((this.opun)) / parseInt((this.opdeux));
                        this.affichageuh = true;
                        break;
                }
            },
            resett: function () {
                this.opun = 0;
                this.opdeux = 0;
                this.affichageuh = false;
                this.resultatt = 0;
            }
        }
    })


</script>


<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/template/footer.php";
?>
