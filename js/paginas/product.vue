<template>
<div>
    <div class="wrapper">
      <div class="flex product-single">
        <div class="productLeft">
          <img :src="product.url_imagen" alt="">
        </div>
        <div class="productRight">          
          <titulo>{{product.nombreProducto}}</titulo>
          <p class="price">{{product.precioVenta}} </p>
          <btn class="purple" v-on:click="comprar(product)" >Añadir al Carrito</btn>
          <p><span class="product-subtitle">Descripcion:</span> {{product.descripProducto}} </p>
          <p><span class="product-subtitle">Marca:</span><btn class="link"><router-link :to="'/marca/'+product.idMarca">{{product.nombreMarca}}</router-link></btn></p>
          <p><span class="product-subtitle">Categoria: </span><btn class="link"><router-link :to="'/categoria/'+product.idCategoria">{{product.nombreCategoria}}</router-link></btn></p>
        </div>
      </div>
    </div>
</div>
</template>

<script>
module.exports = {
    metaInfo: {
    title: 'Productos',
    meta: [
      { name: 'description', content: 'Bienvinidos al apartado de nuestros productos a disposición del cliente.' },
    ]
  },
  data: function() {
    return{
      base_url: site_url,
      product: {},
      pid: this.$route.params.pid
    }
  },
  methods: {
    
    comprar(product) {
      carrito.addItem(product);
      this.agregado = true;
    }
    
  },
  mounted () {
    
    axios
      .get(site_url + 'api/producto.php', { params: { pid: this.pid } })
      .then(response => {
        response.data.data[0].url_imagen = site_url + response.data.data[0].url_imagen;
        this.product = response.data.data[0];
      })
      .catch(error => console.log(error));
    
  },
  components: {
    'titulo': httpVueLoader(site_url + 'js/componentes/titulo.vue'),
    'btn': httpVueLoader(site_url + 'js/componentes/btn.vue')
  }
}
</script>
<style scoped>

.product-single{
  justify-content: space-between;
  margin-top: 30px;
}
.product-single .productLeft{
  max-width: 45%;
  padding: 20px;
  background: rgba(255,255,255,0.2);
}
.product-single .productRight{
  width: 50%;
}
.product-single .bigTitle{
  margin-left: -50px;
  padding-left: 20px;
}

@media (max-width: 980px) {
  .product-single .bigTitle .wrapper{
    padding: 0 30px;
  }
}

.product-single .price{
  font-size: 35px;
  line-height: 1;
}
.product-single .price:before{
  content: "¢";
}
.product-single .button{
  text-transform: capitalize;
}

.product-single .product-subtitle{
  display: block;
  font-weight: bold;
}
</style>