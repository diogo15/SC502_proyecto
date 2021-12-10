<template>
<div>
  <section id="banner">
    <carousel cantidad="1">
      <img src="img/productos/PS5.png">
      <img src="img/productos/Juegosd.jpg">
      <img src="img/productos/Xbox.jpeg">
      <img src="img/productos/Xbox.jpeg">
      <img src="img/productos/Xbox.jpeg">
      <img src="img/productos/Xbox.jpeg">
      <img src="img/productos/xgames.png">
      <img src="img/productos/xgames.png">
      <img src="img/productos/xgames.png">
      <img src="img/productos/xgames.png">
      <img src="img/productos/xgames.png">      
    </carousel>  
    <div class="contenedor">
      <h1>Llegaron Nuevos Productos!!</h1>
      <p>Reserva Ya!!</p>
    </div>
  </section>
  
  <div class="wrapper">
    <div class="flex">
      <categorytile imagen="FunkoB.png">Funko</categorytile>
      <categorytile imagen="consolas.png">Consolas</categorytile>
      <categorytile imagen="camisaO.png">Camisas</categorytile>
    </div>
  </div>

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
    'titulo': httpVueLoader(site_url + 'js/componentes/titulo.vue'),
    'categorytile': httpVueLoader(site_url + 'js/componentes/category-tile.vue')
  }
}
</script>