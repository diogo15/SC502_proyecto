<template>
  <transition name="slide">
    <div>
        <h1>Acerca De Nostros</h1>
        <div v-for="cat in categories" class="categories" >
        {{ cat.nombreCategoria }}
        </div>
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