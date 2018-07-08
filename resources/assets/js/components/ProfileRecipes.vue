<template>
    <table class="table table-hover product-table">
    <thead>
      <tr>
        <th>Recipe</th>
        <th>Positive votes</th>
        <th>Negative votes</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="recipe in recipes" track-by="id">
        <td>{{recipe.name}}</td>
        <td>{{recipe.positive}}</td>
        <td>{{recipe.negative}}</td>
      </tr>
    </tbody>
  </table>
    
</template>

<script>

export default {
    data () {
        return {
            recipes: [
                {
                    name: 'recipe1',
                    positive: 1,
                    negative: 1
                },
                {
                    name: 'recipe2',
                    positive: 1,
                    negative: 1
                },
                {
                    name: 'recipe3',
                    positive: 1,
                    negative: 1
                }
            ]
        }
    }
}
</script>
<style scoped>
   
</style>