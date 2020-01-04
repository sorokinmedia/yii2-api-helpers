<?php

namespace sorokinmedia\api_helpers\CrudModels;

use yii\base\Model;

/**
 * Класс для конфига строки в таблице круда
 *
 * Class CrudRow
 * @package sorokinmedia\api_helpers\CrudModels
 */
class CrudRow extends Model
{
    public const STATE_DEFAULT = 'default';
    public const STATE_PRIMARY = 'primary';
    public const STATE_SUCCESS = 'success';
    public const STATE_INFO = 'info';
    public const STATE_WARNING = 'warning';
    public const STATE_DANGER = 'danger';

    public $state = self::STATE_DEFAULT;

    /**
     * CrudRow constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }
}
