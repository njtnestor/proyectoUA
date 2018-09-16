<template>
    <router-link tag="div" v-if="destacada || (aviso==false)" class="row row-gen " :to="{name: 'recipe', params: { id : destacada.id}}">
            <div class="col-lg-4 col-sm-6">
                <img class="img-center" :src=destacada.image alt="">
            </div>
            <div class="col-lg-8 col-sm-5 ">
               
                <div class="row ">     
                    <h1>Best Recipe</h1> 
                            
                </div>
                
                <div class="row">
                    <!--<h3>By:&nbsp</h3>-->
                    <h3>
                        <div v-if="destacada">
                            {{destacada.product.name}}, {{destacada.product.marca}}
                        </div>
                    </h3>
                    
                </div>
                <hr>
                <div class="row">
                    <h3>
                        <div v-if="destacada">
                            <star-rating class="everyelem" v-bind:increment="1" :show-rating=false :read-only=true :rating='destacada.rating' v-bind:max-rating="5" inactive-color="#000" active-color="#cc1166" v-bind:star-size="35"></star-rating>    
                        </div>
                    </h3>
                </div>
                <div class="row">
                    <h4>Created at:&nbsp</h4>
                    <h4>
                        <div v-if="destacada">
                            {{getDate}}     
                        </div>
                    </h4>
                </div>
                
                <div class="row">
                    <h6>Do you think you can get a better recipe?<router-link :to="{name: 'newRecipe', params: { id : $route.params.id}}">Create a new recipe</router-link></h6>
                </div>
            </div>
    </router-link>
    <div class="row row-gen" v-else>
        <h2>There are still no recipes for this product. Be the first to <router-link :to="{name: 'newRecipe', params: { id : $route.params.id}}"> create one of them.</router-link></h2>
        <div class="everyelem">
            <!--<b-button class="btn btn-primary " :to="{name: 'newRecipe', params: { id : $route.params.id}}">New recipe</b-button>-->
        </div>
    </div>    
    
</template>

<script>

import StarRating from 'vue-star-rating'
import moment from 'moment'
export default {
    components: {
        StarRating
    },

    data(){
        return{
            aviso: false,
            destacada:null,
            imgURL: 'http://www.videosrecetas.com/wp-content/uploads/2015/07/maxresdefault13.jpg'
        };
    },
    computed:{
        getDate : function(){
             return moment(this.destacada.created_at.date, 'YYYY-MM-DD hh:mm:ss').format('YYYY-MM-DD');
         }
    },
    methods:{
        prueba(){
            console.log("prueba")
        } 
    },
    async beforeMount(){
        axios.get('/api/products/'+this.$route.params.id+'/recipes/outstanding')
            .then(({data}) => {
                this.destacada=data.data
            })
            .catch(({error}) => {
                // handle error
                console.log("hay error");
                this.aviso=true
                
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
        background-color: white;
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
        /*display: flex;
        align-items: center;*/
        display: inline-flex;
        width: 100%;
     
     }
    .everyelem{
        display: block;
        margin: 0 auto;

    }
    .center-btn{
        display: block;
        margin: 0 auto;
        background-color: #007bff !important;
        border-color: #007bff !important;
    }
     h1{
        font-size:5vw;
     }
     h3{
        font-size:2vw;
     }
     .row-gen:hover{
        box-shadow: 0 0 0 2px #46427c;
        cursor: pointer;
     }
     .no-recipe{
        margin-top:40px;
        box-shadow: 0 0 0 2px #eaeaea;
     }
     a {
        text-decoration: none;
     }
</style>