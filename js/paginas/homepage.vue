<template>
<div>
  <carousel cantidad="1">
      <img class="PS5" src="img/productos/PS5Imagen.png">
      <img src="img/productos/PS5.png">
      <img src="img/productos/PS5.png">
      <img src="img/productos/PS5.png">
      <div>hola hola</div>
    </carousel>  
  <titulo>Productos Nuevos</titulo>
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
    'producto': httpVueLoader(site_url + 'js/componentes/producto.vue'),
    'carousel': httpVueLoader(site_url + 'js/componentes/carousel.vue'),
    'titulo': httpVueLoader(site_url + 'js/componentes/titulo.vue')
  }
}
</script>