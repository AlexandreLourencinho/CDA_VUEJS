<?php
$titre = "Accueil";
include_once $_SERVER['DOCUMENT_ROOT'] . "/template/header.php";
?>

<p class="h1 text-center"> recherche image du disque dans la BDD</p>
<div id="prout">
    <div class="d-flex justify-content-center">
        <label for="truc"> disque: </label>
    </div>
    <br>
    <div class="d-flex justify-content-center">
        <input type="text" id="truc" v-model="teste" name="titre" v-show="aff">
        <button class="btn btn-primary" @click="clickbtn">recherche image</button>
        <br>
    </div>
    <div class="d-flex justify-content-center">
        <img :src="'/view/assets/images/'+nom" :alt="'' + alt"></div>
</div>

<script>
    const azertyui = new Vue({
        el: '#prout',
        data: {
            liste: {},
            aff: true,
            teste: 'placeholder',
            nom: '',
            alt: ''
        },
        methods: {
            clickbtn: function (evt) {
                axios.get("/view/listedisque.php/", {params: {titre: this.teste}}).then(response => {
                    console.log(response.data);
                    azertyui.nom = response.data[0] != null ? response.data[0].disc_picture : 'fuck.jpg';
                    this.alt = response.data[0] != null ? 'image de ' + response.data[0].disc_picture : 'y\'a pas ce dique!';
                });
                console.log(azertyui.nom);
            }
        }
    });
</script>
<hr>
<p class="h1 text-center"> addition sur keyup </p>
<div id="addition" class="d-flex justify-content-center">
    <div class="d-flex flex-row">
        <input type="text" v-model="chif" @keyup="tesrr">
        +
        <input type="text" v-model="chiff" @keyup="tesrr">
        =
        <span>{{result}}</span>
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
            tesrr: function (event) {
                addi.result = parseFloat(addi.chif) + parseFloat(addi.chiff);
                if (event) {
                    addition.result = addi.result;
                    console.log(result)
                }

            }
        }
    })
</script>

<hr>
<p class="h1 text-center">nombre magique</p>
<div class="d-flex justify-content-center">
    <div id="rand" class="d-flex justify-content-center flex-column col-5">
        <button class="btn btn-info" @click="nbaleat">générer nombre aléatoire</button>
        <br>
        <div class="d-flex flex-column">
            <label for=" nbrand">nombre magique : devinez le entre 0 et 100</label>
            <div class="d-flex flex-row">
                <input type="text" v-model="nbre" id="nbrand"><span></span></div>
            <button class="btn btn-secondary" @click="verif"> vérifier</button>
            <span>{{indice}}</span><br>
        </div>
        <button class="btn btn-warning" @click="soluce">solution</button>
        <span v-show="affichage">{{solution}}</span>
    </div>
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
<p class="h1 text-center">Calculatrice</p>
<div class="d-flex justify-content-center">
    <div class=" col-2" id="calculatrice">
        <table class="table">
            <input v-show="affichageuh" v-model="resultatt" disabled>
            <tr>
                <td>
                    <button type="button" class="btn col-12" @click="setNb(1)">1
                </td>
                <td>
                    <button type="button" class="btn col-12" @click="setNb(2)">2
                </td>
                <td>
                    <button type="button" class="btn col-12" @click="setNb(3)">3
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" class="btn col-12" @click="setNb(4)">4
                </td>
                <td>
                    <button type="button" class="btn col-12" @click="setNb(5)">5
                </td>
                <td>
                    <button type="button" class="btn col-12" @click="setNb(6)">6
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" class="btn col-12" @click="setNb(7)">7
                </td>
                <td>
                    <button type="button" class="btn col-12" @click="setNb(8)">8
                </td>
                <td>
                    <button type="button" class="btn col-12" @click="setNb(9)">9
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" class="btn col-12" @click="setOp('plus')">+
                </td>
                <td>
                    <button type="button" class="btn col-12" @click="setNb(0)">0
                </td>
                <td>
                    <button type="button" class="btn col-12" @click="setOp('moins')">-
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" class="btn col-12" @click="setOp('fois')">*
                </td>
                <td>
                    <button type="button" class="btn col-12" @click="setPoint">.
                </td>
                <td>
                    <button type="button" class="btn col-12" @click="setRendu">=
                </td>
            </tr>
            <tr>
                <td>
                    <button type="button" class="btn col-12" @click="resett">C</button>
                </td>
                <td>
                    <button type="button" class="btn col-12" @click="setOp('div')">/
                </td>
            </tr>
        </table>

        <!--    {{resultatt}}</input>-->
    </div>
</div>
<script>

    const calculer = new Vue({
        el: "#calculatrice",
        data: {
            opun: '',
            opdeux: '',
            affichageuh: true,
            resultatt: '',
            op: ''
        },
        methods: {
            setNb: function (nb) {
                if (this.op === '') {
                    this.opun += nb;
                    this.resultatt = this.opun;
                } else {
                    this.opdeux += nb;
                    this.resultatt = this.opdeux;
                }
            },
            setOp: function (ope) {
                this.op = ope;

                if (this.resultatt !== '') {
                    this.opun = parseFloat(this.resultatt);
                    this.opdeux = '';
                }
                this.resultatt = this.op;


            },
            setPoint: function () {
                if (this.opdeux !== '') {
                    this.opdeux = this.opdeux + ".";
                } else {
                    this.opun = this.opun + ".";
                }
            },
            setRendu: function () {
                console.log(this.op);
                switch (this.op) {
                    case "plus":
                        console.log(this.opun);
                        console.log(this.opdeux);
                        this.resultatt = parseFloat((this.opun)) + parseFloat((this.opdeux));
                        // this.affichageuh = true;
                        break;
                    case "moins":
                        console.log(this.opun);
                        console.log(this.opdeux);
                        this.resultatt = parseFloat((this.opun)) - parseFloat((this.opdeux));
                        // this.affichageuh = true;
                        break;
                    case "fois":
                        console.log(this.opun);
                        console.log(this.opdeux);
                        this.resultatt = parseFloat((this.opun)) * parseFloat((this.opdeux));
                        // this.affichageuh = true;
                        break;
                    case "div":
                        console.log(this.opun);
                        console.log(this.opdeux);
                        this.resultatt = parseFloat((this.opun)) / parseFloat((this.opdeux));
                        // this.affichageuh = true;
                        break;
                    default:
                        console.log('operateur non reconnu');

                }
            },
            resett: function () {
                this.opun = '';
                this.opdeux = '';
                this.op = '';
                // this.affichageuh = false;
                this.resultatt = '';
                console.log(this.opun);
                console.log(this.opdeux);
                console.log(this.resultatt);
            }
        }
    })
</script>

<style>
    #label1 {
        width: 300px;
        height: 100px;
        background-color: #0056ff;
    }

    #label2 {
        width: 300px;
        height: 100px;
        background-color: #ffffff;
    }

    #label3 {
        width: 400px;
        height: 100px;
        background-color: red;
    }

    #label4 {
        width: 300px;
        height: 100px;
        background-color: #06b601;
    }

    /*#label5 {*/
    /*    width: 300px;*/
    /*    height: 100px;*/
    /*    background-color: #ffffff;*/
    /*}*/

    #label6 {
        width: 600px;
        height: 100px;
        background-color: #ff0000;
    }
</style>

<div id="app">
    <button class="btn btn-primary" @click="btn_click" v-show="affichage">{{ message }}</button>
    <button class="btn btn-primary" @click="btn_click" v-show="affich">{{ messagee }}</button>
    <div class="d-flex justify-content-start">
        <div v-show="affichage" class="d-flex flex-column col-6">
            <p v-show="affichage">{{ message }}</p>

            <div class="d-flex flex-row col-12 ">
                <div id="label1" v-show="affichage"></div>
                <div id="label2" class="border border-dark" v-show="affichage"></div>
                <div id="label3" v-show="affichage"></div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <div v-show="affich" class="d-flex col-6 flex-column">
            <p v-show="affich">{{ messagee }}</p>

            <div class="d-flex flex-row col-12">
                <div id="label4" v-show="affich"></div>
                <!--                <div id="label5" v-show="affich" ></div>-->
                <div id="label6" v-show="affich"></div>
            </div>
        </div>
    </div>
</div>
<script>
    const app = new Vue({
        el: '#app',
        data: {
            message: 'coucou 1',
            messagee: 'coucou 2',
            affichage: true,
            affich: false
        },
        methods: {
            btn_click: function () {
                if (this.affichage === true) {
                    this.affichage = false;
                    this.affich = true;
                } else {
                    this.affichage = true;
                    this.affich = false;
                }

            }
        }
    });
</script>
<div id="testpost">
    <input type="number" v-model="trucm">
    <button @click="clickbtnn"> test</button>

</div>
<script>
    const azertyuii = new Vue({
        el:'#testpost',
        data:{
            trucm:0
        },
        methods : {
            // clickbtnn : function(evt){
            //     axios({
            //         method:'post',
            //         url:'/view/listedisque.php',
            //         data:{
            //             id:this.trucm
            //         }
            //     }).then(function (response){
            //         console.log(response.data);
            //     })
            // }
            clickbtnn : function(event){
                axios.post('/view/listedisque.php', {
                    disc_id: this.trucm
                })
                    .then(function (response) {
                        console.log(response.data);
                    })
            }
        }
    })
    // axios.get("/view/listedisque.php/", {params: {id: this.trucm}}).then(response => {
    //     console.log(response.data);
</script>
<!--// azertyui.nom = response.data[0] != null ? response.data[0].disc_picture : 'fuck.jpg';-->
<!--// this.alt = response.data[0] != null ? 'image de ' + response.data[0].disc_picture : 'y\'a pas ce dique!';-->
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<?php
//require $_SERVER['DOCUMENT_ROOT']."/controller/listedisquecontroller.php";
//$con = new db_records();
//$crud = new cruddisque($con);
//var_dump($crud->getdetails($_POST['']));
include_once $_SERVER['DOCUMENT_ROOT'] . "/template/footer.php";
?>
