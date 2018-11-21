<?php
namespace sorokinmedia\api_helpers\ApiAnswer;

use sorokinmedia\api_helpers\Controller\ApiController;

/**
 * Класс, описывающий ответ сервера, при котором важна передача ответа с данными
 * Сообщение не выводится пользователю
 *
 * Class ApiAnswerLog
 * @package sorokinmedia\api_helpers\ApiAnswer
 */
class ApiAnswerLog extends ApiAnswer
{
    /**
     * ApiAnswerLog constructor.
     * @param string|null $message
     * @param null $response
     */
    public function __construct(string $message = null, $response = null)
    {
        if (is_null($message)){
            $message = \Yii::t('app', 'Данные получены');
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