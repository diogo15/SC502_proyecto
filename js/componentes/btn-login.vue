<template>

 <div v-bind:class="[{ active : isActive }, 'btn-login']" v-on:click="$emit('click', $event)">
      <p class="user-icon"><icono></icono></p>
  </div>

</template>

<script>
module.exports = {
  data : function () {
    return {
      base_url : site_url,
      log : login.state
    }
  },
  computed : {
    isActive : function () {
      return  false;
    }
  },
  components : {
    'icono' : httpVueLoader(site_url + 'js/svg/user-unlogged.vue')
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
    margin: 0 10px 0 auto;
  }

  .btn-login .user-icon {
    width: auto;
    height: auto;
  }

  .btn-login.active{
    background: #7D47BB;
    color: white;
  }

  .btn-login p{
    margin: 0;
  }
</style>