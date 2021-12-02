<template>

<div class="carousel-container" v-bind:class="type">
  <button class="arrow left" v-on:click="prev">PREV</button>
  <div class="carousel" ref="carousel">
      <slot></slot>
  </div>
  <button class="arrow right" v-on:click="next">NEXT</button>
</div>

</template>

<script>
module.exports = {
  props: {
    type: String,
  },
  methods: {
    next() {
      this.$refs.carousel.scrollBy(1, 0);
    },
    prev() {
      this.$refs.carousel.scrollBy(-1, 0);
    }
  }
}
</script>

<style>
.carousel-container {
  position: relative;
}

.carousel {
  display: flex;
  scroll-snap-type: x mandatory;
  overflow-x: scroll;
  scroll-behavior: smooth;
  padding-bottom: 20px;
}

.carousel > * {
  width: 28%;
  margin-right: 15px;
  flex-shrink: 0;
  scroll-snap-align: start;
}

/** 
.carousel::-webkit-scrollbar {
  display: none;
}
*/

.carousel-container .arrow{
  position: absolute;
  top: 40%;
  z-index: 2;
  left: -20px;
}

.carousel-container .arrow.right{
  right: -20px;
  left: auto;
}

.carousel::-webkit-scrollbar {
	height: 10px; 
}
.carousel::-webkit-scrollbar-track {
	background-color: #81512a;
  border-radius: 10px;
}
.carousel::-webkit-scrollbar-thumb {
	background: #c99a75;
	border-radius: 10px;
}

</style>