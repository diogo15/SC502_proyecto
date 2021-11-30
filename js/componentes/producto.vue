<template>
    <div class="product">
        <p v-if="agregado" class="agregado">Agregado</p>
        <router-link :to="'/product/'+product.idProducto">
          <img :src="base_url+product.url_imagen" alt="">
        </router-link>
        <p>{{ product.nombreProducto }}</p>
        <p>{{ product.precioVenta }}</p>
        <btn class="link"><router-link :to="'/product/'+product.idProducto">Ver</router-link></btn>
        <btn class="white" v-on:click="comprar(product)" >Añadir al Carrito</btn>
    </div>
</template>

<script>
module.exports = {
  props: {
    product: Object
  },
  data:function() {
    return{
      base_url: site_url,
      agregado: false
    }
  },
  methods: {
    
    comprar(product) {
      carrito.addItem(product);
      this.agregado = true;
    }
    
  },
  components: {
    'btn': httpVueLoader(site_url + 'js/componentes/btn.vue')
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