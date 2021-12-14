<template>
<div>
  <titulo>Historial de {{user.username}}</titulo>
  <div class="wrapper">
    <table class="history">
      <thead>
        <tr>
          <th>Fecha del Pedido</th>
          <th>Estado Entrega</th>
          <th>Total Compra</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="pedido in user.pedidos" v-bind:key="pedido.idPedido">
          <td> {{ pedido.fecha }} </td>
          <td> {{ (pedido.estadoPedido == 0) ? 'En proceso' : 'Entregado' }} </td>
          <td> {{ pedido.paga }} </td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="5">&nbsp;</td>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
</template>

<script>
module.exports = {
  data: function() {
    return{
      user: {
        username : current_user[1],
        pedidos : {}
      }
    }
  },
  computed : {  },
  mounted () {
    axios
      .get(site_url + 'api/usuario.php')
      .then(response => (this.user.pedidos = response.data.data[1]))
      .catch(error => console.log(error));
  },
  components: {
    'producto': httpVueLoader(site_url + 'js/componentes/producto.vue'),
    'carousel': httpVueLoader(site_url + 'js/componentes/carousel.vue'),
    'titulo': httpVueLoader(site_url + 'js/componentes/titulo.vue')
  }
}
</script>

<style>
.history {
  background-color: rgb(255, 255, 255, 0.15);
  position: relative;
  width: 100%;
  border-collapse: collapse;
}

.history thead {
  background-color: rgb(255, 255, 255 / 40%);
  color: #81512a;
}

.history thead tr th {
  border: white solid 1px;
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

.history tfoot tr td {
  background-color: #333;
  color: white;
  padding: 10px;
  border: white solid 1px;
}
</style>