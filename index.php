<?php
$titre = "Accueil";
include_once $_SERVER['DOCUMENT_ROOT'] . "/template/header.php";
?>


<div id="prout">
    <label for="truc"> disque: </label>
    <input type="text" id="truc" v-model="teste" name="titre" v-show="aff">
    <button class="btn btn-primary" @click="clickbtn">recherche image</button>
<!--    <img :src="/view/assets/images/${data.disc_picture}" alt="">-->
</div>

<script>
    const azertyui = new Vue({
        el: '#prout',
        data: {
            liste: {},
            aff: true,
            teste:'placeholder'
        },
        methods: {
            clickbtn: function(evt){
                axios.get("/view/listedisque.php/", {params: {titre:this.teste}}).then(response=>{
                    console.log(response.data)});
            }
        }
    });
</script>



<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/template/footer.php";
?>
