<template>
  <div>
    <titulo>TIENDA</titulo>
    <div class="wrapper">   

      <carousel>
        
        <producto
          v-for="product in productos"
          v-bind:key="product.idProducto"
          v-bind:product="product"
        ></producto>
        
      </carousel>

    </div>
  </div>
</template>

<script>
module.exports = {
  data: function() {
    return{
      productos: null
    }
  },
  mounted () {
    axios
      .get(site_url + 'api/productos.php')
      .then(response => (this.productos = response.data.data))
      .catch(error => console.log(error));
  },
  components: {
    'carousel': httpVueLoader(site_url + 'js/componentes/carousel.vue'),
    'producto': httpVueLoader(site_url + 'js/componentes/producto.vue'),
    'titulo': httpVueLoader(site_url + 'js/componentes/titulo.vue')
  }
}
</script>