<?php

namespace App\PoopWall;

class Pixel {

    const COLOUR_ORANGE = 'orange';
    const COLOUR_BLACK = 'black';
    const COLOUR_YELLOW = 'yellow';
    const COLOUR_BLUE = 'blue';
    const COLOUR_RED = 'red';
    
    public $data;

    public function __construct($data = null) {
        if (!$data) {
            $this->data = [
                'x' => null,
                'y' => null,
                'color' => null,
            ];
        } else {
            $this->setData($data);
        }
    }

    public function getXCoordinate() {
        return $this->data['x'];
    }

    public function getYCoordinate() {
        return $this->data['is_active'];
    }

    public function getColor() {
        return $this->data['color'];
    }

    public function setColor(string $color) {
        if (in_array($color, [self::COLOUR_BLACK, self::COLOUR_BLUE, self::COLOUR_ORANGE,
                    self::COLOUR_RED, self::COLOUR_YELLOW])) {
            $this->data['color'] = $color;

            return true;
        }
    }

    public static function getColorOptions() {
        return [
            self::COLOUR_BLACK => 'Black',
            self::COLOUR_BLUE => 'Blue',
            self::COLOUR_ORANGE => 'Orange',
            self::COLOUR_RED => 'Red',
            self::COLOUR_YELLOW => 'Yellow'
        ];
    }

    public function setX(int $x) {
        $this->data['x'] = $x;
    }

    public function setY(int $y) {
        $this->data['y'] = $y;
    }

    public function setData(array $data) {
        $this->setX($data['x'] ?? null);
        $this->setY($data['y'] ?? null);
        $this->setColor($data['color'] ?? '');
    }

    public function getData() {
        return $this->data;
    }

}
