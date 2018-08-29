<?php
namespace sorokinmedia\api_helpers\ApiAnswer;

use sorokinmedia\api_helpers\Controller\ApiController;

/**
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
        if (is_null($message)){
            $message = \Yii::t('app', 'Ошибка');
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