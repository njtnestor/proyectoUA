<template>
    <div v-if="products" class="container">
        <table class="table table-hover product-table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Brand</th>
                <th>Actions</th>
                
            </tr>
            </thead>
            <tbody>
                <tr v-for="(product,index) in products" :key='index' track-by="id">
                    <td>{{product.name}}</td>
                    <td>{{product.marca}}</td>
                    <td>
                        <font-awesome-icon class="hand" :class="{like:handlike.includes(index)}" size="lg" :icon="['fas', 'thumbs-up']" @click="like(index)"/>
                        <font-awesome-icon class="hand" :class="{dislike:handdislike.includes(index)}" size="lg" :icon="['fas', 'thumbs-down']"  @click="dislike(index)"/>
                    </td>
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
            handlike:[],
            handdislike:[],
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
        like(index){
            if(this.handdislike.includes(index)==false && this.handlike.includes(index)==false){
                this.handlike.push(index)
                console.log("has votado positivamente!")
            }
            
        },
        dislike(index){
            if(this.handlike.includes(index)==false && this.handdislike.includes(index)==false){
                this.handdislike.push(index)
                console.log("has votado negativamente!")
            }
            
        }
    },
}
</script>
<style scoped>
   .container{
       margin-top:20px;
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