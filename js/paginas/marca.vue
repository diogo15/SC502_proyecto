<template>
<div>
    <titulo>Marca: {{mid}}</titulo>
    <div class="wrapper">
      
    </div>
</div>
</template>

<script>
module.exports = {
  data: function() {
    return{
      base_url: site_url,
      mid: this.$route.params.mid
    }
  },
  mounted () {
    /*
    axios
      .get(site_url + 'api/producto.php', { params: { pid: this.pid } })
      .then(response => (this.product = response.data.data[0]))
      .catch(error => console.log(error));
    */
    
  },
  components: {
    'titulo': httpVueLoader(site_url + 'js/componentes/titulo.vue')
  }
}
</script>
<style scoped>

</style>