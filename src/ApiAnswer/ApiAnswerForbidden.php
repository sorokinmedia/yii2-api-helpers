<?php
namespace sorokinmedia\api_helpers\ApiAnswer;

use sorokinmedia\api_helpers\Controller\ApiController;

/**
 * Class ApiAnswerForbidden
 * @package sorokinmedia\api_helpers\ApiAnswer
 */
class ApiAnswerForbidden extends ApiAnswer
{
    /**
     * ApiAnswerForbidden constructor.
     * @param string|null $message
     * @param null $response
     */
    public function __construct(string $message = null, $response = null)
    {
        if (is_null($message)){
            $message = \Yii::t('app', 'Доступ запрещен');
        }
        parent::__construct([
            'response' => $response,
            'messages' => [
                new RestMessage([
                    'type' => RestMessage::TYPE_VALIDATION_ERROR,
                    'message' => $message,
                    'targetField' => null,
                ]),
            ],
            'status' => ApiController::STATUS_ERROR,
        ]);
    }
}