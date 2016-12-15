<?php

namespace DesignPatterns\Creational\Singleton;

/**
 * Позволяет содержать только один экземпляр объекта в приложении, которое будет обрабатывать все обращения, запрещая создавать новый экземпляр.
 * Антипаттерн! (используй Dependency Injection)
 */
final class Singleton
{
    private static $instance;

    /**
     * Создает объект единожды при первом обращении
     * @return Singleton
     */
    public static function getInstance (): Singleton
    {
        if (static::$instance === null)
        {
            static::$instance = new static();
        }

        return static::$instance;
    }


    /**
     * Защита от создания через new
     */
    private function _construct()
    {
    }

    /**
     * Защита от создания через клонирование
     */
    private function _clone()
    {
    }

    /**
     * Защита от создания через unserialize
     */
    private function _wakeup()
    {
    }
}

/*
 * Тесты
 */
$firstInst = Singleton::getInstance();
$secondInst = Singleton::getInstance();

print $firstInst instanceof $secondInst;