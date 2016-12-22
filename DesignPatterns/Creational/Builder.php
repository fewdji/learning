<?php

namespace DesignPatterns\Creational\Builder;

class Car
{
    public $engine;
    public $doors;
    public $parts = [];
    public $color;
}

/**
 * Строитель
 * Выносит код конструирования объекта в отдельный класс Строитель.
 * Позволяет конструировать объекты пошагово.
 * Позволяет производить различные продукты, используя один и тот же порядок строительства.
 */
abstract class Builder
{
    protected $car;

    public function __construct()
    {
        $this->car = new Car();
    }

    abstract public function setEngine();

    abstract function setDoors();

    public function setColor($color)
    {
        $this->car->color = $color;
    }

    public function setPart($part)
    {
        $this->car->parts[] = $part;
    }

    public function getVehicle()
    {
        return $this->car;
    }
}

/**
 * Строитель спортивных автомобилей
 */
class SportCarBuilder extends Builder
{
    public function __construct()
    {
        parent::__construct();
        $this->setPart('spoiler');
    }

    public function setEngine()
    {
        $this->car->engine = 'V12 turbo';
    }

    public function setDoors()
    {
        $this->car->doors = 2;
    }
}

/**
 * Строитель дешевых автомобилей
 */
class CheapCarBuilder extends Builder
{
    public function setEngine()
    {
        $this->car->engine = 'V4';
    }

    public function setDoors()
    {
        $this->car->doors = 5;
    }
}

/**
 * Директор - конструирует продукт, используя интерфейс Строителя.
 *
 * @return Car
 */
class Director
{
    /**
     * Созает спортивный автомобиль Lamborgini
     * @param Builder $builder
     * @return Car
     */
    public function buildLamborgini(Builder $builder)
    {
        $builder->setPart('big wheels');
        $builder->setEngine();
        $builder->setDoors();
        $builder->setColor('orange');

        return $builder->getVehicle();
    }

    /**
     * Создает дешевый автомобиль Lada
     * @param Builder $builder
     * @param string $color
     * @return Car
     */
    public function buildLada(Builder $builder, $color = 'white')
    {
        $builder->setColor($color);
        $builder->setEngine();
        $builder->setDoors();

        return $builder->getVehicle();
    }
}

//Тесты
$director = new Director();
$lamborgini = $director->buildLamborgini(new SportCarBuilder());
print_r($lamborgini);

$lada = $director->buildLada(new CheapCarBuilder(), 'black');
print_r($lada);