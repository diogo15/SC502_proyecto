<template>
    <div class="wrapper">
      <h1>Productos Nuevos</h1>

      <carousel>
        <producto
          v-for="product in productos"
          v-bind:key="product.idProducto"
          v-bind:product="product"
        ></producto>
      </carousel>

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
    'producto': httpVueLoader(site_url + 'js/componentes/producto.vue'),
    'carousel': httpVueLoader(site_url + 'js/componentes/carousel.vue')
  }
}
</script>