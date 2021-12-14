<template>
<div>
   <div class="wrapperCarrrusel">  
    <carousel cantidad="1">
      
      
      <banner imagen="banner-consolas.png" color="white">Llegaron Nuevos Productos!!</banner>
      <banner imagen="banner-Xbox.jpg" color="#2a292e">Llegaron Nuevos Productos!!</banner>   
      <banner imagen="banner-xgames.jpg" color="black">Llegaron Nuevos Productos!!</banner>   
      
    
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
        v-for="product in funkos"
        v-bind:key="product.idProducto"
        v-bind:product="product"
      ></producto>
    </carousel>
    <carousel>
      <producto
        v-for="product in medias"
        v-bind:key="product.idProducto"
        v-bind:product="product"
      ></producto>
    </carousel>
    <carousel>
      <producto
        v-for="product in camisas"
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
      funkos: null,
      medias: null,
      camisas: null
      
      //sera agregar aqui algo como productos 2 o algo asi
      
    }
  },
  mounted () {

    axios
      .get(site_url + 'api/productos-categoria.php', { params: { idCategoria: 3 } })
      .then(response => (this.funkos = response.data.data))
      .catch(error => console.log(error));

    axios
      .get(site_url + 'api/productos-marca.php', { params: { idMarca: 4 } })
      .then(response => (this.medias = response.data.data))
      .catch(error => console.log(error));

    axios
      .get(site_url + 'api/productos-categoria.php', { params: { idCategoria: 5 } })
      .then(response => (this.camisas = response.data.data))
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