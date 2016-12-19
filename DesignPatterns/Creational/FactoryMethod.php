<?php

namespace DesignPatterns\Creational\FactoryMethod;

/**
 * Фабричный метод
 * Определяет в классе метод создания продуктов, но реализацию этого метода оставляет подклассам.
 * Позволяет подклассам изменить тип продуктов, с которыми работает основной код суперкласса.
 * Позволяет создавать объекты без указания конкретных классов (не используя оператор  new).
 */
interface Factory
{
    public function createFurniture();
}

/**
 * Фабрика стульев
 */
class ChairFactory implements Factory
{
    /**
     * Создает объект Chair
     * @return Chair
     */
    public function createFurniture(): Chair
    {
        return new Chair();
    }
}

/**
 * Фабрика столов
 */
class TableFactory implements Factory
{
    /**
     * Создает объект Table
     * @return Table
     */
    public function createFurniture(): Table
    {
        return new Table();
    }
}

/**
 * Абстрактный класс мебели
 */
abstract class Furniture
{
    protected $color;
    abstract public function getName();
}

class Chair extends Furniture
{
    /**
     * Возвращает название мебели
     * @return string
     */
    public function getName()
    {
        return 'It\'s the chair!';
    }
}

class Table extends Furniture
{
    /**
     * Возвращает название мебели
     * @return string
     */
    public function getName()
    {
        return 'It\'s the table!';
    }
}

/**
 * Тесты
 */
$factories = array(new ChairFactory(), new TableFactory());

foreach ($factories as $factory)
{
    print $factory->createFurniture()->getName() . PHP_EOL;
}