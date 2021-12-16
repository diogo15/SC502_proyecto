<template>
  <div>
    <titulo>Videojuegos</titulo>
    <div class="wrapper">   

        <carousel>
        <producto
          v-for="product in videojuegos"
          v-bind:key="product.idProducto"
          v-bind:product="product"
        ></producto>
      </carousel>

    </div>
    <titulo>Consolas</titulo>
    <div class="wrapper">

      <carousel>        
        <producto
          v-for="product in consolas"
          v-bind:key="product.idProducto"
          v-bind:product="product"
        ></producto>        
      </carousel>
      
    </div>
    <titulo>Figuras</titulo>
    <div class="wrapper">

       <carousel>        
        <producto
          v-for="product in funkos"
          v-bind:key="product.idProducto"
          v-bind:product="product"
        ></producto>        
      </carousel>

    </div>
    <titulo>Medias</titulo>
    <div class="wrapper">

      <carousel>
        <producto
          v-for="product in medias"
          v-bind:key="product.idProducto"
          v-bind:product="product"
        ></producto>
      </carousel>

    </div>
    <titulo>Camisas</titulo>
    <div class="wrapper">

        <carousel>
        <producto
          v-for="product in camisas"
          v-bind:key="product.idProducto"
          v-bind:product="product"
        ></producto>
      </carousel>
    </div>
    <titulo>Accesorios</titulo>
    <div class="wrapper">

      <carousel>
        <producto
          v-for="product in accesorios"
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
      camisas: null,
      medias: null,
      consolas: null,
      accesorios: null,
      videojuegos: null
    }
  },
  mounted () {
    axios
      .get(site_url + 'api/productos-categoria.php', { params: { idCategoria: 3 } })
      .then(response => (this.funkos = response.data.data))
      .catch(error => console.log(error));

    axios
      .get(site_url + 'api/productos-categoria.php', { params: { idCategoria: 5 } })
      .then(response => (this.camisas = response.data.data))
      .catch(error => console.log(error));

    axios
      .get(site_url + 'api/productos-marca.php', { params: { idMarca: 4 } })
      .then(response => (this.medias = response.data.data))
      .catch(error => console.log(error));

    axios
      .get(site_url + 'api/productos-categoria.php', { params: { idCategoria: 2 } })
      .then(response => (this.consolas = response.data.data))
      .catch(error => console.log(error));

    axios
      .get(site_url + 'api/productos-categoria.php', { params: { idCategoria: 6 } })
      .then(response => (this.accesorios = response.data.data))
      .catch(error => console.log(error));

    axios
      .get(site_url + 'api/productos-categoria.php', { params: { idCategoria: 1 } })
      .then(response => (this.videojuegos = response.data.data))
      .catch(error => console.log(error));
  
    

    

  },
  components: {
    'carousel': httpVueLoader(site_url + 'js/componentes/carousel.vue'),
    'producto': httpVueLoader(site_url + 'js/componentes/producto.vue'),
    'titulo': httpVueLoader(site_url + 'js/componentes/titulo.vue')
  }
}
</script>