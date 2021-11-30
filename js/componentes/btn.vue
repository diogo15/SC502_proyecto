<template>
    <button class="button" :class="type" v-on:click="$emit('click', $event)">
        <slot></slot>
    </button>
</template>

<script>
module.exports = {
  props: {
    type: String,
  },
  methods: {
  }
}
</script>
<style>

.button {
  box-sizing: border-box;
  display: inline-block;
  padding: 10px 15px;
  background: transparent;
  border: 2px solid white;
  color: white;
  cursor: pointer;
  transition: background-color 0.3s;
}

.button:hover{
  background-color: rgba(255,255,255,0.2);
}

.button.white{
  background: white;
  color: #934a10;
}

.button.purple{
  background: #7D47BB;
  color: white;
}

.button.link {
  padding: 0;
}

.button.link a{
  display: inline-block;
  padding: 10px 15px;
  color: white;
  text-decoration: none;
}

</style>