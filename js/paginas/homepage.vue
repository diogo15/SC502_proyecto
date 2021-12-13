<template>
<div>
  <titulo>Productos Nuevos</titulo>
  <div class="wrapper">    
    <carousel>
      <producto
        v-for="product in productos"
        v-bind:key="product.idProducto"
        v-bind:product="product"
      ></producto>
    </carousel>
    <carousel>
      <producto
        v-for="product in productos2"
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
      productos: null,
      productos2: null
      
      //sera agregar aqui algo como productos 2 o algo asi
      
    }
  },
  mounted () {

    axios
      .get(site_url + 'api/productos-categoria.php', { params: { idCategoria: 3 } })
      .then(response => (this.productos = response.data.data))
      .catch(error => console.log(error));

      axios
      .get(site_url + 'api/productos-marca.php', { params: { idMarca: 3 } })
      .then(response => (this.productos2 = response.data.data))
      .catch(error => console.log(error));
    
  },
  components: {
    'producto': httpVueLoader(site_url + 'js/componentes/producto.vue'),
    'carousel': httpVueLoader(site_url + 'js/componentes/carousel.vue'),
    'titulo': httpVueLoader(site_url + 'js/componentes/titulo.vue')
  }
}
</script>