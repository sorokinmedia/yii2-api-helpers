<?php
namespace sorokinmedia\api_helpers\ApiAnswer;

use yii\base\Model;
use sorokinmedia\api_helpers\validators\ApiAnswerValidator;

/**
 * Class ApiAnswer
 * @package sorokinmedia\api_helpers\ApiAnswer
 *
 * стандартная форма ответа API сервисов
 * используется валидатор для проверки соответствия ответа заданной модели
 * чтобы обойти валидатор надо в api action использовать команду exit();
 *
 * @property $response
 * @property int $status
 * @property array $messages
 */
class ApiAnswer extends Model
{
    public $response = null;
    public $status;
    public $messages = [];

    /**
     * @return array
     */
    public function rules()
    {
        return [
            ['status', ApiAnswerValidator::class]
        ];
    }
}