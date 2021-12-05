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
        <div class="itz_hero_full">
          <alien class="alien"></alien>
        </div>
      </div>
    </div>
    <!-- End First Section -->
    <div class="itz_section white">
      <div class="wrapper">
        <div class="itz_hero_full bigger">
          En IntoTheZone podras encontrar los mejores diseños en tazas de 
          cafe y camisas hechos por diseñadores ticos!
        </div>
      </div>
    </div>
    <!-- End SECOND Section -->
    <div class="itz_section">
      <div class="wrapper">
        <div class="itz_hero_full bigger robot_container">
          <robot class="robot"></robot>
        </div>
      </div>
    </div>
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
    'alien' : httpVueLoader(site_url + 'js/svg/alien.vue'),
    'robot' : httpVueLoader(site_url + 'js/svg/robot.vue')
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
.itz_section .bigger{
  font-weight: lighter;
  font-size: 44px;
  text-align: center;
}
.itz_section .alien{
  fill: white;
  width: 200px;
  animation:alien 10s linear infinite alternate;
}
.itz_section .robot{
  height: 500px;
  animation:robot 4s ease-in-out infinite alternate;
  fill: #333;
}
.itz_section .robot_container{
  height: 200px;
  overflow: hidden;
}

@keyframes alien
{
  0% {
    margin-left: 0;
    transform: rotate(0);
    fill: #FFFFFF;
  }
  50%{
    margin-left: 40%;
    transform: rotate(-20deg);
    fill: #7D47BB;
  }
  100% {
    margin-left: 80%;
    transform: rotate(0);
    fill: #FFFFFF;
  }
}

@keyframes robot
{
0% {
    transform: rotate(-10deg);
  }
  100% {
    transform: rotate(-20deg);
  }
}
</style>