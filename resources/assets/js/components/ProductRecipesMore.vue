<template>
    <div v-if="recipes">
        <div class="row row-gen ">
            <div v-if="recipes.data[0]" style="background-color: red" class="col-lg-3 col-sm-6">
                <div class="row">
                    <img class="img-center" :src=imgURL1 alt="">
                </div>
                <div class="row">
                    <p class="everyelem">{{recipes.data[0].rating}}</p> 
                </div>
            </div>
            <div v-if="recipes.data[1]" style="background-color: blue" class="col-lg-3 col-sm-6">
                <div class="row">
                    <img class="img-center" :src=imgURL2 alt="">
                </div>
                <div class="row">
                    <p class="everyelem">{{recipes.data[1].rating}}</p> 
                </div>
            </div>
            <div v-if="recipes.data[2]" style="background-color: orange" class="col-lg-3 col-sm-6">
                <div class="row">
                    <img class="img-center" :src=imgURL3 alt="">
                </div>
                <div class="row">
                    <p class="everyelem">{{recipes.data[2].rating}}</p>
                </div>
            </div>
            <div v-if="recipes.data[3]" style="background-color: green" class="col-lg-3 col-sm-6">
                <div class="row">
                    <img class="img-center" :src=imgURL4 alt="">
                </div>
                <div class="row">
                    <p class="everyelem">{{recipes.data[3].rating}}</p>
                </div>
            </div>

        </div>
        <div class="row pagination">
            <div class="everyelem">
                <b-pagination size="lg" @input="paginationP" :total-rows="pagination.total_r" v-model="pagination.current_page" :per-page="pagination.per_p">
                </b-pagination>    
            </div>    
        </div>
        <div>currentPage: {{pagination.current_page}}</div>
    </div>
</template>

<script>

export default {
    data(){
        return{
            
            recipes:null,
            pagination:{
                //last_page:null,
                current_page:2,
                first_page_url:null,
                next_page_url:null,
                prev_page_url:null,
                last_page_url:null,
                per_p:null,
                total_r:null,
            },
            imgURL1: 'http://pizzerianenina.com/wp-content/uploads/2015/09/pizzas.jpg',
            imgURL2:'http://revistaelconocedor.com/wp-content/uploads/2017/04/shutterstock_378226756-1024x736.jpg',
            imgURL3:'http://images.citiservi.es//business/ab/8c/be/big_tomaspizza.jpg',
            imgURL4:'https://pizzavegana.com/wp-content/uploads/2017/01/02-100-VEGETALES-Y-SIN-COLESTEROL.jpg'
        };
    },
    methods:{
        paginationP(asd){
            console.log(asd)
        }
    },
    async beforeMount(){
        axios.get('/api/products/'+this.$route.params.id+'/recipes')
            .then(({data}) => {
                this.recipes=data
                this.pagination.current_page=this.recipes.meta.current_page
                //this.pagination.last_page=this.recipes.meta.last_page

                this.pagination.first_page_url=this.recipes.links.first
                this.pagination.next_page_url=this.recipes.links.next
                this.pagination.prev_page_url=this.recipes.links.prev
                this.pagination.last_page_url=this.recipes.links.last

                this.pagination.per_p=this.recipes.meta.per_page
                this.pagination.total_r=this.recipes.meta.total
                //this.pagination.current_page=this.recipes.meta.current_page
            })
    }
}
</script>
<style scoped>
    .row-gen{
        margin: 80px;
        margin-top:40px;
        margin-bottom: 0px;
        /*margin-top:20px;*/
        box-shadow: 0 0 0 2px #eaeaea;
    }
    .pagination{
        margin-top: 10px;
        margin-left: 80px;
        margin-right: 80px;
        
    }
    .img-center{
        /*width: 360px;*/
        height: 300px;
        display: block;
        margin: 0 auto;
        padding:20px;
        width:100%;
        min-height:100px;
    }
    .everyelem{
        display: block;
        margin: 0 auto;
    }

</style>