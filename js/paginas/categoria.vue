<template>
<div>
    <titulo>{{categoria.nombreCategoria}}</titulo>
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
    tittle: 'Categorias',
    meta: [
      { name: 'description', content: 'Apartado de Categorias disponibles para nuestros clientes.'},
    ]
  },
  data: function() {
    return{
      base_url: site_url,
      cid: this.$route.params.cid,
      productos: {},
      categoria: {}
    }
  },
  mounted () {
    axios
      .get(site_url + 'api/productos-categoria.php', { params: { idCategoria: this.cid } })
      .then(response => (this.productos = response.data.data))
      .catch(error => console.log(error));

      axios
      .get(site_url + 'api/categoria.php', { params: { idCategoria: this.cid } })
      .then(response => (this.categoria = response.data.data[0]))
      .catch(error => console.log(error));
    
  },
  components: {
    'titulo': httpVueLoader(site_url + 'js/componentes/titulo.vue'),
    'producto': httpVueLoader(site_url + 'js/componentes/producto.vue'),
    'carousel': httpVueLoader(site_url + 'js/componentes/carousel.vue')
  }
}
</script>
<style scoped>

</style>