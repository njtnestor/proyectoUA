<template>
    <div class="container">
        <div class="form">
            <h1>Create recipe</h1>
            <b-img center thumbnail v-if=recipe.image :src=recipe.image  class="m-1" fluid width="250" height="300" alt="img" />
            <h2>Image</h2>
            <input type="text" class="form-control" placeholder="Enter image link" name="image" v-model="recipe.image">
            <h2>Servings</h2>
            <b-form-select v-model="recipe.serving" :options="options" class="mb-3" />
            <div class="steps">
                <div v-for="(step,index) in recipe.steps" :key='index'>
                    <h3>Step {{index+1}}</h3>
                    <b-form-textarea class="textar"  v-model="step.description" placeholder="Write the first step" :rows="5" ></b-form-textarea>
                    <b-button v-if="index<7" class="btn btn-primary" @click="addStep(index)">Add step</b-button>
                    <b-button v-if="index>0 || recipe.steps.length>1" class="btn btn-primary" @click="deleteLastStep(step)">Remove</b-button>  
                </div>
                <b-button class="btn btn-primary center-btn" @click="sendRecipe">Send Recipe</b-button>
            </div>
        </div>
    </div>
</template>

<script>


export default {
    components: {
        
    },
    data() {
        return {
            recipe:{
                image:'',
                serving:'1',
                steps:[
                    {
                        description:''
                    }
                ]
            },
            options: [
                { value: 1, text: '1' },
                { value: 2, text: '2' },
                { value: 3, text: '3' },
                { value: 4, text: '4' },
                { value: 5, text: '5' }
            ]
        };
    },
    methods: {
        addStep(index){
           this.recipe.steps.splice(index+1,0,{step:'',description:''})
        },
        deleteLastStep(step){
            this.recipe.steps.splice(this.recipe.steps.indexOf(step),1);   
        },
        sendRecipe(){
            axios.post('/api/products/'+this.$route.params.id+'/recipes',this.recipe)
                .then(({data})=>{
                    console.log("receta creada")
                })
        }
    },

}
</script>
<style scoped>
    .textar{
        margin-bottom: 8px;
    }
    .form{
        padding:30px;        
    }
    .steps{
        margin-top: 25px;
    }
    .container{
        box-shadow: 0 0 0 1px #eaeaea;
        margin-top:60px;    
    }
    h1{
        font-size: 50px;
        text-align:center;
        margin-bottom: 20px;
    }
    textarea{
        width:100%;
    }
    li{
        list-style-type: none;
    }
    .center-btn{
        display: block;
        margin: 0 auto;
        background-color: #007bff !important;
        border-color: #007bff !important;
    }
    .img-center{
        height: 250px;
        display: block;
        margin: 0 auto;
        padding:20px;
        width:30%;
        min-height:100px;
    }
    .img-thumbnail{
        background-color: black;
    }
</style>

