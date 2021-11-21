<template>
  <transition name="fade">
    <div>
        <h1>Acerca De Nostros</h1>
        <p v-for="cat in categories" v-bind:key="cat.idCategoria" class="categories" >
          {{ cat.nombreCategoria }}
        </p>
    </div>
  </transition>
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