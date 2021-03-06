<?php

namespace sorokinmedia\api_helpers\ApiAnswer;

use sorokinmedia\api_helpers\Controller\ApiController;
use Yii;

/**
 * Класс, описывающий успешное выполнение операции
 * Сообщение выводится пользователю
 *
 * Class ApiAnswerSuccess
 * @package sorokinmedia\api_helpers\ApiAnswer
 */
class ApiAnswerSuccess extends ApiAnswer
{
    /**
     * ApiAnswerSuccess constructor.
     * @param string|null $message
     * @param null $response
     */
    public function __construct(string $message = null, $response = null)
    {
        if ($message === null) {
            $message = Yii::t('app-sm-api-helpers', 'Успешно');
        }
        parent::__construct([
            'response' => $response,
            'messages' => [
                new RestMessage([
                    'type' => RestMessage::TYPE_SUCCESS,
                    'message' => $message,
                    'targetField' => null,
                ]),
            ],
            'status' => ApiController::STATUS_SUCCESS,
        ]);
    }
}
