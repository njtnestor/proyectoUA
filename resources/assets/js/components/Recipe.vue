<template>
    <div v-if="recipe" class="container">
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
                        <div @click.native="click">
                            <!--<star-rating v-bind:increment="1" :show-rating=false :read-only=false :rating=0 v-bind:max-rating="5" inactive-color="#000" active-color="#cc1166" v-bind:star-size="40"></star-rating>-->
                            <font-awesome-icon class="hand" v-bind:class="{like:handlike}" size="sm" :icon="['fas', 'thumbs-up']" @click="like()" />{{positiveVotes}}
                            <font-awesome-icon class="hand" v-bind:class="{dislike:handdislike}" size="sm" :icon="['fas', 'thumbs-down']" @click="dislike()" />{{negativeVotes}}
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
                    <li v-for="(ingredient,index) in recipe.ingredients" :key='index'>
                        {{ingredient.name}}:&nbsp{{ingredient.cantidad}}
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
                        <h4>Step {{step.step+1}}</h4>
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
            handlike:false,
            handdislike:false,
            positiveVotes:12,
            negativeVotes:5,
            recipe:''
        };
    },
    computed:{
        
    },
    methods:{
        like(){
            if(this.handdislike==false && this.handlike==false){
                this.handlike=true;
                console.log("has votado positivamente!")
            }
            
        },
        dislike(){
            if(this.handlike==false && this.handdislike==false){
                this.handdislike=true;
                console.log("has votado negativamente!")
            }
            
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
    .hand{
        color:grey;
    }
    .hand:hover{
        cursor:pointer;
    }
    .like{
        color:green;
    }
    .like:hover{
        color:green;
        cursor: pointer;
    }
    .dislike{
        color:red;
    }
    .dislike:hover{
        color:red;
        cursor: pointer;
    }

</style>