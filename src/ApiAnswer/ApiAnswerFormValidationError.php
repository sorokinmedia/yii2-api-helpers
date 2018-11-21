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
     * @param string|null $message
     * @param null $response
     * @param Model|null $form
     */
    public function __construct(string $message = null, $response = null, Model $form = null)
    {
        if (is_null($message)){
            $message = \Yii::t('app', 'Форма не прошла валидацию');
        }
        $errors_string = '';
        if (!is_null($form)){
            $errors = $form->getErrors();
            if (!empty($errors)){
                foreach ($errors as $param => $param_errors){
                    foreach ($param_errors as $param_error){
                        $errors_string .= $param . " => " . $param_error . "\n";
                    }
                }
            }
        }
        parent::__construct([
            'response' => $response,
            'messages' => [
                new RestMessage([
                    'type' => RestMessage::TYPE_VALIDATION_ERROR,
                    'message' => $message . "\n" . $errors_string,
                    'targetField' => null,
                ]),
            ],
            'status' => ApiController::STATUS_ERROR,
        ]);
    }
}