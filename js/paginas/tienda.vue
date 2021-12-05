<template>
  <div>
    <titulo>Tienda</titulo>
    <div class="wrapper">   

      <carousel>
        
        <producto
          v-for="product in productos"
          v-bind:key="product.idProducto"
          v-bind:product="product"
        ></producto>
        
      </carousel>

      <p v-for="cat in categories" v-bind:key="cat.idCategoria" >
        {{ cat.nombreCategoria }}
      </p>

    </div>
  </div>
</template>

<script>
module.exports = {
  data: function() {
    return{
      productos: null,
      categories: null
    }
  },
  mounted () {
    axios
      .get(site_url + 'api/productos.php')
      .then(response => (this.productos = response.data.data))
      .catch(error => console.log(error));

    axios
      .get(site_url + 'api/categorias.php')
      .then(response => (this.categories = response.data.data))
      .catch(error => console.log(error));
  },
  components: {
    'carousel': httpVueLoader(site_url + 'js/componentes/carousel.vue'),
    'producto': httpVueLoader(site_url + 'js/componentes/producto.vue'),
    'titulo': httpVueLoader(site_url + 'js/componentes/titulo.vue')
  }
}
</script>