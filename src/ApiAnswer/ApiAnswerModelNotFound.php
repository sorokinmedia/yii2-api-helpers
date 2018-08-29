<?php
namespace sorokinmedia\api_helpers\ApiAnswer;

use sorokinmedia\api_helpers\Controller\ApiController;

/**
 * Class ApiAnswerModelNotFound
 * @package sorokinmedia\api_helpers\ApiAnswer
 */
class ApiAnswerModelNotFound extends ApiAnswer
{
    /**
     * ApiAnswerModelNotFound constructor.
     * @param string|null $field
     * @param string|null $message
     * @param string|null $name
     */
    public function __construct(string $field = null, string $message = null, string $name = null)
    {
        if (is_null($message)){
            $message = \Yii::t('app','Модель с таким ID не найдена');
            if (!is_null($name)){
                $message = \Yii::t('app','{name} с таким ID не найден(а)', ['name' => $name]);
            }
        }
        parent::__construct([
            'response' => null,
            'messages' => [
                new RestMessage([
                    'type' => RestMessage::TYPE_VALIDATION_ERROR,
                    'message' => $message,
                    'targetField' => $field,
                ]),
            ],
            'status' => ApiController::STATUS_ERROR,
        ]);
    }
}