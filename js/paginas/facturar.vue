<template>
    <div class="wrapper">
        <h1>Facturar</h1>
        
        <ul class="ISAAAAC">
          <li v-for="product in carro.items" v-bind:key="product.idProducto">
            {{ product.nombreProducto }}, {{ product.precioVenta }}
          </li>
        </ul>

    </div>
</template>

<script>
module.exports = {
  data: function() {
    return{
      mostrar: false,
      message: "text por defecto",
      carro: carrito.state
    }
  },
  mounted () {

  }
}
</script>