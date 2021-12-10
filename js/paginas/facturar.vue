<template>
<div>
  <section v-if="step == 1">
    <titulo>Carrito de Compras</titulo>
    <div class="wrapper">
      <table class="table_itz">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th></th>
            <th>Sub total</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody v-if="carro.items.length>0">
        <tr v-for="product in carro.items" v-bind:key="product.idProducto">
            <td> {{ product.nombreProducto }}</td>
            <td> {{ product.precioVenta }}</td>
            <td> {{product.quantity}}</td> 
            <td> 
              <btn class="white" v-on:click="sumarCarrito(product)">+</btn> 
              <btn v-on:click="restarCarrito(product.idProducto)">-</btn>
            </td>
            <td> {{ (product.precioVenta*product.quantity) }}</td>
            <td>
                <btn v-on:click="eliminarCarrito(product.idProducto)">Eliminar</btn>
            </td>
        </tr>
    </tbody>
    <tbody v-if="carro.items.length<1">
      <tr>
          <td colspan="5"><p>Tu carrito esta vacio.....</p></td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td>Total</td>
            <td colspan="3"></td>
            <td class="text-center"><strong>{{carro.total}}</strong></td>
        </tr>
    </tfoot>
    </table>
    </div>
    </section>

    <section v-if="step == 2">
      <titulo>Agregar Dirección</titulo>

      <div class="wrapper">
        <form action="" method="post">
          <label for="#address">Punto de llegada:</label> <br> <br>
          <textarea name="address" id="address" cols="30" rows="10"></textarea>
          <br>
          <br>
          <input type="submit" value="">
        </form>
      </div>

    </section>

    <div class="wrapper btns-checkin" v-if="carro.items.length > 0">
      <btn class="white" v-if="step > 1" v-on:click="previous()">Anterior</btn>
      <btn class="green" v-if="step <= 2" v-on:click="next()">Siguiente</btn>
    </div>

</div>
</template>

<script>
module.exports = {
  data: function() {
    return{
      step : 1,
      stepTotal : 3,
      mostrar: false,
      message: "text por defecto",
      carro: carrito.state
    }
  },
  computed: {
  },
  mounted () {
  },
  methods: {
    sumarCarrito(product){
      carrito.addItem(product);
    },
    restarCarrito(id){
      carrito.removeItem(id);
    },
    eliminarCarrito(id){
      carrito.deleteItem(id);
    },
    next () {
      this.step += 1;
    },
    previous () {
      this.step -= 1;
    }
  },
  components: {
    'btn': httpVueLoader(site_url + 'js/componentes/btn.vue'),
    'titulo': httpVueLoader(site_url + 'js/componentes/titulo.vue')
  }
}

</script>


<style>
.table_itz {
  width: 100%;
  max-width: 800px;
  background: rgba(255,255,255,0.15);
  text-align: left;
  border-collapse: collapse;
}
.table_itz td,
.table_itz th{
  padding: 10px 15px;
}
.table_itz tbody,
.table_itz tfoot{
  color: #81512a;
}
.table_itz tbody td{
  border-bottom: 1px solid #81512a;
}
.table_itz thead { 
  color: #81512a;
  background: rgb(255 255 255 / 40%);
}
.table_itz tfoot {
  background: #333;
  color: white;
}
.table_itz a{
  color: white;
}
tbody tr td:nth-child(3){
  text-align: center;
}
</style>