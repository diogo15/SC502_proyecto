<template>
    <div class="wrapper">
        <h1>Productos Nuevos</h1>
        <p v-for="p in productos" v-bind:key="p.idProducto" >
          {{ p.nombreProducto }}
          {{ p.url_imagen }}
          <img :src="this.site_url+p.url_imagen" alt="">
        </p>
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
  }
}
</script>