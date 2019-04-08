# Yii2 API helpers

[![Total Downloads](https://img.shields.io/packagist/dt/sorokinmedia/yii2-api-helpers.svg)](https://packagist.org/packages/sorokinmedia/yii2-api-helpers)

Компонент для стандартизации настройки и работы с API в Sorokin.Media

Компонент содержит в себе набор заготовленных классов для упрощения и стандартизации написания сервисов для API.

+ `ActionModel` - классы для описания действий в моделях (кнопки, ссылки и т.п.)

+ `ApiAnswer` - классы для стандартизации ответов сервера. Описаны часто встречающиеся ошибки, для упрощения написания кода

+ `Controller` - описание работы контроллеров, метод аутентификации, исключаемые экшены и т.д. Следует наследовать все API контроллеры на проекте от `ApiController`

+ `CrudModels` - описание классов, которые позволяют быстро и в едином стандарте описать сервисы для CRUD (в первую очередь листы моделей).

+ `Interfaces` - интерфейсы, которые могут быть имплементированы на проекте при работе с API.

+ `Traits` - трейты, который могут быть использованы на проекте при работа с API.

## Установка компонента

Компонент можно установить с помощью `composer`:

`"sorokinmedia/yii2-api-helpers": "dev-master"`

### Настройка компонента

В `common/config/main.php` добавить подключение компонента:

~~~~
'apiHelpers' => [
    'class' => \sorokinmedia\api_helpers\ApiHelpersComponent::class,
    'authenticator_class' => \yii\filters\auth\HttpBearerAuth::class,
    'authenticator_excerpt' => [
        'options',
        'login',
        'check-token',
        'password-reset-request',
        'password-reset',
        'confirm-email',
        'check-login',
        'check-email',
        'register',
    ]
],
~~~~

`authenticator_class` - класс, который будет использоваться для аутентификации

`authenticator_excerpt` - массив экшенов, для которых не будут применяться правила аутентификации

Настройки компонента `urlManager` в `api/config/main.php`:

~~~~
'urlManager' => [
    'enablePrettyUrl' => true,
    'enableStrictParsing' => false,
    'showScriptName' => false,
    'rules' => \yii\helpers\ArrayHelper::merge(
        // классы имплементирующие RoutesInterface с описанием роутов
        \api\config\routes\RouteClass::getRoutes(),
        ...
    )
],
~~~~

Настройка компонента `request` в `api/config/main.php`:

~~~~
'request' => [
    'enableCookieValidation' => false,
    'enableCsrfValidation' => false,
    'parsers' => [
        'application/json' => \yii\web\JsonParser::class,
    ],
],
~~~~

Настройка компонента `response` в `api/config/main.php`:

~~~~
'response' => [
    'class' => 'yii\web\Response',
    'on beforeSend' => function ($event) {
        $response = $event->sender;
        if ($response->data !== null) {
            if(!empty($response->data['status']) && $response->data['status'] < 404) {
                if (isset($response->data['status']) && isset($response->data['name']) && isset($response->data['message'])) {
                    $response->data = [
                        'response' => null,
                        'messages' => [
                            new \sorokinmedia\api_helpers\ApiAnswer\RestMessage([
                                'type' => \sorokinmedia\api_helpers\ApiAnswer\RestMessage::TYPE_SERVER_ERROR,
                                'message' => $response->data['name'] . " : " . $response->data['message'],
                                'targetField' => null,
                            ]),
                        ],
                        'status' => (empty($response->data['status']) ? \sorokinmedia\api_helpers\Controller\ApiController::STATUS_ERROR : $response->data['status']),
                    ];
                }
            }
        }
    },
],
~~~~

### Структура папок для API

~~~~
api
    config                      конфигурация апи
        routes                  классы роутов, имплементирующие интерфейс RoutesInterface
    controllers                 контроллеры, определяющие уровень доступа
    modules                     модули апи (версионные модули v1, v2 и т .д.)
        v1                      модуль для первой версии API
            models              рестовые модели для описания структур данных
            modules             модули API, обычно разделенные по ролям пользователей
            
    runtime                     файлы сгенерированные в runtime
    tests                       тесты для API
    web                         содержит файл точки входа и вспомогательные ресурсы
        doc                     папка, со сгенерированной документацией apiDoc
~~~~

## Использование компонента

### Класс контроллера с уровнем доступа

Контроллер впозволяет один раз опеределит уровень доступа ко всем дочерним контроллерам. Указывается список ролей, определнных в системе.

В примере показан контроллер с ограничением доступа "только для пользователей с ролью администратор":

~~~~
<?php
namespace api\controllers;

use common\components\user\entities\User\User;
use sorokinmedia\api_helpers\Controller\ApiController;
use yii\filters\AccessControl;

/**
 * Class AdminApiController
 * @package api\controllers
 */
class AdminApiController extends ApiController
{
    use ApiDocTrait;

    /**
     * @return array
     * @throws \yii\base\InvalidConfigException
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => [User::ROLE_ADMIN],
                    ],
                ],
            ],
        ]);
    }

}
~~~~

### Класс определения роутов

В примере показан класс с описанием роутов, который имплементирует интерфейс `RoutesInterface` и реализует статический метод `getRoutes()`, который возвращает массив роутов.

~~~~
<?php
namespace api\config\routes;

use sorokinmedia\api_helpers\Interfaces\RoutesInterface;

/**
 * Class ApiAdminRoutes
 * @package api\config\routes
 */
class ApiAdminRoutes implements RoutesInterface
{
    /**
     * @return array
     */
    public static function getRoutes() : array
    {
        return [
            //user list
            'GET /v1/admin/user/list' => '/v1/admin/user/list',
        ];
    }
}
~~~~

### Файл описания структуры данных

В примере показан файл описания модели пользователя, который используется рестовый трейт, подробное описание таких трейтов в компоненте sorokinmedia/yii2-ar-relations.

Необходимо перегрузить метод `fields()`, который возвращает атрибуты модели в нужном виде.

~~~~
<?php
namespace api\modules\v1\models;

use api\modules\v1\models\traits\RestRelationClassTrait;
use common\components\user\entities\User\User;

/**
 * Class RestUser
 * @package api\modules\v1\models
 */
class RestUser extends User
{
    use RestRelationClassTrait;

    /**
     * @return array
     */
    public function fields()
    {
        return [
            'id',
            'created_at',
            'username' => function (self $user){
                return $user->username;
            },
            'status' => function (self $user){
                return [
                    'id' => $user->status_id,
                    'alias' => $user->status
                ];
            },
            'auth_key',
        ];
    }
}
~~~~

### Пример контроллера внутри модуля v1

В примере показан файл контроллера, который унаследован от контроллера с уровнем доступа. 

В секции `use` так же указаны все классы для описания ответов сервера(ApiAnswer) и работы с CRUD листами(CrudModels).

Контроллер обязательно содержит перегрузку метода `behaviors()` c описанием по каким типам запросов доступны экшены описанные в контроллеры.

~~~~
<?php
namespace api\modules\v1\modules\admin\controllers;

use api\controllers\AdminApiController;
use sorokinmedia\api_helpers\CrudModels\{
    CrudColumn
    filters\CrudDatePickerFilter,
    filters\CrudInputNumberFilter,
    filters\CrudInputTextFilter,
    filters\CrudNoFilter,
    filters\CrudSelectFilter,
    orders\CrudOrderable,
    orders\CrudUnorderable
};
use sorokinmedia\api_helpers\ApiAnswer\{
    ApiAnswerError,
    ApiAnswerFormValidationError,
    ApiAnswerLog,
    ApiAnswerModelNotFound,
    ApiAnswerParamValidationError,
    ApiAnswerSuccess
};
use yii\filters\VerbFilter;

/**
 * Class UserController
 * @package api\modules\v1\modules\admin\controllers
 */
class UserController extends AdminApiController
{
    /**
     * @return array
     * @throws \yii\base\InvalidConfigException
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'list' => ['get'],
                    'view' => ['get'],
                    'filter-statuses' => ['get'],
                    'filter-roles' => ['get'],
                    'block' => ['post'],
                    'unblock' => ['post'],
                    'add-role' => ['post'],
                    'revoke-role' => ['post'],
                ],
            ],
        ]);
    }
    
    //описание экшенов внутри контроллера
    public function actionTest()
    {
        ...
    }
~~~~

##Как писать документацию к API

Для описания API используется npm-пакет apiDoc http://apidocjs.com/

###Пример описания

В примере:

+ `@api` - используемый тип запроса, урл запроса, название запроса на англ. языке

+ `@apiDescription` - краткое описание сервиса на русском, с указанием автора сервиса

+ `@apiName` - краткое имя сервиса, которое будет отражено в меню документации

+ `@apiGroup` - группа сервисов, в которую будет добавлен данный сервис в меню документации

+ `@apiVersion` - версия API

+ `@apiParam` - описание входных параметров. Тип параметра, название, краткое описание на русском

+ `@apiSuccess` - описание структуры ответа в случае успешного выполнения сервиса

+ `@apiUse SuccessRespond` - используется заготовка для стандартной части описания успешного ответа из `ApiDocTrait.php`

+ `@apiUse ErrorRespond` - используется заготовка для стандартной части описания ответа с ошибкой из `ApiDocTrait.php`

~~~~
/**
 * @api {get} /v1/admin/user/list Get users list
 * @apiDescription Список пользователей (Руслан)
 * @apiName Get users list
 * @apiGroup Admin user list
 * @apiVersion 1.0.0
 *
 * @apiParam {String} [username] Запрос для поиска по нику
 * @apiParam {String} [email] Email
 * @apiParam {Integer} [id] ID пользователя
 * @apiParam {Integer} [limit=100] Сколько показывать
 * @apiParam {Integer} [page=1] Страница пагинации
 * @apiParam {String} [order_by="id"] По какому полю сортировать (id, created_at, username, status)
 * @apiParam {String} [order="SORT_DESC"] Направление сортировки (SORT_DESC, SORT_ASC)
 * @apiParam {Array} [status] Статусы
 * @apiParam {Array} [roles] Роли
 *
 * @apiSuccess {Object} response Список пользователей
 * @apiSuccess {Object[]} response.users Найденные пользователи
 * @apiSuccess {Integer} response.users.id ID пользователя
 * @apiSuccess {Integer} response.users.created_at Дата регистрации (unixstamp)
 * @apiSuccess {String} response.users.username Никнейм
 * @apiSuccess {String} response.users.fullname ФИО
 * @apiSuccess {String} response.users.auth_key API ключ
 * @apiSuccess {String} response.users.email E-mail
 * @apiSuccess {Object} response.users.status Статус
 * @apiSuccess {Integer} response.users.status.value Значение статуса
 * @apiSuccess {String} response.users.status.alias Название статуса
 * @apiSuccess {Integer} response.users.last_entering_date Дата последнего визита
 * @apiSuccess {Array} response.users.roles Список ролей
 * @apiSuccess {Object[]} response.users.actions Список действий
 * @apiSuccess {Integer} response.users.actions.id ID действия
 * @apiSuccess {String} response.users.actions.icon Иконка
 * @apiSuccess {String} response.users.actions.name Название
 * @apiSuccess {String} response.users.actions.type Тип
 * @apiSuccess {String} response.users.actions.method Метод
 * @apiSuccess {String} response.users.actions.url Ссылка на действие
 * @apiSuccess {Integer} response.count Общее кол-во моделей
 *
 * @apiUse SuccessRespond
 *
 * @apiUse ErrorRespond
 */
~~~~
