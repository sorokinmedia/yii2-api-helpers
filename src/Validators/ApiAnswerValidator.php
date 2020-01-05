<?php

namespace sorokinmedia\api_helpers\validators;

use sorokinmedia\api_helpers\Controller\ApiController;
use Yii;
use yii\base\Exception;
use yii\base\Model;
use yii\validators\Validator;

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
     * @param Model $model
     * @param string $attribute
     * @throws Exception
     */
    public function validateAttribute($model, $attribute): void
    {
        if (!in_array($model->$attribute, [
            ApiController::STATUS_SUCCESS,
            ApiController::STATUS_ERROR,
            ApiController::STATUS_LOG
        ], true)) {
            throw new Exception(Yii::t('app-sm-api-helpers', 'Неверный тип ответа'));
        }
    }
}
