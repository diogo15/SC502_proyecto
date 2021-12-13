<template>
  <div>
    <titulo>Acerca de Nosotros</titulo>
    <div class="itz_section purple">
      <div class="wrapper">
        <div class="itz_hero flex">
          <div class="content">
            Somos un pequeño grupo de amigos que decidio abrir una tienda 
            virtual alrededor de los productos geek, focalizados 
            en la produccion tica y luego en la importacion.
          </div>
          <div class="image">
            <img :src="base_url+'img/photos/shirts.jpg'" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- End SECOND Section -->
    <div class="itz_section gray">
      <div class="wrapper">
        <div class="itz_hero_full alien_width">
          <alien class="alien"></alien>
        </div>
      </div>
    </div>
    <!-- End First Section -->
    <div class="itz_section white">
      <div class="wrapper">
        <div class="itz_hero_full bigger">
          En IntoTheZone podras encontrar los mejores diseños en medias
          y camisas hechas por diseñadores ticos!
        </div>
      </div>
    </div>
    <!-- End SECOND Section -->
  </div>
</template>

<script>
module.exports = {
  metaInfo: {
    title: 'Acerca de Nosotros',
    meta: [
      { name: 'description', content: 'Somos una tienda virtual especializada en traer lo ultimo en juguetes geek.' },
    ]
  },
  data: function() {
    return{
      message: null,
      base_url: site_url,
    }
  },
  mounted () {    
  },
  components: {
    'titulo': httpVueLoader(site_url + 'js/componentes/titulo.vue'),
    'alien' : httpVueLoader(site_url + 'js/svg/alien.vue')
  }
}
</script>
<style>
.itz_section.purple{
  background: #7D47BB;
  color: white;
}
.itz_section.white{
  background: white;
  color: #7D47BB;
}
.itz_section.gray{
  background: #333;
}
.itz_hero{
  align-items: center;
}
.itz_hero .content,
.itz_hero .image{
  box-sizing: border-box;
  width: 50%;  
}
.itz_hero .image{
  line-height: 0;
}
.itz_hero .content{
  padding: 40px 40px 40px 0;
}
.itz_hero_full{
  padding: 40px 0;
}
.alien_width{
  padding-right: 200px;
}
.itz_section .bigger{
  font-weight: lighter;
  font-size: 44px;
  text-align: center;
}
.itz_section .alien{
  fill: white;
  width: 200px;
  animation:alien 10s linear infinite;
}


@keyframes alien
{
  0% {
    margin-left: 0;
    transform: rotate(0) scale(0.7);
    fill: #FFFFFF;
    opacity: 0;
  }
  50%{
    margin-left: 50%;
    transform: rotate(-20deg) scale(1.3);
    fill: #7D47BB;
    opacity: 1;
  }
  100% {
    margin-left: 100%;
    transform: rotate(0) scale(0.9);
    fill: #FFFFFF;
    opacity: 0;
  }
}

</style>