<template>
<div>
  <section v-if="!loggedin">
    <titulo>Unite a nuestra comunidad</titulo>
    <div class="wrapper">
      <p>Parece que no formas parte de nuestra tienda!</p>
      <p>Registrate o inicia sesión para proceder con tu compra online</p>

      <btn class="link purple">
        <router-link to="/registro">Registro</router-link>
      </btn>
      <br>
      <btn class="link green">
        <router-link to="/login">Iniciar Sesión</router-link>
      </btn>
    </div>
  </section>

  <section v-if="step == 1 && loggedin">
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
              <btn class="white btn_mas" v-on:click="sumarCarrito(product)">+</btn> 
              <btn class="btn_menos" v-on:click="restarCarrito(product.idProducto)">-</btn>
            </td>
            <td> {{ (product.precioVenta*product.quantity) }}</td>
            <td>
                <btn v-on:click="eliminarCarrito(product.idProducto)" :id="'eliminar_product_' + product.idProducto">Eliminar</btn>
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

    <section v-if="step == 2 && loggedin">
      <titulo>Agregar Dirección</titulo>

      <div class="wrapper">
        <div class="form-style">
            <label for="#address">Punto de llegada:</label> <br> <br>
            <textarea v-model="Address" name="address" id="address" cols="55" rows="10" placeholder="Agregue la dirección a donde quiere que su pedido llegue."></textarea>
       <label for="#dropbox">Seleccione la provincia en donde reside usted actualmente:</label>
            <br>
            <select name="Provincias" id="dropbox" v-model="provincia">
              <option value="1">San José</option>
              <option value="2">Heredia</option>
              <option value="3">Cartago</option>
              <option value="4">Alajuela</option>
              <option value="5">Limón</option>
              <option value="6">Guanacaste</option>
              <option value="7">Puntarenas</option>
            </select>
        </div>

      </div>
    </section>

    <section v-if="step == 3  && loggedin">
      <titulo>Datos de tarjeta</titulo>

      <div class="wrapper">
        <div class="form-style">
          <div>
            <form method="post">
            <label for="tarjeta">Efectivo o Tarjeta</label>
            <br><br>
            <input type="radio" v-model="TipoPago" value="Efectivo" id="Efectivo"/> <label for="Efectivo">Efectivo</label>
            <input type="radio" v-model="TipoPago" value="Tarjeta" id="Tarjeta"/> <label for="Tarjeta">Tarjeta</label>
            <br><br>
            <label for="">Número de Tarjeta</label>
            <input type="text" name="datosTarjeta" v-model="Tarjeta">
            <br><br>
            <input type="radio" v-model="TipoTarjeta" value="Visa" id="Visa"/> <label for="Visa">Visa</label>
            <input type="radio" v-model="TipoTarjeta" value="MasterCard" id="MasterCard"/> <label for="MasterCard">MasterCard</label>
            <br><br>
            <label for="">Código de Seguridad</label>
            <input type="text" name="seguridad" v-model="CodSeguridad">
            </form>
          </div>
      </div>
      </div>
    </section>

    <div class="wrapper" v-if="carro.items.length > 0">
      <div class="btns-checkin">
        <btn class="white" v-if="step > 1" v-on:click="previous()">Anterior</btn>
        <btn class="green" v-if="step <= 2" v-on:click="next()">Siguiente</btn>
        <btn class="purple" v-if="step == 3" v-on:click="facturar()">Enviar pedido</btn>
      </div>
    </div>

    <p v-if="message">{{message}}</p>

</div>
</template>

<script>
module.exports = {
  metaInfo: {
     title: 'Facturar',
    meta: [
      { name: 'description', content: 'Apartado de facturar donde usted podra realiza el pago de la compra adquirida, Muchas Gracias' },
    ]
  },
  data: function() {
    return{
      step : 1,
      mostrar: false,
      message: "",
      carro: carrito.state,
      provincia : 1,
      TipoPago : "",
      Tarjeta : "",
      Address : "",
      TipoTarjeta : "",
      CodSeguridad : "",
      loggedin : current_user[0],
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
    },
    facturar(){
      var productos = [];

      for (let index = 0; index < this.carro.items.length; index++) {
        productos.push({
          "idProducto": this.carro.items[index].idProducto,
          "cantidad": this.carro.items[index].quantity
        });
      }

      var formData = new FormData();

      formData.append("provincia", this.provincia);
      formData.append("items", JSON.stringify(productos));
      formData.append("total", this.carro.total);

      axios.post(site_url + 'api/pedido.php', formData, {
          headers: { 'Content-Type': 'multipart/form-data' }
      }).then(response => {
          if(response.data.error){
            this.message= "Error Intenta de Nuevo";                    
          }else{
            this.message= "Pedido Agregado Exitoso!";
            carrito.clearItems();
          }
      }).catch(err => {
          console.log(err)
      });

    },
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
  max-width: 1000px;
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
.table_itz tbody tr td:nth-child(3){
  text-align: center;
}
.btns-checkin{
  display: flex;
  justify-content: flex-end;
  margin-right: 50px;
  padding: 10px;
}
.form-style {
  display: flex;
  flex-direction: row;
  position: relative;
  background-color: white;
  border-radius: 10px;
  padding: 30px;
}
.form-style textarea{
  position: relative;
  border-radius: 10px;
}
select{
  width: 100%;
}
</style>