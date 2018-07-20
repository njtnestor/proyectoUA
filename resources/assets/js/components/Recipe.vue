<template>
    <div class="container">
        <div v-if="recipe" class="row row-gen ">
            <div class="col-lg-4 col-sm-6">
                <img class="img-center" :src=recipe.image alt="">
            </div>
            <div class="col-lg-8 col-sm-5 ">
                <div class="row ">     
                    <h1> {{recipe.product.name}}</h1>         
                </div>
                <div class="row">
                    <h3>
                        <div v-if="recipe">
                            {{recipe.product.marca}}
                        </div>
                    </h3>
                    
                </div>
                <div class="row">
                    <h3>
                        <div>
                            <star-rating v-bind:increment="1" :show-rating=false :read-only=false :rating=0 v-bind:max-rating="5" inactive-color="#000" active-color="#cc1166" v-bind:star-size="40"></star-rating>
                        </div>
                    </h3>
                    
                </div>

            </div>
        </div>
        <div class="row-gen2">
            <div class="row">
                <h3>Ingredients({{recipe.serving}} servings)</h3>
            </div>
            <div class="row" >
                <ul>
                    <li v-for="(ingrediente,index) in ingredientes" :key='index'>
                        {{ingrediente.name}}
                    </li> 
                </ul>
            </div>
        </div>
        <div class="row-gen2">
            <div class="row">
                <h3>Elaboration</h3>
            </div>
            <div class="row" >
                <ul>
                    <li v-for="(step,index) in recipe.steps" :key='index'>
                        <h4>Step {{step.step}}</h4>
                        <p>{{step.description}}</p>
                    </li> 
                        
                </ul>
                
            </div>
        </div>
    </div>
    
</template>

<script>

import StarRating from 'vue-star-rating'
export default {
    components: {
       StarRating
    },

    data(){
        return{
            recipe:'',
            ingredientes:[
                {
                    name:'Potato'
                },
                {
                    name:'Cheese'
                }
            ],
            imgURL: 'http://www.videosrecetas.com/wp-content/uploads/2015/07/maxresdefault13.jpg'
        };
    },
    computed:{
        
    },
    methods:{
        storeIngredientes(){

        }
    },
    async beforeMount(){
        axios.get('/api/recipes/'+this.$route.params.id)
            .then(({data}) => {
                this.recipe=data.data
            })
    }
    
}
</script>
<style scoped>
    .row-gen{
        background-color: white;
        margin-top:40px;
        box-shadow: 0 0 0 2px #eaeaea;
    }
    .img-center{
        
        /*width: 360px;*/
        height: 250px;
        display: block;
        margin: 0 auto;
        padding:20px;
        width:100%;
        min-height:100px;
    }
    h1{
        font-size:4vw;
    }
    h3{
        font-size:2vw;
    }
    .row-gen2{
        background-color: white;
        margin-top:20px;
        box-shadow: 0 0 0 2px #eaeaea;
        margin-right: 15px;
        margin-left: 15px;
    }
    .row{
        margin-right: 15px;
        margin-left: 15px;
    }
</style>