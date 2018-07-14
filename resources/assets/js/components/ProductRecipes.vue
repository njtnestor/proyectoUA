<template>
    <div class="container">
        <div class="row row-gen" >
            <div class="col-4 img-col">
                <img class="img-center" :src=recipes[0].imgURL>
            </div>
            <div class="col">
                <div class="row h-50">
                    <h1>Receta destacada</h1>
                </div>
                <div class="row">
                    <h3>Autor:</h3>
                </div>
                <div class="row">
                    <h3>Fecha:</h3>
                </div>
                <div class="row">
                    <h3>Votacion:</h3>
                </div>
            </div>

        </div>
        <!--<img :src=imgURL>-->
    </div>
</template>

<script>

export default {
    data(){
        return{
            recipes: [
                {
                    name: 'recipe1',
                    usuerId: 'usu1',
                    votosPositivos: 5,
                    imgURL: 'http://www.videosrecetas.com/wp-content/uploads/2015/07/maxresdefault13.jpg' 
                },
                {
                    name: 'recipe2',
                    usuerId: 'usu2',
                    votosPositivos: 3,
                    imgURL: 'https://i.ytimg.com/vi/f2p4RQXrhdA/maxresdefault.jpg' 
                },
                {
                    name: 'recipe3',
                    usuerId: 'usu3',
                    votosPositivos: 3,
                    imgURL: 'https://i.ytimg.com/vi/f2p4RQXrhdA/maxresdefault.jpg' 
                },
                {
                    name: 'recipe4',
                    usuerId: 'usu4',
                    votosPositivos: 3,
                    imgURL: 'https://i.ytimg.com/vi/f2p4RQXrhdA/maxresdefault.jpg' 
                },
                {
                    name: 'recipe5',
                    usuerId: 'usu5',
                    votosPositivos: 3,
                    imgURL: 'https://i.ytimg.com/vi/f2p4RQXrhdA/maxresdefault.jpg' 
                }
            ]
           
        };
    },
    methods:{
        
    }
}
</script>
<style scoped>

    h1{
        padding-top: 10px;
        font-size: 80px;
    }
    .row-gen{
        margin-top:20px;
        box-shadow: 0 0 0 2px #eaeaea;
    }
    .img-center{
        
        width: 360px;
        height: 360px;
        display: block;
        margin: 0 auto;
        padding:20px;
        object-position: center; /* Center the image within the element */
  

    }
</style>