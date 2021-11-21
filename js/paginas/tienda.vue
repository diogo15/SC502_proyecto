<template>
  <transition name="fade">
    <div>
        <h1>Formulario Ingresar</h1>

        <input v-model="message" placeholder="editar" >
        
        <p v-if="mostrar">Message is: {{ message }}</p>

        <p><input type="checkbox" v-model="mostrar"> Mostrar/Ocultar </p>

    </div>
  </transition>
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