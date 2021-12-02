<template>
      <div class="modal" v-on:click="$emit('close')">
          <btn class="white close-modal" v-on:click="$emit('close')">Close</btn>
          <slot v-on:click.stop=""></slot>
      </div>
</template>

<script>
module.exports = {
  props: {
  },
  methods: {
  },
  components : {
    'btn' : httpVueLoader(site_url + 'js/componentes/btn.vue')
  }
}
</script>

<style>
/* The Modal (background) */
.modal {
  position: fixed; /* Stay in place */
  z-index: 2; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.6); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: transparent;
  margin: auto;
  padding: 20px;
  border: 1px solid rgb(0, 0, 0);
  width: 80%;
}

/* The Close Button */
.close-modal{
  position: absolute;
  top: 10px;
  right: 10px;
}
</style>