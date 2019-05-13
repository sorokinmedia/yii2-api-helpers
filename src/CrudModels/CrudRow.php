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
    const STATE_DEFAULT = 'default';
    const STATE_PRIMARY = 'primary';
    const STATE_SUCCESS = 'success';
    const STATE_INFO    = 'info';
    const STATE_WARNING = 'warning';
    const STATE_DANGER  = 'danger';

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