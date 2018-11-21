<?php
namespace sorokinmedia\api_helpers\validators;

use yii\base\Exception;
use yii\validators\Validator;
use sorokinmedia\api_helpers\Controller\ApiController;

/**
 * Валидатор соответствия кода ответа внутренним кодам
 *
 * Class ApiAnswerValidator
 * @package sorokinmedia\api_helpers\validators
 */
class ApiAnswerValidator extends Validator
{
    /**
     * валидация кода ответа
     * @param \yii\base\Model $model
     * @param string $attribute
     * @throws Exception
     */
    public function validateAttribute($model, $attribute)
    {
        if (!in_array($model->$attribute, [
                ApiController::STATUS_SUCCESS,
                ApiController::STATUS_ERROR,
                ApiController::STATUS_LOG,
        ])) {
            throw new Exception(\Yii::t('app', 'Неверный тип ответа'));
        }
    }
}