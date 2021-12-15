<template>
    <div class="split_section">
      <span class="leftBlock block"></span>
      <slot></slot>
      <span class="rightBlock block"></span>
    </div>
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

.split_section{
  position: relative;
  height: 200px;
  overflow: hidden;
  margin: 30px 0;
}

.block{
  display: block;
  position: absolute;
  top: 0;
  bottom: 0;
  width: 55%;
  background-color: #9959e3;
}
.leftBlock{
  left: 0;
}
.rightBlock{
  right: 0;
}

.showAnim .leftBlock{
  animation: slidein1 2s ease-out forwards;
}

.showAnim .rightBlock{
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
</style>