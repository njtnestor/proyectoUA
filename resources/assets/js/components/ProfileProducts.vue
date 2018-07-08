<template>
    <table class="table table-hover product-table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Marca</th>
        <th>Aceptado</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="product in products" track-by="id">
        <td>{{product.name}}</td>
        <td>{{product.marca}}</td>
        <td>{{product.aceptado}}</td>
      </tr>
    </tbody>
  </table>
    
</template>

<script>

export default {
    data () {
        return {
            products: [
                {
                    name: 'product1',
                    marca: 'marcax',
                    fecha: 'x/x/xxxx',
                    aceptado: 1
                },
                {
                    name: 'product2',
                    marca: 'marcax',
                    fecha: 'x/x/xxxx',
                    aceptado: 1
                },
                {
                    name: 'product3',
                    marca: 'marcax',
                    fecha: 'x/x/xxxx',
                    aceptado: 1
                }
            ]
        }
    }
}
</script>
<style scoped>
   
</style>