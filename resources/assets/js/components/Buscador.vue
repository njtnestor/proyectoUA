<template>
    <div class="bordebuscador">
        <div class="input-group mb-3">
            <b-form-input class="search" v-model="search" type="text" placeholder="Enter your name"></b-form-input>              
            <div class="input-group-append pp">
                <button class="btn btn-primary submit boton">Enter</button>
            </div>
            <ul v-show="search.length>2 && enc==true"  class="listabusqueda ">
                <li class="everysearch" v-for="(i,index) in filtrado()" :key="index" >{{i.name}}</li> 
            </ul>
        </div>
    </div>

</template>
<script>
export default {
    name: "Buscador",
    data(){
        return {
            enc: false,
            arrayaux: [],
            search: '',
            array: [{name: 'nestor'},{name: 'nestitor'},{name:'pepenes'},{name: 'tocnestpp'},{name: 'maria'}]
        };
    },
    methods:{
        filtrado: function(){
            
            if(this.search.length>2){

                //return this.array.filter(i=>i.name.includes(this.search))
                var a= this.myfilter(i=>i.name.includes(this.search),this.array)
                this.enc=a.length>0;
                console.log(a.length)
                return a;
            }
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
        }
    }
}
</script>
<style>
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
    }
    .listabusqueda{
        color: #495057;
        background-color: #fff;
        border: 2px solid #80bdff;
        border-color: #80bdff;
        outline: 0;
        border-bottom-left-radius: 4px;
        border-bottom-right-radius: 4px;
        margin-top: 2px;
        border-top: none;
        width: 421px;
        list-style-type: none;
        padding: 0;
        background-color: white;
    }
    .everysearch{
        text-align: left;
        border-bottom: 1px solid#80bdff;
    }
    .everysearch:last-child{
        border-bottom: none;
    }


</style>
