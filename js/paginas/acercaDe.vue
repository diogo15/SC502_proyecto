<template>
    <div class="wrapper">
        <h1>Acerca De Nostros</h1>
        <p v-for="cat in categories" v-bind:key="cat.idCategoria" >
          {{ cat.nombreCategoria }}
        </p>
    </div>
</template>

<script>
module.exports = {
  data: function() {
    return{
      categories: null
    }
  },
  mounted () {
    axios
      .get(site_url + 'api/categorias.php')
      .then(response => (this.categories = response.data.data))
      .catch(error => console.log(error));
  }
}
</script>