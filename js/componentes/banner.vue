<template>

<div id="banner">
  <img v-bind:src="'img/productos/'+imagen"/>
    <div class="promoText">
        <h2><slot></slot></h2>
        <btn class="link white"><router-link to="/tienda">Ver Mas</router-link></btn>
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
#banner .promoText{
  position: absolute;
  bottom: 5%;
  padding: 20px 50px 20px 5%;
  color: white;
  background: #333;
  border-right: 10px solid #C2814D;
}
#banner h2{
  margin: 0 0 10px 0;
}
#banner img{
  width: 100%;
}
.promoText .button.link a{
  color: #333;
}


</style>