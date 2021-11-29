<template>
    <div v-bind:class="[{ active: isActive }, 'btn-login']">
      <p class="user-icon"><icono></icono></p>
      <p v-if="quantity">{{ quantity }}</p>    
    </div>
</template>

<script>
module.exports = {}
</script>

<style>
.btn-login{
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
.btn-login.active{
  background: #7D47BB;
  color: white;
}
.btn-login p{
  margin: 0;
}
.btn-login .user-icon{
  width: 15px;
  margin-right:2px;
  height: auto;
}
</style>