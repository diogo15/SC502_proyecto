<template>
    <div class="wrapper">
        <h1>Facturar</h1>

        <input v-model="message" placeholder="editar" >
        
        <p v-if="mostrar">Message is: {{ message }}</p>

        <p><input type="checkbox" v-model="mostrar"> Mostrar/Ocultar </p>

    </div>
</template>

<script>
module.exports = {
  data: function() {
    return{
      mostrar: false,
      message: "text por defecto"
    }
  },
  mounted () {

  }
}
</script>