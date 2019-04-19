<?php

namespace App\PoopWall\Model;

use Core\Database\SQLBuilder;

class ModelPixel {

    protected $table_name;
    protected $connection;
    protected $pdo;

    public function __construct(\Core\Database\Connection $connection, $table_name) {
        $this->table_name = $table_name;
        $this->connection = $connection;
        $this->pdo = $this->connection->getPDO();
    }

    public function insert(\App\PoopWall\Pixel $pixel) {
        $columns = array_keys($pixel->getData());

        $sql = strtr("INSERT INTO @db.@table (@col) VALUES (@val)", [
            '@db' => SQLBuilder::column(DB_SCHEMA),
            '@table' => SQLBuilder::column(DB_TABLE),
            '@col' => SQLBuilder::columns($columns),
            '@val' => SQLBuilder::binds($columns)
        ]);

        $query = $this->pdo->prepare($sql);

        foreach ($pixel->getData() as $key => $value) {
            $query->bindValue(SQLBuilder::bind($key), $value);
        }

        $query->execute();
    }

    public function loadAll() {
        $loadAll = strtr('SELECT * FROM @db.@table', [
            '@db' => \Core\Database\SQLBuilder::column(DB_SCHEMA),
            '@table' => \Core\Database\SQLBuilder::column(DB_TABLE)
        ]);

        $query = $this->pdo->query($loadAll);
        $pixel_data = $query->fetchAll(\PDO::FETCH_ASSOC);
        $pixel_array = [];

        foreach ($pixel_data as $pixel) {
            $pixel_array[] = new \App\PoopWall\Pixel($pixel);
        }

        return $pixel_array;
    }

    public function deleteAll() {
        $deleteAll = strtr('DELETE FROM @db.@table', [
            '@db' => \Core\Database\SQLBuilder::column(DB_SCHEMA),
            '@table' => \Core\Database\SQLBuilder::column(DB_TABLE)
        ]);

        $query = $this->pdo->query($deleteAll);
        $query->execute();
    }

}
