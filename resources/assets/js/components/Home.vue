<template>
   <div >
        <div class="fondoBuscador">
            <strong class="tituloBuscador">
                FIND A RECIPE
            </strong>
            <Buscador/>
        </div>
         
   </div>
</template>

<script>
import Buscador from "./Buscador"
export default {
    components: {Buscador}
}
</script>

<style >
    .fondoBuscador{
        height: 500px;
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
    
</style>

