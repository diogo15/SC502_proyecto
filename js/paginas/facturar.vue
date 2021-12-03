<template>
    <div class="wrapper">
           <h1>Carrito de compras</h1>
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
            <td> <btn class="white" v-on:click="sumarCarrito(product)">+</btn> <btn>-</btn></td>
            <td> {{ (product.precioVenta*product.quantity) }}</td>
            <td>
                <btn>Eliminar</btn>
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
            <td><btn class="green">Pagar</btn></td>
        </tr>
    </tfoot>
    </table>

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
  computed: {
  },
  mounted () {
  },
  methods: {
    eliminarProducto(){      
    },
    sumarCarrito(product){
      carrito.addItem(product);
    }    
  },
  components: {
    'btn': httpVueLoader(site_url + 'js/componentes/btn.vue')
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