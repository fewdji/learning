<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * Абстрактная фабрика создает ряд связанных или зависимых объектов без указания их конкретных классов
 */
abstract class AbstractFactory
{
    abstract public function createData(string $content);
    abstract public function createDecoder();
}

/**
 * Фабрика для базы данных
 */
class DBFactory
{
    public function createData(string $data): DBData
    {
        return new DBData($data);
    }

    public function createDecoder(): DBDecoder
    {
        return new DBDecoder();
    }
}

/**
 * Фабрика для кэша
 */
class CacheFactory
{
    public function createData(string $data): CacheData
    {
        return new CacheData($data);
    }

    public function createDecoder(): CacheDecoder
    {
        return new CacheDecoder();
    }
}

/**
 * Абстрактный класс Data заставляет реализовать методы для генерации и вывода данных
 */
abstract class Data
{
    public $text;

    public function __construct(string $content)
    {
        $this->text = $content;
    }

    abstract public function printText();
}

class DBData extends Data
{
    public function printText()
    {
        print 'From DB: ' . $this->text . PHP_EOL;
    }
}

class CacheData extends Data
{
    public function printText()
    {
        print 'From cache: ' . $this->text . PHP_EOL;
    }
}

/**
 * Интерфейс Decoder с методом для декодирования данных
 */
interface Decoder
{
    public function decode();
}

class DBDecoder implements Decoder
{
    public function decode()
    {
        print 'DB data has been decoded' . PHP_EOL;
    }
}

class CacheDecoder implements Decoder
{
    public function decode()
    {
        print 'Cache data has been decoded' . PHP_EOL;
    }
}

/**
 * Тесты
 */
$db = new DBFactory();
$cache = new CacheFactory();

$db->createData('Hello!')->printText();
$cache->createData('World!')->printText();

$db->createDecoder()->decode();
$cache->createDecoder()->decode();