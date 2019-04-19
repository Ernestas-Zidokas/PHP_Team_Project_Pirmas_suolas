<?php

require_once '../bootloader.php';

$create_table = strtr("CREATE TABLE @db.@table (@id, @x, @y, @color, PRIMARY KEY (`id`))", [
    '@id' => \Core\Database\SQLBuilder::column('id') . ' INT NOT NULL AUTO_INCREMENT',
    '@db' => \Core\Database\SQLBuilder::column(DB_SCHEMA),
    '@table' => \Core\Database\SQLBuilder::column(DB_TABLE),
    '@x' => \Core\Database\SQLBuilder::column('x') . ' SMALLINT NOT NULL',
    '@y' => \Core\Database\SQLBuilder::column('y') . ' SMALLINT NOT NULL',
    '@color' => \Core\Database\SQLBuilder::column('color') . ' VARCHAR(255) NOT NULL'
        ]);

$connection = new \Core\Database\Connection(DB_CREDENTIALS);
$pdo = $connection->getPDO();
$pdo->exec($create_table);
