<template>
    <div class="container">
        <table class="table table-hover product-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Marca</th>
                <th>Positive votes</th>
                <th>Negative votes</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(product,index) in products" :key='index' track-by="id">
                <td>{{product.name}}</td>
                <td>{{product.marca}}</td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

export default {
    data () {
        return {
            products:''
            
        }
    },
    async beforeMount(){
        axios.get('/api/productsByNotApproved')
            .then(({data}) => {
                this.products=data.data
            })   
    },
    methods:{
        
    },
}
</script>
<style scoped>
   .container{
       margin-top:20px;
   }
</style>