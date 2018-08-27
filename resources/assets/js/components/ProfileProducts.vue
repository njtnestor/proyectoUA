<template>
    <table class="table table-hover product-table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Marca</th>
        <th>Positive votes</th>
        <th>Negative votes</th>
        <th>Accepted</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="(product,index) in products" :key='index' track-by="id">
        <td>{{product.name}}</td>
        <td>{{product.marca}}</td>
        <td>{{product.votes_p}}</td>
        <td>{{product.votes_n}}</td>
        <td>{{product.approved}}</td>
      </tr>
    </tbody>
  </table>
    
</template>

<script>

export default {
    data () {
        return {
            products:'',
        }
    },
    async beforeMount(){
        axios.get('/api/productsByUser/')
            .then(({data}) => {
                console.log("parte de producto");
                this.products=data.data
            })
        
    },
    methods:{
        
    },
}
</script>
<style scoped>
   
</style>