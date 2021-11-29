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
    <script src="https://unpkg.com/http-vue-loader"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue-router@3.5.3/dist/vue-router.js"></script>

    

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="app">

        <div class="header">
            <div class="wrapper flex">

                <div class="nav-wrapper">

                    <p class="logo">{{ message }}</p>
                    
                    <div class="nav">
                        <router-link exact to="/">Home</router-link> |
                        <router-link to="/acercade">Nosotros</router-link> |
                        <router-link to="/tienda">Tienda</router-link> |
                        <router-link to="/facturar">facturar</router-link>
                        <router-link to="/login">Login</router-link>
                    </div>
                
                </div>

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
            <login v-if="login"></login>
        </transition>
        
        <input v-model="login" type="checkbox">

    </div>

    <script src="js/routes.js"></script>
    <script src="js/carrito.js"></script>
    <script src="js/main.js"></script>
</body>
</html>