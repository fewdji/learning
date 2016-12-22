<?php
/*
 * Прототип
 * Описывает создаваемые продукты с помощью объекта-прототипа. Позволяет создавать новые объекты путём их клонирования.
 */
namespace DesignPatterns\Creational\Prototype;

/**
 * Иерархия допустимых классов для создания прототипов
 */
abstract class Terrain {}

abstract class Sea extends Terrain {
    public $deep = 0;

    public function __construct($deep)
    {
        $this->deep = $deep;
    }
}
class EarthSea extends Sea {}
class MarsSea extends Sea {}

abstract class Plains extends Terrain {}
class EarthPlains extends Plains {}
class MarsPlains extends Plains {}

/*
 * Фабрика прототипов
 */
class TerrainFactory
{
    private $sea;
    private $plains;

    public function __construct(Sea $sea, Plains $plains)
    {
        $this->sea = $sea;
        $this->plains = $plains;
    }

    public function getSea()
    {
        return clone $this->sea;
    }

    public function getPlains()
    {
        return clone $this->plains;
    }
}

/**
 * Тесты
 */
$prototypeFactory = new TerrainFactory(new EarthSea(100), new MarsPlains());

$earthSea = $prototypeFactory->getSea();
$marsPlains = $prototypeFactory->getPlains();

print_r($earthSea);
print_r($marsPlains);
