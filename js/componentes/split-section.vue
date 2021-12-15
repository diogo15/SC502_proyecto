<template>
<div class="split_section">
    <img class="cool_image" :src="'img/photos/'+imagen"/>
    <div class="split_inner">
      <span class="leftBlock block"></span>
      <div class="split_content"><slot></slot></div>
      <span class="rightBlock block"></span>
    </div>
</div>
</template>

<script>
module.exports = {
  props: {
    type: String,
    imagen: String
  },
  methods: {
  }
}
</script>

<style>

.split_section{
  position: relative;
}
.split_inner{
  position: relative;
  height: 200px;
  overflow: hidden;
  margin: 30px 0;
}

.split_section .block{
  display: block;
  position: absolute;
  top: 0;
  bottom: 0;
  width: 55%;
  background-color: #9959e3;
}
.split_section .leftBlock{
  left: 0;
}
.split_section .rightBlock{
  right: 0;
}

.split_section.showAnim .leftBlock{
  animation: slidein1 2s ease-out forwards;
}

.split_section.showAnim .rightBlock{
  animation: slidein2 2s ease-out forwards;
}

@keyframes slidein1 {
  from { transform: translateX(-100%) skewX(-20deg);  }
  to   { transform: translateX(-20%) skewX(-20deg); }
}

@keyframes slidein2 {
  from { transform: translateX(100%) skewX(-20deg);  }
  to   { transform: translateX(20%) skewX(-20deg); }
}

.cool_image{
  position: absolute;
  max-width: 400px;
  left: 50%;
  transform: translate(-100%,-20%);
  z-index: 2;
}

.split_section.showAnim .cool_image{
  animation: fadeInCool 2s ease-out forwards;
}

@keyframes fadeInCool {
  0%    { opacity: 0;  transform: translate(-100%,0%); }
  60%   { opacity: 0;  transform: translate(-100%,0%); }
  100%  { opacity: 1;  transform: translate(-100%,-20%); }
}

.split_content{
  position: absolute;
  display: flex;
  left: 60%;
  height: 100%;
  z-index: 2;
  color: white;
  align-items: center;
}

.split_section.showAnim .split_content{
  animation: fadeInCool2 2s ease-out forwards;
}

@keyframes fadeInCool2 {
  0%    { opacity: 0; }
  75%   { opacity: 0; }
  100%  { opacity: 1; }
}

</style>