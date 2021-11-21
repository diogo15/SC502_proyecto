<template>
    <div>
        <h1>HOMEPAGE</h1>
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
      .get(site_url + 'api/categories.php')
      .then(response => (this.categories = response.data.data))
      .catch(error => console.log(error));
  }
}
</script>