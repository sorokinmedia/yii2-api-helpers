<?php
namespace sorokinmedia\api_helpers\ApiAnswer;

use yii\base\Component;
use yii\base\Model;

/**
 * Class RestMessage
 * @package sorokinmedia\api_helpers\ApiAnswer
 *
 * @property int $type
 * @property string $message
 * @property string $targetField
 */
class RestMessage extends Component
{
    const TYPE_SUCCESS = 0; // успешное выполнение
    const TYPE_VALIDATION_ERROR = 1; // ошибка валидации
    const TYPE_SERVER_ERROR = 2; //серверная ошибка
    const TYPE_LOG = 3; // лог
    const TYPE_INFO = 4; // инфо


    public $type;
    public $message;
    public $targetField = null;

    /**
     * Преобразовать errors модели в RestMessage[]
     * @param Model $model
     * @param array $messagesArray
     * @return array
     */
    public static function activeRecordErrors(Model $model, $messagesArray = []) : array
    {
        foreach ($model->errors as $errorKey => $errorMessage) {
            $messagesArray[] = new RestMessage([
                'type' => self::TYPE_VALIDATION_ERROR,
                'message' => (is_array($errorMessage) && isset($errorMessage[0])) ? $errorMessage[0] : (string)$errorMessage,
                'targetField' => $errorKey,
            ]);
        }
        return $messagesArray;
    }
}