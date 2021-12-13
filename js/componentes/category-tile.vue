<template>

<div class="imgHolder">
    <router-link :to="'/category/1'">
        <img class="img-carousel3" v-bind:src="'img/productos/'+imagen"/>
    </router-link>
    <p class="categoryName"><slot></slot></p>
</div>

</template>
<script>
module.exports = {
    props:{
        imagen:String
    }
}
</script>
<style>

.imgHolder{
  position: relative;
  background: white;
  width: 33.3333%;
  height: 400px;
  line-height: 400px;
  text-align: center;
  border: 10px solid #C2814D;
}

.imgHolder img{
  max-width: 80%;
  vertical-align: middle;
}

.categoryName{
    position: absolute;
    box-sizing: border-box;
    bottom: 0;
    z-index: 2;
    line-height: 1;
    background: #333;
    width: 100%;
    color: white;
    padding: 15px;
    font-weight: 300;
    font-size: 25px;
}

</style>