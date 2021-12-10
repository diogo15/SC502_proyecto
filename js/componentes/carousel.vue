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
.section{
width: 100%;
margin-bottom: 25px;
}
#banner{
  margin-top: 50px;
  position: relative;
}
#banner .contenedor{
  position: absolute;
  top: 50px;
  left: 100px;
  color: white;
  transform: translateY(-50px) translateX(-0px);
}
#banner p{
  font-size: 20px;
  display: block;
  color: rgb(180, 173, 173);
  text-decoration: none;
  padding: 10px;
  margin-top: 20px;
  border: 2px solid peru;
  width: 9%;
}
#banner p:hover{
  background: rgba(51, 51, 51, 0.6);
  width: 9%;
}
#banner h1{
  display: block;
  margin-top: 500px;
}
.img-Back1{
  position: relative;
  display: block;
  text-decoration: none;
  padding: 10px;
  margin-top: 20px;
  width: 30%;
  
}
.img-Back2{
  position: absolute;
  display: flex;
  text-decoration: none;
  padding: 10px;
  margin-top: -314px;
  width: 30%;
  left: 32%;
  height: 39%;
  justify-content: center;
}
.img-Back3{
  position: absolute;
  display: flex;
  text-decoration: none;
  padding: 10px;
  margin-top: -314px;
  width: 30%;
  left: 64%;
  height: 39%;
  
}



</style>