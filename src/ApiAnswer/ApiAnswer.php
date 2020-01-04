<?php

namespace sorokinmedia\api_helpers\ApiAnswer;

use sorokinmedia\api_helpers\validators\ApiAnswerValidator;
use yii\base\Model;

/**
 * Стандартная форма ответа API сервисов
 * Другие классы ответов наследуются от этого класса
 * Используется валидатор для проверки соответствия ответа заданной модели
 * Чтобы обойти валидатор надо в api action использовать команду exit();
 *
 * Class ApiAnswer
 * @package sorokinmedia\api_helpers\ApiAnswer
 *
 * @property $response Содержание ответа
 * @property int $status Статус ответа
 * @property array $messages Массив сообщений
 */
class ApiAnswer extends Model
{
    public $response = null;
    public $status;
    public $messages = [];

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            ['status', ApiAnswerValidator::class]
        ];
    }
}
