<?php

namespace sorokinmedia\api_helpers\ErrorAction;

use yii\base\{Action, Exception, UserException};
use Yii;
use yii\web\HttpException;

/**
 * Подменяет ответ сервера в случае возникновения ошибки
 *
 * Class ErrorAction
 * @package sorokinmedia\api_helpers
 */
class ErrorAction extends Action
{
    /**
     * @var string the name of the error when the exception name cannot be determined.
     * Defaults to "Error".
     */
    public $defaultName;
    /**
     * @var string the message to be displayed when the exception message contains sensitive information.
     * Defaults to "An internal server error occurred.".
     */
    public $defaultMessage;

    /**
     * Runs the action
     *
     * @return string result content
     */
    public function run()
    {
        if (($exception = Yii::$app->getErrorHandler()->exception) === null) {
            // action has been invoked not from error handler, but by direct route, so we display '404 Not Found'
            $exception = new HttpException(404, Yii::t('app', 'Страница не найден'));
        }

        if ($exception instanceof HttpException) {
            $code = $exception->statusCode;
        } else {
            $code = $exception->getCode();
        }
        if ($exception instanceof Exception) {
            $name = $exception->getName();
        } else {
            $name = $this->defaultName ?: Yii::t('app', 'Ошибка');
        }
        if ($code) {
            $name .= " (#$code)";
        }

        if ($exception instanceof UserException) {
            $message = $exception->getMessage();
        } else {
            $message = $this->defaultMessage ?: Yii::t('app', 'Внутрення ошибка');
        }

        if (Yii::$app->getRequest()->getIsAjax()) {
            return "$name: $message";
        }
        //SCRUM-427
        /*return new ApiAnswer([
            'status' => ApiController::STATUS_ERROR,
            'messages' => [
                new RestMessage([
                    'type' => RestMessage::TYPE_SERVER_ERROR,
                    'message' => 'Exception: ' . $exception . ' ' . $name . ' ' . $message,
                ]),
            ]
        ]);*/
        return [
            'name' => $name,
            'message' => $message,
            'exception' => $exception,
        ];
    }
}
