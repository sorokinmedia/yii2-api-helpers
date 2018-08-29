<?php
namespace sorokinmedia\api_helpers\Controller;

use sorokinmedia\api_helpers\ApiHelpersComponent;
use sorokinmedia\api_helpers\ErrorAction\ErrorAction;
use sorokinmedia\api_helpers\Serializer\Serializer;
use yii\filters\ContentNegotiator;
use yii\filters\auth\HttpBearerAuth;
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
    use ApiDocTrait; // заготовки для apidoc

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
}