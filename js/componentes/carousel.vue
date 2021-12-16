<template>

<div class="carousel-container" v-bind:class="type + ' c'+cantidad">
  <button class="arrow left" v-on:click="prev()">PREV</button>
  <div class="carousel" ref="carousel">
      <slot></slot>
  </div>
  <button class="arrow right" v-on:click="next()">NEXT</button>
</div>

</template>

<script>
module.exports = {
  props: {
    cantidad: {
      type: String,
      default: function () {
        return "3"
      }
    },
    type: {
      type: String,
      default: function () {
        return ""
      }
    },
  },
  
  methods: {
    next() {
      let itemWidth = this.$refs.carousel.firstElementChild.offsetWidth;
      this.$refs.carousel.scrollBy(itemWidth, 0);
    },
    prev() {
      let itemWidth = this.$refs.carousel.firstElementChild.offsetWidth;
      this.$refs.carousel.scrollBy(-itemWidth, 0);
    }
  }
}
</script>

<style>
.carousel-container {
  position: relative;
  overflow: hidden;
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
.c1 .carousel> * {
  width: 100%;
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
  font-size: 0;
  border: none;
  background: transparent;
  width: 40px;
  height: 40px;
  overflow: hidden;
  border-bottom: 8px solid #333;
  padding: 0;  
 
  
}

.carousel-container .arrow:before{
  content: "";
  display: block;
  height: 100%;
  box-sizing: border-box;
  border-bottom: 2px solid #FFF;
  
  
  
}

.carousel-container  .arrow.left{
  left: 10px;
  transform: rotate(45deg);
  border-left: 8px solid #C2814D;
  color: black;
}
  
.carousel-container .arrow.right{
  right: 10px;
  transform: rotate(-45deg);
  border-right: 8px solid #C2814D;
  
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