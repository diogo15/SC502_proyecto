<!DOCTYPE html>
<html lang="en">
<head>
    <script>
        <?php $config = json_decode(file_get_contents(dirname(__FILE__).'\php\config-local'), true); ?>
        var site_url = "<?php echo $config["connection"]["xamp_path"]; ?>";
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store</title>

    <script>
        var site_url = "http://localhost/sc502/";
    </script>

    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://unpkg.com/http-vue-loader"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue-router@3.5.3/dist/vue-router.js"></script>
    

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div id="app">

        {{ message }}

        <div id="nav">
            <router-link to="/">Home</router-link> |
            <router-link to="/acercade">Nosotros</router-link> |
            <router-link to="/tienda">Tienda</router-link>
        </div>

        <!-- El router-view se reemplaza deacuerdo a la pagina  -->
        <div class="pages">
            <router-view></router-view>
        </div>


    </div>

    <script src="js/main.js"></script>
</body>
</html>