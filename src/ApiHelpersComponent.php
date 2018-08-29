<?php
namespace sorokinmedia\api_helpers;

use yii\base\Component;
use yii\filters\auth\HttpBearerAuth;

/**
 * Class ApiHelpersComponent
 * @package sorokinmedia\api_helpers
 *
 * @property string $authenticator_class
 * @property array $authenticator_excerpt
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