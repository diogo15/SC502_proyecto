<template>
<div>
    <!-- End SECOND Section -->
    <div class="itz_section">
      <div class="wrapper">
        <div class="itz_hero_full bigger robot_container">
          <robot class="robot"></robot>
        </div>
      </div>
    </div>
    <footer>
        <div class="container-footer-all">
            
            <div class="wrapper container-body">
                <div class="column">
                    <h1>Acerca de Nosostros</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore natus, nemo illo numquam explicabo debitis in possimus. Voluptas iusto, quasi recusandae blanditiis dolorum aliquid praesentium unde! Sint, nobis dignissimos libero doloremque repudiandae molestiae vero delectus ea at error ratione in.</p>
                </div>
                <div class="column column2">
                    <h1>Redes Sociales</h1>
                    <div class="row">
                        <img src="img/icons/facebook.png">
                        <a id="link_fb" href="http://fb.com" target="_blank">Siguenos en Facebook</a>
                    </div>     
                </div>
                <div class="column column3">
                    <h1>Informacion Contactos</h1>
                    <div class="row2">
                        <img src="img/icons/sitio-web.png">
                        <a id="link_about" href="/#/acercade">https://www.IntoTheZone.com</a>
                    </div>
                    <div class="row2">
                        <img src="img/icons/llamada.png">
                        <a id="link_tel" href="tel:50622456432">+506-2245-6432</a>
                    </div>
                    <div class="row2">
                        <img src="img/icons/gmail.png">
                        <a id="link_mailto" href="mailto:intothezone@gmaill.com">intothezone@gmaill.com</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <footer>
        <div class="container-footer">
            <div class="wrapper">
                <div class="footer">
                    <div class="copyright">
                        @ 2020 Todos los derechos Reservados | <a
                        href=""> Into The Zone</a>
                    </div>
                    <div class="informacion">
                        <a href="">Informacion de la Compania |</a>
                        <a href="">Privacion y Politica |</a>
                        <a href="">Terminos y Condiciones</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>
</template>

<script>
       
module.exports = {        
    components: {
        'robot' : httpVueLoader(site_url + 'js/svg/robot.vue')
    }
}

</script>

<style>
.container-footer-all{
    padding-top: 15px;
    padding-bottom: 15px;
}
footer{
    margin-top: 10px;
    margin: 0px;
    padding: 0px;
    box-sizing: border-box;
}
footer{
    width: 100%;
    background:#884511;
    color: black;
}
.container-body{
    display: flex;
    gap: 20px;
    justify-content: space-between; 
}
.column{
    width: 100%;
}
.column h1{
    font-size: 20px;
}
.column p{
    
    font-size: 13px;
    margin-top: 14px;
    color: #C7C7C7;
}

.column2 h1{
    font-size: 18px;
}
.row{
    margin-top: 14px;
    display: flex;
}
.row img{
    width: 30px;
    height: 30px;
}
.row label{
    margin-top: 6px;
    margin-left: 4px;
    color: #C7C7C7;
}

.column3 h1{
    font-size: 18px;
}
.row2{
    margin-top: 20px;
    display: flex;
}
.row2 img{
    width: 30px;
    height: 30px;
}
.row2 label{
    margin-top: 10px;
    max-width: 150px;
    margin-left: 4px;
    color: #C7C7C7;
}
.container-footer{
    max-width: 100%;
    background-color: #3f1f06;
    display: flex;
    justify-content: space-between;
}
.footer{    
    max-width: 100%;
    margin: auto;
    display: flex;
    justify-content: space-between;
    padding: 15px;
}
@media screen and (max-width: 980px) {
    .footer{  
        flex-wrap: wrap;
    }
}
.copyright{
    color: #C7C7C7;

}
.copyright a{
    color: #C7C7C7;
    text-decoration: none;
    font-weight: bold;
    font-size: small;
}
.informacion a{
    text-decoration: none;
    color: #C7C7C7;
    font-size: small;
}
@media screen and (max-width: 980px) {
    .container-body{ 
        flex-wrap: wrap;

    }
    .column2
    .column3{
        margin-top: 40px;
    }
}

.itz_section .robot{
  width: auto;
  height: 450px;
  animation:robot 4s ease-in-out infinite alternate;
  fill: #333;
  transform-box: fill-box;
  transform-origin: 50% 50%;
}
.robot #r-eye{
  transform-origin: 50% 59%;
  animation:eyes 3s linear infinite;
  transform-origin: 50% 50%;
}
.itz_section .robot_container{
  margin-top: 20px;
  text-align: center;
  height: 200px;
  overflow: hidden;
}

.container-footer-all a{
    color: #3f1f06;
    display: inline-block;
    margin-left: 5px;
}


@keyframes robot
{
  0% {
    transform: rotate(-10deg);
  }
  100% {
    transform: rotate(-20deg);
  }
}
@keyframes eyes
{
  0% {
    opacity: 1;
  }
  5% {
    opacity: 0;
  }
  10% {
    opacity: 1;
  }
}

</style>