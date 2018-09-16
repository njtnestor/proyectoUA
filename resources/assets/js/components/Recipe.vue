<template>
    <div v-if="recipe" class="container">
        <div v-if="recipe" class="row row-gen ">
            <div class="col-lg-4 col-sm-6">
                <img class="imgTitle" :src=recipe.image alt="">
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
                            <font-awesome-icon class="hand" v-bind:class="{like:handlike}" size="sm" :icon="['fas', 'thumbs-up']" @click="like()" />{{recipe.votes_p}}
                            <font-awesome-icon class="hand" v-bind:class="{dislike:handdislike}" size="sm" :icon="['fas', 'thumbs-down']" @click="dislike()" />{{recipe.votes_n}}
                        </div>
                    </h3>
                    
                </div>

            </div>
        </div>
        <div class="row-comment"> 
                <h4>Ingredients({{recipe.serving}} servings)</h4>
                <hr>
            <div class="row" >
                <ul>
                    <li v-for="(ingredient,index) in recipe.ingredients" :key='index'>
                        {{ingredient.name}}:&nbsp{{ingredient.cantidad}}
                    </li> 
                </ul>
            </div>
        </div>
        <div class="row-comment"> 
                <h4>Elaboration</h4>
                <hr>
            <div class="row" >
                <ul>
                    <li v-for="(step,index) in recipe.steps" :key='index'>
                        <h4>Step {{step.step+1}}</h4>
                        <p>{{step.description}}</p>
                    </li> 
                        
                </ul>
                
            </div>
        </div>
        <div class="row-comment">
            <h4>Comments</h4>
            <hr>
            <div v-if="authenticated" class="row">
                <b-form-textarea v-on:click.native="commentbutton=true" v-model="textNewComment" :no-resize=true  placeholder="Insert here your comment..." :rows="2" ></b-form-textarea>
                <div class="everyelem">
                    <b-button v-if="commentbutton" @click="createComment()" class="btn btn-primary buttoncomment">Comment</b-button>                
                </div>
                          
            </div>
            <hr>
            <div v-for="(comment,index) in comments" :key='index' class="row">
                <div class="col-2">
                    <img rounded="circle" class="img-center2" width="50" height="50" :src="img" alt="">
                </div>
                <div class="col-10">

                    <div class="row">
                        <li >
                            <h5>{{comment.user_id.name}}</h5>
                            <p>{{comment.description}}</p>
                        </li> 
                    </div>
                </div>
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
            textNewComment:null,
            authenticated: auth.check(),
            commentbutton:false,
            handlike:false,
            handdislike:false,
            positiveVotes:0,
            negativeVotes:0,
            recipe:'',
            comments:[
                
            ],
            img:'https://image.freepik.com/free-icon/user-image-with-black-background_318-34564.jpg'
        };
    },
    computed:{
        
    },
    methods:{
        like(){
            if(this.handdislike==false && this.handlike==false){
                this.handlike=true;
                this.recipe.votes_p=this.recipe.votes_p+1;
                console.log("has votado positivamente!")
            }
            
        },
        dislike(){
            if(this.handlike==false && this.handdislike==false){
                this.handdislike=true;
                this.recipe.votes_n=this.recipe.votes_n+1;
                console.log("has votado negativamente!")
            }
            
        },
        createComment(){
            let data={
                description:this.textNewComment
            };
            axios.post('/api/recipes/'+this.$route.params.id+'/comments',data)
                .then(({data}) => {
                        this.comments=data.data
                })
        }
    },
    async beforeMount(){
        axios.get('/api/recipes/'+this.$route.params.id)
            .then(({data}) => {
                this.recipe=data.data
                this.comments=data.data.comments
                
            })
    }
    
}
</script>
<style scoped>
    .imgTitle{
        border: solid 4px black;
        border-radius: 6px;
        height: 250px;
        margin:10px;
        width:100%;
        min-height:100px;
    }
    .everyelem{
       width: 100%;
    }
    .buttoncomment{
        float: right;
        margin-top:4px;
        background-color: #007bff !important;
        border-color: #007bff !important;
    }
    li{
        list-style:none;
    }
    .row-gen{
        background-color: white;
        margin-top:40px;
        box-shadow: 0 0 0 2px #eaeaea;
    }
    
     .img-center2{
        
        
        display: block;
        margin: 0 auto;
        
    }
    h1{
        font-size:60px;
    }
    h3{
        font-size:30px;
    }
    .row-gen2{
        background-color: white;
        margin-top:20px;
        box-shadow: 0 0 0 2px #eaeaea;
        margin-right: 15px;
        margin-left: 15px;
    }
    .row-comment{
        background-color: white;
        margin-top:20px;
        box-shadow: 0 0 0 2px #eaeaea;
        margin-right: 15px;
        margin-left: 15px;
        padding-left: 15px;
        padding-right: 15px;
        margin-bottom: 20px;
        padding-top:15px;
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