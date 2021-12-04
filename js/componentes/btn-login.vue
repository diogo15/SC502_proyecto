<template>

<div class="header-login"><span v-if="username>0">Hola{{"&nbsp;"}}<span>{{username}}</span>!</span>
  <div v-bind:class="[{ active : isActive }, 'btn-login']" v-on:click="$emit('click', $event)">
    <p class="user-icon"> <icono></icono></p>
  </div>
</div>

</template>

<script>
module.exports = {
  data : function () {
    return {
      base_url : site_url,
      loggedin : current_user[0],
      username : current_user[1]
    }
  },
  computed : {
    isActive : function () {
      return  this.loggedin;
    }
  },
  components : {
    'icono' : httpVueLoader(site_url + 'js/svg/user-unlogged.vue')
  }
}
</script>

<style>
  .header-login{
    display: flex;
    align-items: center;
    margin: 0 10px 0 auto;
  }
  .header-login span{
    font-weight: bold;
    text-transform: capitalize;
  }
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
    margin-left: 10px;
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