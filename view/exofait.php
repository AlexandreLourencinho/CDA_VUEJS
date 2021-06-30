
<!--<style>-->
<!--    #label1 {-->
<!--        width: 300px;-->
<!--        height: 100px;-->
<!--        background-color: #0056ff;-->
<!--    }-->
<!---->
<!--    #label2 {-->
<!--        width: 300px;-->
<!--        height: 100px;-->
<!--        background-color: #bdbdbd;-->
<!--    }-->
<!---->
<!--    #label3 {-->
<!--        width: 300px;-->
<!--        height: 100px;-->
<!--        background-color: red;-->
<!--    }-->
<!--</style>-->
<!---->
<!--<div id="app">-->
<!--    <p v-show="affich">{{ message }}</p>-->
<!--    <hr>-->
<!--    <button class="btn btn-primary" @click="btn_click">{{ message }}</button>-->
<!--    <h1 v-show="affichage">tamer ptin</h1>-->
<!--    <div class="d-flex flex-row col-12">-->
<!--        <div id="label1" v-show="affichage" class="col-2"></div>-->
<!--        <div id="label2" v-show="affichage" class="col-10"></div>-->
<!--        <div id="label3" v-show="affichage" class="col-4"></div>-->
<!--    </div>-->
<!--</div>-->
<!---->
<!---->
<!--<script>-->
<!---->
<!--    var app = new Vue({-->
<!--        el: '#app',-->
<!--        data: {-->
<!--            message: 'Bonjour !',-->
<!--            affichage: false,-->
<!--            affich: false-->
<!--        },-->
<!--        methods: {-->
<!--            btn_click: function (evt) {-->
<!--                if (this.affich === false) {-->
<!--                    this.message = 'ptin cénul vuejs';-->
<!--                    this.affichage = true;-->
<!--                    this.affich = true;-->
<!--                } else {-->
<!--                    this.message = 'Bonjour !';-->
<!--                    this.affichage = false;-->
<!--                    this.affich = false;-->
<!--                }-->
<!---->
<!--            }-->
<!--        }-->
<!--    });-->
<!--</script>-->
<!--<div id="rere">-->
<!--    <div v-for="item in liste">-->
<!--        {{ messager }}-->
<!--        {{ item.disc_title }}-->
<!---->
<!--    </div>-->
<!--</div>-->

<!--<script>-->
<!--    var azerty = new Vue({-->
<!--        el: '#rere',-->
<!--        data: {-->
<!--            messager: 'coucou',-->
<!--            liste: {}-->
<!--            // affichage : false,-->
<!--            // affich : false-->
<!--        },-->
<!---->
<!--        // methods: {-->
<!--        //     btn_click: function(evt) {-->
<!--        //         if(this.affich===false) {-->
<!--        //             this.message = 'ptin cénul vuejs';-->
<!--        //             this.affichage = true;-->
<!--        //             this.affich = true;-->
<!--        //         }else{-->
<!--        //             this.message = 'Bonjour !';-->
<!--        //             this.affichage = false;-->
<!--        //             this.affich = false;-->
<!--        //         }-->
<!--        //-->
<!--        //     }-->
<!--        // }-->
<!--    });-->
<!--    // let liste;-->
<!--axios.get("/view/listedisque.php").then((function(reponse) { console.log(reponse.data); azerty.liste = reponse.data; this.messager = "Liste chargée"; }))-->
<!---->
<!---->
<!--</script>-->