<?php
namespace sorokinmedia\api_helpers\ApiAnswer;

use sorokinmedia\api_helpers\Controller\ApiController;

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
        if (is_null($message)){
            $message = \Yii::t('app', 'Успешно');
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