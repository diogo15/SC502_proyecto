<template>
    <div class="product">
        <p v-if="agregado" class="agregado">Agregado</p>
        <img :src="product.url_imagen" alt="">
        <p>{{ product.nombreProducto }}</p>
        <p>{{ product.precioVenta }}</p>
        <button v-on:click="comprar(product)" class="btn">Comprar</button>     
    </div>
</template>

<script>
module.exports = {
  props: {
    product: Object
  },
  data:function() {
    return{
      agregado: false
    }
  },
  methods: {
    
    comprar(product) {
      carrito.addItem(product);
      this.agregado = true;
    }
    
  }
}
</script>
<style>
.product{
  position: relative;
}
.product img{
  max-width: 100%;
}
.product .agregado{
  position: absolute;
  margin: 0;
  padding: 0 15px;
  height: 25px;
  top: 5px;
  right: 0;
  background: #999;
  color: #333;
  font-size: 12px;
  line-height: 25px;
  border-radius: 5px 0 0 5px;
}
</style>