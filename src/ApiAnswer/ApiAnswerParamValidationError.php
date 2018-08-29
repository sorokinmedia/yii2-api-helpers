<?php
namespace sorokinmedia\api_helpers\ApiAnswer;

use sorokinmedia\api_helpers\Controller\ApiController;

/**
 * Class ApiAnswerParamValidationError
 * @package sorokinmedia\api_helpers\ApiAnswer
 */
class ApiAnswerParamValidationError extends ApiAnswer
{
    /**
     * ApiAnswerParamValidationError constructor.
     * @param string|null $fields
     * @param string|null $message
     * @param null $response
     */
    public function __construct(string $fields = null, string $message = null, $response = null)
    {
        if (is_null($message)){
            $message = \Yii::t('app', 'Неверные входные данные');
        }
        parent::__construct([
            'response' => $response,
            'messages' => [
                new RestMessage([
                    'type' => RestMessage::TYPE_VALIDATION_ERROR,
                    'message' => $message,
                    'targetField' => $fields,
                ]),
            ],
            'status' => ApiController::STATUS_ERROR,
        ]);
    }
}