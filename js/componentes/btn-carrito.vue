<template>
    <div  id="btn_carrito"
          v-bind:class="[{ active: isActive }, 'btn-carrito']" 
          v-on:click="gotoFacturar()">
      <p class="cart-icon"><icono></icono></p>
      <p v-if="quantity">{{ quantity }}</p>    
    </div>
</template>

<script>
module.exports = {

  data:function() {
    return{
      base_url: site_url,
      carro: carrito.state
    }
  },
  computed: {
    quantity: function () {
      return this.carro.items.length;
    },
    isActive: function () {
      return (this.quantity > 0) ? true : false;
    }
  },
  methods: {
    gotoFacturar(){      
      if (this.$route.path != '/facturar') {
          router.push('/facturar');
      }
    }    
  },
  components: {
    'icono': httpVueLoader(site_url + 'js/svg/shopping-cart.vue')
  }
}
</script>
<style>
.btn-carrito{
  display: flex;
  padding: 5px;
  width: 30px;
  height: 25px;
  justify-content: center;
  line-height: 25px;
  border-radius: 5px;
  border: 2px solid #7D47BB;
  color: #7D47BB;
  font-weight: bold;
  cursor: pointer;
}
.btn-carrito.active{
  background: #7D47BB;
  color: white;
}
.btn-carrito p{
  margin: 0;
}
.btn-carrito .cart-icon{
  width: 15px;
  margin-right:2px;
  height: auto;
}
</style>