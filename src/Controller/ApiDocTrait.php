<?php
namespace sorokinmedia\api_helpers\Controller;

/**
 * Trait ApiDocTrait
 * @package sorokinmedia\api_helpers\Controller
 *
 * описывает стандратные заготовки для apidoc
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