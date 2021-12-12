<template>

<div id="banner">
  <img class="img-carousel3" v-bind:src="'img/productos/'+imagen"/>
    <div class="banner1 h1">
        <h1><slot></slot></h1>
        <btn class="link"><router-link to="/tienda">Ver Mas</router-link></btn>
    </div>
</div>

</template>
<script>
module.exports = {
  props:{
        imagen:String
    },
    components: {
        'btn': httpVueLoader(site_url + 'js/componentes/btn.vue')
  }
}
</script>
<style>

#banner{
  position: relative;
  
}
#banner .banner1{
  position: absolute;
  bottom: 5%;
  left: 100px;
  color: white;
}
#banner p{
  font-size: 20px;
  display: block;
  color: rgb(255, 255, 255);
  text-decoration: none;
  padding: 10px;
  margin-top: 20px;
  border: 2px solid peru;
  width: 25%;
}
#banner p:hover{
  background: rgba(51, 51, 51, 0.6);
  width: 25%;
}
#banner h1{
  display: block;
  line-height: 50%;
}
#banner img{
  width: 100%;
}


</style>