<template>
    <div class="wrapper">
           <h1>Carrito de compras</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Sub total</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody v-if="carro.items.length>0">
        <tr v-for="product in carro.items" v-bind:key="product.idProducto">
            <td> {{ product.nombreProducto }}</td>
            <td> {{ product.precioVenta }}</td>
            <td> {{product.quantity}}<input type="button" value="+" v-on:click="sumarCarrito(product)"></td> 
            <td> {{ (product.precioVenta*product.quantity) }}</td>
            <td>
                <span v-on="eliminarProducto(product.idProducto)">Eliminar</span>
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
            <td><router-link to="/tienda">Tienda</router-link></td>
            <td colspan="2"></td>
            <td class="text-center"><strong>Total {{carro.total}}</strong></td>
            <td>Pagar</td>
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
}

</script>