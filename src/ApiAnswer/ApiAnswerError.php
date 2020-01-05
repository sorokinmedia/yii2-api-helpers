<?php

namespace sorokinmedia\api_helpers\ApiAnswer;

use sorokinmedia\api_helpers\Controller\ApiController;
use Yii;

/**
 * Класс, описывающий ответ сервера при ошибке
 * Текст ошибки выводится пользователю
 *
 * Class ApiAnswerError
 * @package sorokinmedia\api_helpers\ApiAnswer
 */
class ApiAnswerError extends ApiAnswer
{
    /**
     * ApiAnswerError constructor.
     * @param string|null $message
     * @param null $response
     */
    public function __construct(string $message = null, $response = null)
    {
        if ($message === null) {
            $message = Yii::t('app-sm-api-helpers', 'Ошибка');
        }
        parent::__construct([
            'response' => $response,
            'messages' => [
                new RestMessage([
                    'type' => RestMessage::TYPE_SERVER_ERROR,
                    'message' => $message,
                    'targetField' => null,
                ]),
            ],
            'status' => ApiController::STATUS_ERROR,
        ]);
    }
}
