<template>
    
  <div class="bigTitle">
    <div class="wrapper">
      <h1><slot></slot></h1>
    </div>
  </div>
    
</template>

<script>
module.exports = {
  props: {}
}
</script>
<style>

.bigTitle{
    position: relative;
    margin: 30px 0;
}
.bigTitle:after{
    content: "";
    position: absolute;
    width: 50%;
    left: 0;
    top: 0;
    bottom: 0;
    background: #333;
    z-index: -1;
}
.bigTitle h1 {
    position: relative;
    background: #333;
    margin: 0;
    padding: 20px 50px 20px 0;
    color: #FFF;
    overflow: hidden;
    font-weight: lighter;
}
.bigTitle h1:after,
.bigTitle h1:before {
    content: "";
    position: absolute;
    background: #c2814d;
    width: 10px;
    height: 300px;
    transform: rotate(25deg);
    right: 69px;    
    top: -30px;  
}

.bigTitle h1:after{
    right: 5px;
    width: 50px;
}
</style>