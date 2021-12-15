<template>
<div>
  <titulo>Pedidos</titulo>
  <div class="wrapper">
    <table class="history" v-for="pedido in pedidos" v-bind:key="pedido.idPedido">
      <thead>
        <tr>
          <th><span>Pedido Realizado:</span> {{ pedido[0].fecha }}</th>
          <th><span>Total:</span> {{pedido[0].paga }}</th>
          <th><span>Estado Entrega:</span> {{ (pedido[0].estadoPedido == 0) ? 'En proceso' : 'Entregado' }}</th>
          <th><btn v-on:click="expanded=!expanded">{{ (!expanded) ? "Ver Detalle" : "Ocultar" }}</btn></th>
        </tr>
      </thead>
      <tbody v-if="expanded">
        <tr v-for="product in pedido" v-bind:key="product.idProducto">
          <td> {{ product.nombreProducto }} </td>
          <td> {{ product.cantidad }} </td>
          <td> {{ product.totalLinea }} </td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
</template>

<script>
module.exports = {
    metaInfo: {
    title: 'Usuarios',
    meta: [
      { name: 'description', content: 'Apartado de nuestro usuarios.' },
    ]
  },
  data: function() {
    return{
      username : current_user[1],
      pedidos : {},
      expanded: false
    }
  },
  computed : {  },
  mounted () {
    axios
      .get(site_url + 'api/usuario.php')
      .then(response => (this.pedidos = response.data.data[1]))
      .catch(error => console.log(error));
  },
  components: {
    'producto': httpVueLoader(site_url + 'js/componentes/producto.vue'),
    'carousel': httpVueLoader(site_url + 'js/componentes/carousel.vue'),
    'titulo': httpVueLoader(site_url + 'js/componentes/titulo.vue'),
    'btn': httpVueLoader(site_url + 'js/componentes/btn.vue')
  }
}
</script>

<style>
.history {
  background-color: rgb(255, 255, 255, 0.15);
  position: relative;
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 40px;
}

.history thead {
  background-color: #333;
  color: #FFF;
  text-align: left;
}

.history thead span{
  display: block;
  font-size: 14px;
  font-weight: normal;
}

.history thead tr th {
  padding: 10px;
}

.history tbody tr td {
  padding: 10px;
}

.history td, .history th {
  padding: 15px, 15px;
}

.history tbody {
  color: #81512a;
}

.history thead th:last-child{
  text-align: right;
}

.history thead tr th{
  width: 300px;
}

</style>