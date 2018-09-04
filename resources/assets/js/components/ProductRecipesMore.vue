<template>
    <div v-if="recipes">
        <div class="row row-gen ">
            <router-link tag="div" v-if="recipes.data[0]" class="col-lg-3 col-sm-6 borderh" v-for="(recipe,index) in recipes.data"  :key='index' :to="{name: 'recipe', params: { id : recipe.id}}">
                <div class="row">
                    <img class="img-center" :src=recipe.image alt="">
                </div>
                <div class="row">
                    <star-rating class="everyelem" v-bind:increment="1" :show-rating=false :read-only=true :rating='recipe.rating' v-bind:max-rating="5" inactive-color="#000" active-color="#cc1166" v-bind:star-size="30"></star-rating>
                </div>
            </router-link>
        </div>
        <div class="row pagination">
            <div class="everyelem">
                <!--<b-pagination size="lg" @input="paginationP" :total-rows="pagination.total_r" v-model="pagination.current_page" :per-page="pagination.per_p">
                </b-pagination>-->
                <b-button :disabled="pagination.prev_pagination_disabled" class="btn btn-primary" @click="prevPage() ">Prev</b-button>
                {{pagination.current_page}} of {{pagination.last_page}}
                <b-button :disabled="pagination.next_pagination_disabled" class="btn btn-primary" @click="nextPage()">Next</b-button>      
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
            recipes:null,
            pagination:{
                prev_pagination_disabled:true,
                next_pagination_disabled:true,
                current_page:2,
                first_page_url:null,
                next_page_url:null,
                prev_page_url:null,
                last_page_url:null,
                per_p:null,
                total_r:null,
                last_page:null,
            }
        };
    },
    methods:{
        callApi(direction){
            
            axios.get(direction)
            .then(({data}) => {
                this.recipes=data
                this.pagination.current_page=this.recipes.meta.current_page
                this.pagination.last_page=this.recipes.meta.last_page

                this.pagination.first_page_url=this.recipes.links.first
                this.pagination.next_page_url=this.recipes.links.next
                this.pagination.prev_page_url=this.recipes.links.prev
                this.pagination.last_page_url=this.recipes.links.last

                this.pagination.per_p=this.recipes.meta.per_page
                this.pagination.total_r=this.recipes.meta.total
                //this.pagination.current_page=this.recipes.meta.current_page
                if(this.pagination.current_page==1){
                    this.pagination.prev_pagination_disabled=true;
                }
                else{
                    this.pagination.prev_pagination_disabled=false;
                }
                if(this.pagination.current_page==this.pagination.last_page){
                    
                    this.pagination.next_pagination_disabled=true;
                }
                else{
                    
                    this.pagination.next_pagination_disabled=false;
                }
            })
        },
        prevPage(){
            var n= this.pagination.prev_page_url.indexOf("/api");
            var dircustom= this.pagination.prev_page_url.substring(n);

            this.callApi(dircustom)
            console.log("paginationPrev!")
        },
        nextPage(){
            var n= this.pagination.next_page_url.indexOf("/api");
            var dircustom= this.pagination.next_page_url.substring(n);

            this.callApi(dircustom)
            console.log("paginationNext!")
            
        },
        
    },
    async beforeMount(){
        this.callApi('/api/products/'+this.$route.params.id+'/recipes')
    }
}
</script>
<style scoped>
    .row-gen{
        background-color: white;
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
        /*object-fit: none;*/
    }
    .everyelem{
        display: block;
        margin: 0 auto;
    }
    .borderh:hover{
        box-shadow: 0 0 0 2px #46427c;
         cursor: pointer;
    }

</style>