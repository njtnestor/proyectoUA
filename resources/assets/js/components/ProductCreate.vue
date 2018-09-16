<template>
    <div class="container tab">
        <div class="box">
            <div class="form-group">
                <label >Name</label>
                <input type="text" class="form-control" placeholder="Ej: Pizza carbonara" name="name" v-model="name">
            </div>
            <div class="form-group">
                <label >Marca</label>
                <input type="text" class="form-control" placeholder="Ej: Telepizza" name="marca" v-model="marca">
            </div>
            <button @click="createProduct()" type="submit" class="btn btn-primary">Submit</button>

        </div>
    </div>
</template>

<script>

export default {
    data(){
        return{
            name: '',
            marca:''
        };
    },
    methods:{
        createProduct() {
            let data={
                name: this.name,
                marca: this.marca
            };
            axios.post('/api/products',data)
                    .then(({data}) => {
                        console.log("producto creado")
                        this.$router.push('/');
                    })
                    
        }
    }
}
</script>
<style scoped>
   .box{
        box-shadow: 0 0 0 1px #eaeaea;
        padding: 32px;
        max-width: 340px;
        margin:0 auto;
        background-color: #fff;
        margin-top: 30px;
    }
</style>