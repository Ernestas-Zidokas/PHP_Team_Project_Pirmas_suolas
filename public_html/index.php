<?php
require_once '../bootloader.php';

$connection = new Core\Database\Connection(DB_CREDENTIALS);
$pdo = $connection->getPDO();
$model_pixel = new \App\PoopWall\Model\ModelPixel($connection, DB_TABLE);
?>
<html>
    <head>
        <title>POOPWALL</title>
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <?php require 'objects/navigation.php'; ?>
        <h1>P-OOPWALL</h1>
        <div class="wall">
            <?php foreach ($model_pixel->loadAll() as $pixel): ?>
                <span class="pixel" style="
                      top: <?php print $pixel->getYCoordinate(); ?>px;
                      left: <?php print $pixel->getXCoordinate(); ?>px;
                      background-color: <?php print $pixel->getColor(); ?>;">
                </span>
            <?php endforeach; ?>        
        </div>
    </body>
</html>
