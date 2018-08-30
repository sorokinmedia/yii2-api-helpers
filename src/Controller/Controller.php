<?php
namespace sorokinmedia\api_helpers\Controller;

use sorokinmedia\api_helpers\{
    ApiHelpersComponent,ErrorAction\ErrorAction,Serializer\Serializer
};
use yii\filters\ContentNegotiator;
use yii\web\Response;

/**
 * Class Controller
 * @package sorokinmedia\api_helpers\Controller
 *
 * общий контроллер
 * использует свой Serializer/ErrorAction
 * можно передать через настройки компонента исключения по аутентификации
 */
class Controller extends \yii\rest\Controller
{
    public $serializer = Serializer::class; // замена сериалайзера

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => ErrorAction::class,
        ];
    }

    /**
     * @return array
     */
    public function actionError()
    {
        return [
            'error' => \Yii::t('app', 'Метод заперещен')
        ];
    }

    /**
     * @param $action
     * @return bool
     * @throws \yii\web\BadRequestHttpException
     */
    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            header('Access-Control-Allow-Origin: *');
            header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");
            header("Access-Control-Allow-Methods: POST, PUT, GET, DELETE, OPTIONS");
            header("Access-Control-Allow-Credentials: true");
            header("Access-Control-Expose-Headers: content-type,X-Pagination-Current-Page, X-Pagination-Page-Count, X-Pagination-Per-Page, X-Pagination-Total-Count, X-Debug-Duration, X-Debug-Tag, X-Debug-Link");
            return true;
        }
        return false;
    }

    /**
     * @return array
     * @throws \yii\base\InvalidConfigException
     */
    public function behaviors()
    {
        /** @var ApiHelpersComponent $apiHelpers */
        $apiHelpers = \Yii::$app->get('apiHelpers');
        return [
            'contentNegotiator' => [
                'class' => ContentNegotiator::class,
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
            'authenticator' => [
                'class' => $apiHelpers->authenticator_class,
                'except' => $apiHelpers->authenticator_excerpt,
            ],
        ];
    }

    // заготовки для apidoc
    /**
     * @apiDefine SuccessRespond
     *
     * @apiSuccess {Number} status Статус ответа (0 - успешное выполнение, 10 - лог, 100 - ошибка)
     * @apiSuccess {Object[]} messages Сообщение
     * @apiSuccess {String} messages.message Текст сообщения
     * @apiSuccess {Number} messages.type Тип сообщения (0 - успешное выполнение, 1 - ошибка валидации, 2 - серверная ошибка, 3 - лог)
     */

    /**
     * @apiDefine ErrorRespond
     *
     * @apiError {Null} response Ответ сервиса
     * @apiError {Number} status Статус ответа (0 - успешное выполнение, 10 - лог, 100 - ошибка)
     * @apiError {Object[]} messages Сообщение
     * @apiError {String} messages.message Текст сообщения
     * @apiError {Number} messages.type Тип сообщения (0 - успешное выполнение, 1 - ошибка валидации, 2 - серверная ошибка, 3 - лог)
     */
}