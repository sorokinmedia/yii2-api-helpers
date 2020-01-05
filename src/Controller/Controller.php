<?php

namespace sorokinmedia\api_helpers\Controller;

use sorokinmedia\api_helpers\{ApiHelpersComponent, ErrorAction\ErrorAction, Serializer\Serializer};
use Yii;
use yii\base\InvalidConfigException;
use yii\filters\ContentNegotiator;
use yii\web\BadRequestHttpException;
use yii\web\Response;

/**
 * Общий контроллер
 * Использует свой Serializer/ErrorAction
 * Можно передать через настройки компонента исключения по аутентификации
 *
 * Class Controller
 * @package sorokinmedia\api_helpers\Controller
 */
class Controller extends \yii\rest\Controller
{
    public $serializer = Serializer::class; // замена сериалайзера

    /**
     * @return array
     */
    public function actions(): array
    {
        return [
            'error' => ErrorAction::class,
        ];
    }

    /**
     * @return array
     */
    public function actionError(): array
    {
        return [
            'error' => Yii::t('app-sm-api-helpers', 'Метод заперещен')
        ];
    }

    /**
     * @param $action
     * @return bool
     * @throws BadRequestHttpException
     */
    public function beforeAction($action): bool
    {
        if (parent::beforeAction($action)) {
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization');
            header('Access-Control-Allow-Methods: POST, PUT, GET, DELETE, OPTIONS');
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Expose-Headers: content-type,X-Pagination-Current-Page, X-Pagination-Page-Count, X-Pagination-Per-Page, X-Pagination-Total-Count, X-Debug-Duration, X-Debug-Tag, X-Debug-Link');
            return true;
        }
        return false;
    }

    /**
     * @return array
     * @throws InvalidConfigException
     */
    public function behaviors(): array
    {
        /** @var ApiHelpersComponent $apiHelpers */
        $apiHelpers = Yii::$app->get('apiHelpers');
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
