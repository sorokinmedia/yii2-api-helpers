<?php

namespace sorokinmedia\api_helpers\ApiAnswer;

use sorokinmedia\api_helpers\Controller\ApiController;
use yii\base\Model;

/**
 * Класс, описывающий ошибку валидации формы
 * Сообщение выводится пользователю
 *
 * Class ApiAnswerFormValidationError
 * @package sorokinmedia\api_helpers\ApiAnswer
 */
class ApiAnswerFormValidationError extends ApiAnswer
{
    /**
     * ApiAnswerFormValidationError constructor.
     *
     * @param string|null $message
     * @param null $response
     * @param Model|null $form
     */
    public function __construct(string $message = null, $response = null, Model $form = null)
    {
        $messages = [];

        $messages[] = new RestMessage([
            'type' => RestMessage::TYPE_VALIDATION_ERROR,
            'message' => $message ? $message : \Yii::t('app', 'Форма не прошла валидацию'),
            'targetField' => null
        ]);

        if ($form && $form->errors) {
            foreach ($form->errors as $attribute => $attributeErrors) {
                array_walk($attributeErrors, function ($attributeError) use (&$messages, &$attribute) {
                    $messages[] = new RestMessage([
                        'type' => RestMessage::TYPE_VALIDATION_ERROR,
                        'message' => $attributeError,
                        'targetField' => $attribute
                    ]);
                });
            }
        }

        parent::__construct([
            'response' => $response,
            'messages' => $messages,
            'status' => ApiController::STATUS_ERROR,
        ]);
    }
}