<template>
    <div class="bordebuscador">
        <div class="input-group mb-3" v-on-clickaway.native="away" @click="clickinput">
            <b-form-input class="search" @keyup.native="elegir2()" v-model="search" type="text" placeholder="Enter a product"></b-form-input>              
            <div class="input-group-append pp">
                <!--<button class="btn btn-primary submit boton">Enter</button>-->
                <b-button class="btn btn-primary submit boton" :to="{name: 'productRecipes', params: { id : idSearch}}">Enter</b-button>
            </div>
            <ul v-show="search.length>2 && enc==true && choosed==false && inputclicked==true"  class="listabusqueda ">
                <li class="everysearch" v-for="(i,index) in filtrado()" @click="elegir(i)" :key="index" >{{i.name}}({{i.marca}})</li> 
            </ul>
        </div>
    </div>

</template>
<script>
import { directive as onClickaway } from 'vue-clickaway';
export default {
    
    name: "Buscador",
    data(){
        return {
            inputclicked: false,
            choosed: false,
            enc: false,
            arrayaux: [],
            search: '',
            idSearch: '',
            array: []
        };
    },
      directives: {
    onClickaway: onClickaway,
  },
    methods:{
        filtrado: function(){
            
            if(this.search.length>2){

                //return this.array.filter(i=>i.name.includes(this.search))
                var a= this.myfilter(i=>i.name.toLowerCase().includes(this.search.toLowerCase()),this.array)
                this.enc=a.length>0;
                return a;
            }
        },
        away: function(){
            this.inputclicked=false;
        },
        clickinput: function(){
            this.inputclicked=true;
        },
        myfilter(f,arr){
            var auxarr=[]
            var contador=0;
            for(var i=0;i<arr.length;i++){
                if(contador==3){
                    break;
                }
                if(f(arr[i])){
                    auxarr.push(arr[i])
                    contador++;
                }
                
            }
            return auxarr
        },
        elegir(i){
            console.log("entra")
            this.search=i.name
            this.idSearch=i.id
            this.choosed=true;
        },
        elegir2(){
            this.choosed=false;
            console.log("patata")
        }
    },
    beforeMount() {
        axios.get('/api/products')
                .then(({data}) => {
                    
                    this.array=data.data
                    console.log(data.data)
                    console.log(this.array)
                    //auth.login(data.token, data.user);
                    //this.$router.push('/dashboard');
                })
                
    }
    
}
</script>
<style scoped>
    .form-control:focus {
        -webkit-box-shadow: 0 0 0 0.15rem rgba(0, 123, 255, 0.25);
    }
    .bordebuscador{
        padding: 10px;
        border-radius: 4px;
        background-color: white;
        max-width: 600px;
        max-height: 62px;
        margin: 0 auto;
        border: 1px solid #cacaca;
    }

    .search{
        height: 20px;
        font-size: 20px;
        padding: 20px;
        border: none;
    }
    .pp{
        padding-left: 20px;
    }
    .boton{
        width: 140px;
        background-color: #007bff !important;
        border-color: #007bff !important;
    }
    .listabusqueda{
        color: #495057;
        background-color: #fff;
        outline: 0;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 4px;
        margin-top: 2px;
        border-top: none;
        width: 420px;
        list-style-type: none;
        padding: 0;
        background-color: white;
        box-shadow: 0 2px 5px #9b9b9b;
    }
    .everysearch{
        padding-left: 16px;
        cursor: pointer;
        text-align: left;
        border-bottom: 1px solid #eaeaea;
        text-transform: capitalize;
    }
    .everysearch:hover{
        background-color: rgb(220,220,220);
    }
    .everysearch:last-child{
        border-bottom: none;
    }


</style>
