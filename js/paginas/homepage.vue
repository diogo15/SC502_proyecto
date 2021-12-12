<template>
<div>
   <div class="wrapperCarrrusel">  
    <carousel cantidad="1">
      
      
      <banner imagen="banner-consolas.png">Llegaron Nuevos Productos!!</banner>   
      <banner imagen="banner-PS5.jpg"></banner>   
      <banner imagen="banner-Xbox.jpg">Llegaron Nuevos Productos!!</banner>   
      <banner imagen="banner-xgames.jpg">Llegaron Nuevos Productos!!</banner>   
      
    
    </carousel> 
   </div> 
    
  
    
  
  <div class="wrapper">
    <div class="flex">
      <categorytile imagen="FunkoB.png">Funko</categorytile>
      <categorytile imagen="banner-consolas.png">Consolas</categorytile>
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
    'categorytile': httpVueLoader(site_url + 'js/componentes/category-tile.vue'),
    'banner': httpVueLoader(site_url + 'js/componentes/banner.vue')
  }
}
</script>