<?php
namespace sorokinmedia\api_helpers\Interfaces;

/**
 * Интерфейс для имплементации в классах роутинга для API сервисов
 *
 * Interface RoutesInterface
 * @package sorokinmedia\api_helpers\Interfaces
 */
interface RoutesInterface
{
    /**
     * @return array
     */
    public static function getRoutes() : array;
}