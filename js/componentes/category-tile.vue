<template>

<div class="showcaseItem">
    <div class="circle">
        <router-link :to="'/category/1'">
            <img v-bind:src="'img/productos/'+imagen"/>
        </router-link>
    </div>
    <p class="cName"><slot></slot></p>
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
.showcaseItem * {
    box-sizing: border-box; 
}
.showcaseItem{
    width: 30%;
    position: relative;
    padding-bottom: 30%;
    text-align: center;
}
.showcaseItem .circle{  
    display: flex;
    position: absolute;
    width: 100%;
    height: 100%;
    background: white;
    border: 10px solid #C2814D;     
    overflow: hidden;
    border-radius: 50%;
    justify-content: center;
    align-items: center;
}

.showcaseItem img{
    max-width: 80%;
    width: 100%;
}

.showcaseItem .cName{
    position: absolute;
    width: 100%;
    bottom: 0;
    transform: translateY(110%);
    color: white;
    padding: 15px;
    font-weight: 300;
    font-size: 25px;
}

.showcaseItem.showAnim:nth-child(1){
  animation: slideDown 1s ease-in-out forwards;
}

.showcaseItem.showAnim:nth-child(2){
  animation: slideDown 1s 0.2s ease-in-out forwards;
}

.showcaseItem.showAnim:nth-child(3){
  animation: slideDown 1s 0.4s ease-in-out forwards;
}


@keyframes slideDown {
  0%    { transform: translateY(0)   }
  40%   { transform: translateY(-10%) }
  100%   { transform: translateY(0)   }
}

</style>