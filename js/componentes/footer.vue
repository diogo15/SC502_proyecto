<template>
<div>
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
                        <label>Siguenos en Facebook</label>
                    </div>     
                </div>
                <div class="column column3">
                    <h1>Informacion Contactos</h1>
                    <div class="row2">
                        <img src="img/icons/sitio-web.png">
                        <label>https://www.IntoTheZone.com</label>
                    </div>
                    <div class="row2">
                        <img src="img/icons/llamada.png">
                        <label>+506-2245-6432</label>
                    </div>
                    <div class="row2">
                        <img src="img/icons/gmail.png">
                        <label>IntoTheZone@gmaill.com</label>
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
       
    module.exports = {}

</script>

<style>
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
.container-footer-all{
    width: 100%;
    max-width: 1200px;
    margin: auto;
    padding: 40px;
}
.container-body{
    display: flex;
    justify-content: space-between; 
}
.column{
    width: 30%;
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
}
.footer{
    
    max-width: 1200px;
    margin: auto;
    display: flex;
    justify-content: space-between;
    padding: 15px;
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
@media screen and (max-width: 1000px) {
    .container-body{
        flex-wrap: wrap;
    }
}
</style>