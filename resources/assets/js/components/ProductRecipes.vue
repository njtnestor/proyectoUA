<template>
    <div>
        <div class="container">
            <ProductRecipesBest />
        </div>
        <ProductRecipesMore />
    </div>
        <!--<div v-if="recipes">
            {{recipes[0].user.name}}
        </div>-->
    
</template>

<script>
import ProductRecipesBest from "./ProductRecipesBest"
import ProductRecipesMore from "./ProductRecipesMore"
export default {
    components:{ProductRecipesBest,ProductRecipesMore}
}
</script>
<style scoped>
    

     
</style>