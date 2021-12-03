<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        <?php $config = json_decode(file_get_contents(dirname(__FILE__).'\php\config-local'), true); ?>
        window.site_url = "<?php echo $config["connection"]["xamp_path"]; ?>/";
        <?php
        if (isset($_SESSION['login']) && $_SESSION['login']=="1") {
            echo "const current_user = [true,'".$_SESSION['name']."'];";
        }else{
            echo "const current_user = [false,'0'];";
        }
        ?>
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
                    <router-link to="/tienda">Tienda</router-link>
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

    <script src="js/routes.js"></script>
    <script src="js/carrito.js"></script>
    <script src="js/main.js"></script>
</body>
</html>