<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        <?php $config = json_decode(file_get_contents(dirname(__FILE__).'\php\config-local'), true); ?>
        window.site_url = "<?php echo $config["connection"]["xamp_path"]; ?>/";
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>


    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-meta/dist/vue-meta.js"></script>
    <script src="https://unpkg.com/http-vue-loader"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue-router@3.5.3/dist/vue-router.js"></script>

    

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="app">

        <div class="header">
            <div class="wrapper flex">
                <p class="logo"><img src="img/icons/logo-into-the-zone.svg"></p>   
                <div class="nav">
                    <router-link exact to="/">Home</router-link> |
                    <router-link to="/acercade">Nosotros</router-link> |
                    <router-link to="/tienda">Tienda</router-link> |
                    <router-link to="/registro">Registro</router-link>
                </div>             

                <btn-login v-on:click="showModal = true"></btn-login>
                <carrito></carrito> 
                
            </div>
        </div>
        <!-- El router-view se reemplaza deacuerdo a la pagina  -->
        <div class="pages">
            <transition>
                <router-view></router-view>
            </transition>
        </div>

        <transition>
        <modal v-if="showModal" v-on:close="showModal = false">
            <login></login>
        </modal>
        </transition>

    </div>
    <footer>
        <div class="container-footer-allO">

            <div class="container-body">
                <div class="column">
                    <h1>Acerca de Nosostros</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore natus, nemo illo numquam explicabo debitis in possimus. Voluptas iusto, quasi recusandae blanditiis dolorum aliquid praesentium unde! Sint, nobis dignissimos libero doloremque repudiandae molestiae vero delectus ea at error ratione in.</p>
                </div>
                <div class="column2">
                    <h1>Redes Sociales</h1>
                    <div class="row">
                        <img src="img/icons/facebook.png">
                        <label>Siguenos en Facebook</>
            </div>     
                    </div>
                    <div class="column3">
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
        <div class="container-footer">
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

    <script src="js/routes.js"></script>
    <script src="js/carrito.js"></script>
    <script src="js/main.js"></script>
</body>
</html>