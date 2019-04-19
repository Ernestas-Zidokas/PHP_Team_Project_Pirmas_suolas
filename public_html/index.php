<?php
require_once '../bootloader.php';


?>
<html>
    <head>
        <title>POOPWALL</title>
        <link rel="stylesheet" href="/css/style.css">
        <style>
            .pixel {
                position: absolute;
                top: <?php print $y; ?>;
                left:<?php print $x; ?>;
                background-color: <?php print $color; ?>;
            }
        </style>
    </head>
    <body>
        <?php require 'objects/navigation.php'; ?>
        <h1>P-OOPWALL</h1>
        <div class="wall">
            <div class="pixel"></div>
        </div>
    </body>
</html>
