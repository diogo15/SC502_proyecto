<template>
<div>
    <titulo>{{product.nombreProducto}}</titulo>
    <div class="wrapper">
      <div class="flex product-single">
        <div class="productLeft">
          <img :src="base_url+product.url_imagen" alt="">
        </div>
        <div class="productRight">          
          <p>Descripcion: {{product.descripProducto}} </p>
          <p>Precio: {{product.precioVenta}} </p>
          <p>Marca: {{product.nombreMarca}} </p>
          <p>Categoria: <router-link :to="'/category/'+product.idCategoria">{{product.nombreCategoria}}</router-link></p>
        </div>
      </div>
    </div>
</div>
</template>

<script>
module.exports = {
  data: function() {
    return{
      base_url: site_url,
      product: {},
      pid: this.$route.params.pid
    }
  },
  mounted () {
    
    axios
      .get(site_url + 'api/producto.php', { params: { pid: this.pid } })
      .then(response => (this.product = response.data.data[0]))
      .catch(error => console.log(error));
    
  },
  components: {
    'titulo': httpVueLoader(site_url + 'js/componentes/titulo.vue')
  }
}
</script>
<style scoped>
img{
  max-width: 100%;
}
.product-single .productLeft{
  max-width: 40%;
}
</style>