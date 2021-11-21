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
    <title>Document</title>
    
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <script src="js/main.js"></script>
</body>
</html>