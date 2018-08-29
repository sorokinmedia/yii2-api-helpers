<?php
namespace sorokinmedia\api_helpers\CrudModels;

use yii\base\Model;

/**
 * Class CrudOrder
 * @package sorokinmedia\api_helpers\CrudModels
 *
 * @property boolean $can
 * @property array $orders
 */
class CrudOrder extends Model
{
    public $can = true;
    public $orders = ['SORT_ASC', 'SORT_DESC'];

    /**
     * Order constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }
}