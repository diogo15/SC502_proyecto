<template>
    <div class="product">
        <img :src="product.url_imagen" alt="">
        <p>{{ product.nombreProducto }}</p>
        <p>{{ product.precioVenta }}</p>
        <button @click="comprar(product)" class="btn">Comprar</button>     
    </div>
</template>

<script>
module.exports = {
  props: {
    product: Object
  },
  methods: {
    
    comprar(product) {
      alert(product.nombreProducto+" agregado!");
    }
    
  }
}
</script>
<style>
.product img{
  max-width: 100%;
}
</style>