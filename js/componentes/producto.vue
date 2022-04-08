<template>
    <div class="product" :id="'product_'+product.idProducto">
        <p v-if="agregado" class="agregado">+</p>
        <router-link :to="'/product/'+ product.idProducto" 
                    class="img_link">
          <img :src="base_url+product.url_imagen" alt="">
        </router-link>
        <p class="title">{{ product.nombreProducto }}</p>
        <p class="price">{{ product.precioVenta }}</p>
        <div class="button-wrapper">
          <btn class="link">
            <router-link :to="'/product/'+product.idProducto" class="ver_producto">Ver</router-link>
          </btn>
          <btn class="white agregar_carrito" :id="'add_producto_'+ product.idProducto"
                v-on:click="comprar(product)">Añadir al Carrito</btn>
        </div>
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
  min-width: 250px;
}
.product img{
  max-width: 100%;
}
.product .agregado{
  position: absolute;
  margin: 0;
  padding: 0 15px;
  height: 25px;
  top: 0;
  right: 0;
  background: #7d47bb;
  color: #fff;
  font-size: 16px;
  line-height: 25px;
  font-weight: bold;  
}
.product .img_link{
  display: block;
  line-height: 0;
}
.product .price{
    position: relative;
    box-sizing: border-box;
    margin: -40px 0 0 auto;
    padding: 10px;
    background: #c2814d;
    color: #ffffff;
    font-weight: bold;
    height: 40px;
    min-width: 100px;
    max-width: 48%;
    z-index: 2;
    text-shadow: 2px 2px 0px rgb(0 0 0 / 20%);
    font-size: 26px;
    line-height: 26px;
}

.product .price:before{
  content:"¢";
}

.product .price:after{
  content:"";
  display: block;
  position: absolute;
  width: 0; 
  height: 0; 
  border-left: 40px solid transparent;
  border-bottom: 40px solid #c2814d;
  left: -40px;
  top: 0;
}

.product .title{
  background: #333;
  color: #efefef;
  font-size: 14px;
  padding: 6px 12px;
  margin: 0;
  overflow: hidden;
}

.product .button-wrapper{
  margin-top: 20px;
}

@media (max-width: 980px) {
  .product .button{
    width: 100%;
    margin-bottom: 5px;
  }
}
</style>