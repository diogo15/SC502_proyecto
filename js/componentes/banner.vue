<template>

<div id="banner" :style="'background-color:'+color">
  <div class="wrapper">
    <img v-bind:src="'img/productos/'+imagen"/>
    <div class="promoText">
      <div class="promoInner">
        <h2><slot></slot></h2>
        <btn class="link white"><router-link to="/tienda">Ver Mas</router-link></btn>
      </div>
    </div>
  </div>
</div>

</template>
<script>
module.exports = {
  props:{
        imagen:String,
        color:String
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
}
#banner .promoInner{
  position: relative;
  z-index: 2;
}
#banner .promoText:after{
  content: "";
  display: block;
  position: absolute;  
  background: #333;
  border: 10px solid #C2814D;
  border-top: none;
  border-bottom: none;
  transform: skewX(340deg);
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 0;
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

@media (max-width: 980px) {
  #banner .promoText{
    position: relative;
    display: block;
    margin: 0 -15px;
  }
  #banner h2{
    font-size: 16px;
  }
  #banner .promoText:after{
    transform: skew(0);
  }
}

</style>