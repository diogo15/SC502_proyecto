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
  padding: 0 40px;
}

.carousel {
  display: flex;
  scroll-snap-type: x mandatory;
  overflow-x: scroll;
  scroll-behavior: smooth;
}

.carousel > * {
  width: 28%;
  margin-right: 2%;
  flex-shrink: 0;
  scroll-snap-align: start;
}

.carousel::-webkit-scrollbar {
  display: none;
}

.carousel-container .arrow{
  position: absolute;
  top: 40%;
  z-index: 2;
  left: 0;
}

.carousel-container .arrow.right{
  right: 0;
  left: auto;
}
</style>