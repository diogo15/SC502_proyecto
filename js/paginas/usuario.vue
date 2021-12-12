<template>
<div>
  <titulo>{{user.nombreUser}}</titulo>
  <div class="wrapper">

  </div>
</div>
</template>

<script>
module.exports = {
  data: function() {
    return{
      user: {}
    }
  },
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