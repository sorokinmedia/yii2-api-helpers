<?php

namespace sorokinmedia\api_helpers\ApiAnswer;

use sorokinmedia\api_helpers\Controller\ApiController;
use Yii;

/**
 * Класс, описывающий ответ сервера, при котором важна передача ответа с данными
 * Сообщение не выводится пользователю
 * Модификация: дефолтное сообщение, что данные взяты из кеша
 *
 * Class ApiAnswerLogFromCache
 * @package sorokinmedia\api_helpers\ApiAnswer
 */
class ApiAnswerLogFromCache extends ApiAnswer
{
    /**
     * ApiAnswerLog constructor.
     * @param string|null $message
     * @param null $response
     */
    public function __construct(string $message = null, $response = null)
    {
        if ($message === null) {
            $message = Yii::t('app-sm-api-helpers', 'Данные получены из кеша');
        }
        parent::__construct([
            'response' => $response,
            'messages' => [
                new RestMessage([
                    'type' => RestMessage::TYPE_LOG,
                    'message' => $message,
                    'targetField' => null,
                ]),
            ],
            'status' => ApiController::STATUS_SUCCESS,
        ]);
    }
}
