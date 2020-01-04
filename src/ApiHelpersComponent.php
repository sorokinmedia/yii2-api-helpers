<?php

namespace sorokinmedia\api_helpers;

use yii\base\Component;
use yii\filters\auth\HttpBearerAuth;

/**
 * Файл компонента. Имеет возможность настройки через config
 *
 * Class ApiHelpersComponent
 * @package sorokinmedia\api_helpers
 *
 * @property string $authenticator_class Класс, который будет использоваться для аутентификации
 * @property array $authenticator_excerpt Массив экшенов, для которых будет отключена аутентификация
 */
class ApiHelpersComponent extends Component
{
    public $authenticator_class = HttpBearerAuth::class;
    public $authenticator_excerpt = [
        'options',
        'login',
        'check-token',
        'password-reset-request',
        'password-reset',
        'confirm-email',
        'check-login',
        'check-email',
        'register',
    ];
}
