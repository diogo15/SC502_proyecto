<template>
<div>
  <div class="wrapperCarrrusel">  
    <carousel cantidad="1">
      
      <banner imagen="banner-consolas.png" color="white">Llegaron nuevas consolas!!</banner>
      <banner imagen="banner-Xbox.jpg" color="#2a292e">Nuevo Xbox Series X, reserva ya!</banner>   
      <banner imagen="banner-xgames.jpg" color="black">Llegaron Nuevos Juegos Ilimitados!</banner>       
    
    </carousel> 
  </div> 

  <split v-observe-visibility="visibilityChanged" imagen="about-us.png">
    <btn class="link"><router-link to="/acercade">Conócenos</router-link></btn>
  </split>
    
  <div class="wrapper">
    <div class="flex between showcase">
      <categorytile v-observe-visibility="visibilityChanged" imagen="FunkoB.png">Funko</categorytile>
      <categorytile v-observe-visibility="visibilityChanged" imagen="banner-consolas.png">Consolas</categorytile>
      <categorytile v-observe-visibility="visibilityChanged" imagen="camisaO.png">Camisas</categorytile>
    </div>
  </div>

  <split v-observe-visibility="visibilityChanged" imagen="banner2.png">
    <p>Los mejores :&nbsp;</p><br>
    <btn class="link"><router-link to="/marca/1">Funko</router-link></btn>
  </split>
  

</div>
</template>

<script>
module.exports = {
  metaInfo: {
        title: 'Página Principal',
    meta: [
      { name: 'description', content: 'Bienvenidos a IntotheZone. Su mejor opcion en productos geeks.' },
    ]
  },
  data: function() {
    return{
      funkos: null,
      medias: null,
      camisas: null
      
    }
  },
  mounted () {

    axios
      .get(site_url + 'api/productos-categoria.php', { params: { idCategoria: 3 } })
      .then(response => (this.funkos = response.data.data))
      .catch(error => console.log(error));

    axios
      .get(site_url + 'api/productos-marca.php', { params: { idMarca: 4 } })
      .then(response => (this.medias = response.data.data))
      .catch(error => console.log(error));

    axios
      .get(site_url + 'api/productos-categoria.php', { params: { idCategoria: 5 } })
      .then(response => (this.camisas = response.data.data))
      .catch(error => console.log(error));
    
  },
  methods: {
    visibilityChanged (isVisible, entry) {
      if (entry.intersectionRatio > 0) {
        entry.target.classList.add('showAnim');
      }
    }
  },
  components: {
    'producto': httpVueLoader(site_url + 'js/componentes/producto.vue'),
    'carousel': httpVueLoader(site_url + 'js/componentes/carousel.vue'),
    'titulo': httpVueLoader(site_url + 'js/componentes/titulo.vue'),
    'categorytile': httpVueLoader(site_url + 'js/componentes/category-tile.vue'),
    'banner': httpVueLoader(site_url + 'js/componentes/banner.vue'),
    'split': httpVueLoader(site_url + 'js/componentes/split-section.vue'),
    'btn': httpVueLoader(site_url + 'js/componentes/btn.vue')
  }
}
</script>

<style>
.showcase{
  margin: 40px 0 80px;
}
</style>