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
  display: inline-block;
  padding: 10px 15px;
  background: transparent;
  border: 2px solid white;
  color: white;
  cursor: pointer;
  transition: background-color 0.3s;
  border-radius: 5px;
}

.button.white{
  background: white;
  color: #934a10;
}

.button.purple{
  background: #7D47BB;
  border-color:#7D47BB;
  color: white;
}

.button.green{
  background: #45B173;
  border-color: #45B173;
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

.button.link.white a{
  color: #934a10;
}

/*
HOVER STYLES:
*/
.button:hover{
  background-color: rgba(255,255,255,0.2);
}
.button.white:hover{
  background-color: rgba(255,255,255,0.8);
}
.button.purple:hover{
  background-color: #9959e3;
}
.button.green:hover{
  background-color: #3d9b65;
}
</style>