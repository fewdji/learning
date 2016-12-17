<?php

namespace DesignPatterns\Creational\AbstractFactory;

/**
 * Абстрактная фабрика создает ряд связанных или зависимых объектов без указания их конкретных классов
 */
abstract class AbstractFactory
{
    abstract public function createText(string $content);
    abstract public function createDecoder();
}

/**
 * HTML фабрика
 */
class HTMLFactory
{
    public function createText(string $content): HTMLText
    {
        return new HTMLText($content);
    }

    public function createDecoder(): HTMLDecoder
    {
        return new HTMLDecoder();
    }
}

/**
 * JSON фабрика
 */
class JSONFactory
{
    public function createText(string $content): JSONText
    {
        return new JSONText($content);
    }

    public function createDecoder(): JSONDecoder
    {
        return new JSONDecoder();
    }
}

/**
 * Абстрактный класс Text заставляет реализовать методы для генерации и вывода контента
 */
abstract class Text
{
    public $text;

    public function __construct(string $content)
    {
        $this->text = $content;
    }

    abstract public function printText();
}

class HTMLText extends Text
{
    public function printText()
    {
        print 'HTML: ' . $this->text . PHP_EOL;
    }
}

class JSONText extends Text
{
    public function printText()
    {
        print 'JSON: ' . $this->text . PHP_EOL;
    }
}

/**
 * Интерфейс Decoder с методом для декодирования данных
 */
interface Decoder
{
    public function decode();
}

class HTMLDecoder implements Decoder
{
    public function decode()
    {
        print 'HTML decoded' . PHP_EOL;
    }
}

class JSONDecoder implements Decoder
{
    public function decode()
    {
        print 'JSON decoded' . PHP_EOL;
    }
}

/**
 * Тесты
 */
$html = new HTMLFactory();
$json = new JSONFactory();

$html->createText('Hello!')->printText();
$json->createText('World!')->printText();

$html->createDecoder()->decode();
$json->createDecoder()->decode();