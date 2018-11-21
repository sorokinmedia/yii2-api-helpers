<?php
namespace sorokinmedia\api_helpers\Traits;

/**
 * Пример трейта для описания стандартных заготовок для apiDoc
 * Необходимо скопировать в папку api/controllers, сменить namespace
 * В каждом контроллере из папки api/controllers использовать данный трейт (use)
 * Во всех экшенах будут доступны заготовки для описания ответа с ошибкой и успешным завершением
 * Использование: @apiUse и название заготовки
 *
 * Trait ApiDocTrait
 * @package sorokinmedia\api_helpers\Traits
 */
trait ApiDocTrait
{
    /**
     * @apiDefine SuccessRespond
     *
     * @apiSuccess {Number} status Статус ответа (0 - успешное выполнение, 10 - лог, 100 - ошибка)
     * @apiSuccess {Object[]} messages Сообщение
     * @apiSuccess {String} messages.message Текст сообщения
     * @apiSuccess {Number} messages.type Тип сообщения (0 - успешное выполнение, 1 - ошибка валидации, 2 - серверная ошибка, 3 - лог)
     */

    /**
     * @apiDefine ErrorRespond
     *
     * @apiError {Null} response Ответ сервиса
     * @apiError {Number} status Статус ответа (0 - успешное выполнение, 10 - лог, 100 - ошибка)
     * @apiError {Object[]} messages Сообщение
     * @apiError {String} messages.message Текст сообщения
     * @apiError {Number} messages.type Тип сообщения (0 - успешное выполнение, 1 - ошибка валидации, 2 - серверная ошибка, 3 - лог)
     */
}