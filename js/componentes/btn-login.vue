<template>

  <div class="popup">
    <slot />
    <v-button></v-button>
  </div>

</template>

<script>
import '../paginas/login.vue';

module.exports = {
  data : function () {
    return {
      base_url : site_url,
      log : login.state
    }
  },
  methods : {
    logged () {


      this.loginIcon = 'user-check'
    }
  },
  components : {
    'icono' : httpVueLoader(site_url + 'js/svg/login-icon.vue')
  }
}
</script>

<style>
  .btn-login {
    display: flex;
    padding: 5px;
    width: 30px;
    height: 25px;
    justify-content: center;
    line-height: 25px;
    border-radius: 5px;
    border: 2px solid #7D47BB;
    color: #7D47BB;
    font-weight: bold;
    cursor: pointer;
  }

  .btn-login .user-icon {
    width: 15px;
    margin-right: 5px;
    height: auto;
  }

  .btn-login.active{
    background: #7D47BB;
    color: white;
  }
</style>