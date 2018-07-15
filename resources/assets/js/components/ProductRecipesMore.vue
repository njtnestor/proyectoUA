<template>
    <div class="row row-gen ">
        <div style="background-color: red" class="col-lg-3 col-sm-6 ">
            <div>
                <div style="background-color: green" class="row">
                    <img class="img-center" :src=imgURL1 alt="">
                </div>
                <div style="text-align:center" class="row">
                    asdasd
                </div>
            </div>

        </div>
        <div style="background-color: blue" class="col-lg-3 col-sm-6 ">
            <div>
                <img class="img-center" :src=imgURL2 alt="">
            </div>
        </div>
        <div style="background-color: orange" class="col-lg-3 col-sm-6 ">
            <div>
                <img class="img-center" :src=imgURL3 alt="">
            </div>
        </div>
        <div style="background-color: green" class="col-lg-3 col-sm-6 ">
            <div>
                <img class="img-center" :src=imgURL4 alt="">
            </div>
        </div>

    </div>
</template>

<script>

export default {
    data(){
        return{
            
            recipes:null,
            imgURL1: 'http://pizzerianenina.com/wp-content/uploads/2015/09/pizzas.jpg',
            imgURL2:'http://revistaelconocedor.com/wp-content/uploads/2017/04/shutterstock_378226756-1024x736.jpg',
            imgURL3:'http://images.citiservi.es//business/ab/8c/be/big_tomaspizza.jpg',
            imgURL4:'https://pizzavegana.com/wp-content/uploads/2017/01/02-100-VEGETALES-Y-SIN-COLESTEROL.jpg'
        };
    },
    methods:{
         
    },
    async beforeMount(){
        /*axios.get('/api/products/'+this.$route.params.id+'/recipes/outstanding')
            .then(({data}) => {
                this.destacada=data.data
            })*/
        axios.get('/api/products/'+this.$route.params.id+'/recipes')
            .then(({data}) => {
                this.recipes=data.data
            })
    }
}
</script>
<style scoped>
    .row-gen{
        margin: 80px;
        margin-top:100px;
        /*margin-top:20px;*/
        box-shadow: 0 0 0 2px #eaeaea;
    }
    .img-center{
        
        /*width: 360px;*/
        height: 300px;
        display: block;
        margin: 0 auto;
        padding:20px;
        width:100%;
        min-height:100px;
    }
</style>