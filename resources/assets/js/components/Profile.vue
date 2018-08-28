<template>
    <div class="container tab">
        <h2>Profile</h2>
        <b-card no-body>
            <b-tabs card>
                <b-tab title="Data" active>
                    <br><h5>Profile settings</h5>
                    <br><ProfileData />
                </b-tab>
                <b-tab title="Products" >
                    <br><h5>My products</h5>
                    <br><ProfileProducts />
                </b-tab>
                <b-tab title="Recipes" >
                    <br><h5>My recipes</h5>
                    <br><ProfileRecipes />
                </b-tab>
            </b-tabs>
        </b-card>
    </div>
    
</template>

<script>
import ProfileData from "./ProfileData"
import ProfileProducts from "./ProfileProducts"
import ProfileRecipes from "./ProfileRecipes"
export default {
    components: {ProfileData,ProfileProducts,ProfileRecipes}
}
</script>
<style scoped>
    .tab{
        margin-top:20px;
    }
    .fondotab{
        background-color: white;
    }
</style>