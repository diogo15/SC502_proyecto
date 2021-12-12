<template>

<div class="contenedor">
    <div class="banner1 h1">
        <h1>Llegaron Nuevos Productos!!</h1>
        <p>Reserva Ya!!</p>
    </div>
</div>

</template>
<script>
module.exports = {
}
</script>
<style>

.section{
width: 100%;
margin-bottom: 25px;
}
#banner{
  top: 85%;
  position: relative;
}
#banner .contenedor{
  position: absolute;
  top: 100%;
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
  line-height: 50%;
}
.div_banner {
    width: 100%;
    height: auto;
    padding: 0;
    display: -webkit-flex;
    display: flex;
    align-items: center;
}

</style>