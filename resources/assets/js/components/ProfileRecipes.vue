<template>
    <table class="table table-hover product-table">
    <thead>
      <tr>
        <th>Product</th>
        <th>Brand</th>
        <th>Positive votes</th>
        <th>Negative votes</th>
      </tr>
    </thead>
    <tbody>
      <router-link  v-for="(recipe,index) in recipes" :key='index' track-by="id" :to="{name: 'recipe', params: { id : recipe.id}}" tag="tr">
        <td>{{recipe.product.name}}</td>
        <td>{{recipe.product.marca}}</td>
        <td>{{recipe.votes_p}}</td>
        <td>{{recipe.votes_n}}</td>
      </router-link >
    </tbody>
    </table>
    
</template>

<script>

export default {
    data () {
        return {
            recipes: ''
            
        }
    },
    async beforeMount(){
        axios.get('/api/recipesByUser')
            .then(({data}) => {
                console.log("adasdada");
                this.recipes=data.data
            })
        
    },
    methods:{
        
    },
}
</script>
<style scoped>
   
</style>