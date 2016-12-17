<?php

namespace DesignPatterns\Creational\FactoryMethod;

/**
 * Фабричный метод определяет интерфейс для создания объекта, но позволяет подклассам решать, какой класс будет инстанцировать
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
    private $color;
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