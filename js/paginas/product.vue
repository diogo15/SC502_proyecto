<template>
    <div class="wrapper">
        <h1>PRODCUT ID: {{$route.params.pid}}</h1>

    </div>
</template>

<script>
module.exports = {
  data: function() {
    return{
      product_data: null
    }
  },
  mounted () {
    /* 
    axios
      .get(site_url + 'api/product.php')
      .then(response => (this.product_data = response.data.data))
      .catch(error => console.log(error));
    */
  }
}
</script>