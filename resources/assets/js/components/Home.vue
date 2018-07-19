<template>
   <div >
        <div class="fondoBuscador">
            <strong class="tituloBuscador">
                FIND A RECIPE
            </strong>
            <Buscador/>
        </div>
        <div class="row">
            <div class="col">
                <img class="img-center" src="/images/cuchillo-tenedor.png" alt="">
                <h1>Crea</h1>
            </div>
            <div class="col">
                <img class="img-center" src="/images/pollo.png" alt="">
                <h1>Cocina</h1>
            </div>
            <div class="col">
                <img class="img-center" src="/images/pizza.png" alt="">
                <h1>Prueba</h1>
            </div>

        </div>
        
         
   </div>
</template>

<script>
import Buscador from "./Buscador"
export default {
    components: {Buscador}
}
</script>

<style scoped>
    .fondoBuscador{
        /*height: 500px;*/
        height: 45vh;
       /* background-image: url(http://franchisesouq.com/files/equipment/5a093473e8777_CB_-_prosciutto-pesto-panini-4_copy.jpg);*/
        background-image: linear-gradient(rgba(0, 0, 0, 0.35),rgba(0, 0, 0, 0.35) ),url(https://www.boxpark.co.uk/assets/Uploads/_resampled/FillWyIxOTIwIiwiMTA4MCJd/Bao-Bao-Holder3.jpg);
        text-align: center;
        background-size:cover;
        background-repeat: no-repeat;
        width: 100%;
    }
    .tituloBuscador{
        font-family: myFirstFont;
        color:white;
        margin-top: 70px;
        font-size: 5.125rem;
        display: inline-block;
    }
    .fila{
        padding-top:60px;
    }
    h1{
        text-align: center;
        color: red;
        font-family: myFirstFont;
        font-size: 29px;
    }
    .row{

        padding-top: 40px;
        margin-right: 0;
    }
    .img-center{
        display: block;
        margin: 0 auto;

    }
    .clase1{
        color:red;
    }
    .clase2{
        color:blue;
    }
</style>

