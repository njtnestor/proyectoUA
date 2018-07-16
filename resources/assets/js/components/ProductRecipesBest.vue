<template>
    <div class="row row-gen ">
            <div class="col-lg-4 col-sm-6">
                <img class="img-center" :src=imgURL alt="">
            </div>
            <div class="col-lg-8 col-sm-5 ">
               
                <div class="row ">
                    <h1>Best recipe</h1>
                </div>
                <div class="row">
                    <h3>Autor:</h3>
                    <h3>
                        <div v-if="destacada">
                            {{destacada.user.name}}
                        </div>
                    </h3>
                    
                </div>
                <div class="row">
                    <h3>Fecha: </h3>
                    <h3>
                        <div v-if="destacada">
                            {{destacada.user.created_at}}
                        </div>
                    </h3>
                </div>
                <div class="row">
                    <h3>Votacion:</h3>
                    <h3>
                        <div v-if="destacada">
                            {{destacada.rating}}
                        </div>
                    </h3>
                </div>
            </div>

        </div>
    
</template>

<script>

export default {
    data(){
        return{
            destacada:null,
            imgURL: 'http://www.videosrecetas.com/wp-content/uploads/2015/07/maxresdefault13.jpg'
        };
    },
    methods:{
         
    },
    async beforeMount(){
        axios.get('/api/products/'+this.$route.params.id+'/recipes/outstanding')
            .then(({data}) => {
                this.destacada=data.data
            })
        /*axios.get('/api/products/'+this.$route.params.id+'/recipes')
            .then(({data}) => {
                this.recipes=data.data
            })*/
    }
}
</script>
<style scoped>
    .border{
        background-color: red;

    }
    h1{
        padding-top: 10px;
        font-size: 80px;
    }
    .row-gen{
        margin-top:40px;
        box-shadow: 0 0 0 2px #eaeaea;
    }
    .col2bor{
        box-shadow: 0 0 0 2px #eaeaea;
    }
    .img-center{
        
        /*width: 360px;*/
        height: 340px;
        display: block;
        margin: 0 auto;
        padding:20px;
        width:100%;
        min-height:100px;
    }
    .row .flex {
     display: inline-flex;
     width: 100%;
     
     }
     h1{
        font-size:5vw;
     }
     h3{
        font-size:2vw;
     }
</style>