<template>
<div>
    <titulo>{{marca.nombreMarca}}</titulo>
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
    metaInfo: {
    title: 'Marcas',
    meta: [
      { name: 'description', content: 'Nuestras marcas disponibles de nuestros productos.' },
    ]
  },
  data: function() {
    return{
      base_url: site_url,
      mid: this.$route.params.mid,
      productos: {},
      marca: {}
    }
  },
  mounted () {
    
    axios
      .get(site_url + 'api/productos-marca.php', { params: { idMarca: this.mid } })
      .then(response => (this.productos = response.data.data))
      .catch(error => console.log(error));

    axios
      .get(site_url + 'api/marca.php', { params: { idMarca: this.mid } })
      .then(response => (this.marca = response.data.data[0]))
      .catch(error => console.log(error));
    
  },
  components: {
    'producto': httpVueLoader(site_url + 'js/componentes/producto.vue'),
    'carousel': httpVueLoader(site_url + 'js/componentes/carousel.vue'),
    'titulo': httpVueLoader(site_url + 'js/componentes/titulo.vue')


  }
}
</script>
<style scoped>

</style>