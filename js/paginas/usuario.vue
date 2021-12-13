<template>
<div>
  <titulo>Historial de {{user.username}}</titulo>
  <div class="wrapper">
    <table>
      <thead>
        <tr>
          <th>Nombre del Producto</th>
          <th>Cantidad</th>
          <th>Total del Producto</th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </div>
</div>
</template>

<script>
module.exports = {
  data: function() {
    return{
      user: {
        username : current_user[1]
      }
    }
  },
  computed : {  },
  mounted () {
    axios
      .get(site_url + 'api/usuario.php')
      .then(response => (this.user = response.data.data[0]))
      .catch(error => console.log(error));
  },
  components: {
    'producto': httpVueLoader(site_url + 'js/componentes/producto.vue'),
    'carousel': httpVueLoader(site_url + 'js/componentes/carousel.vue'),
    'titulo': httpVueLoader(site_url + 'js/componentes/titulo.vue')
  }
}
</script>

<style>

</style>