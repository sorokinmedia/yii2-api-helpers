<?php
namespace sorokinmedia\api_helpers\CrudModels;

use yii\base\Model;

/**
 * Class Column
 * @package sorokinmedia\api_helpers\CrudModels
 *
 * @property string $id
 * @property string $label
 * @property string $type
 * @property CrudFilter $filter
 * @property CrudOrder $order
 */
class CrudColumn extends Model
{
    public $id;
    public $title;
    public $type;
    public $filter;
    public $order;

    const TYPE_INTEGER = 'integer';
    const TYPE_NUMBER = 'number';
    const TYPE_SELECT = 'select';
    const TYPE_STRING = 'string';
    const TYPE_TEXT = 'text';
    const TYPE_DATE = 'date';
    const TYPE_BOOLEAN = 'boolean';
    const TYPE_ACTIONS = 'actions';

    /**
     * CrudColumn constructor.
     * @param array $config
     * @param CrudFilter $filter
     * @param CrudOrder $order
     */
    public function __construct(array $config = [], CrudFilter $filter, CrudOrder $order)
    {
        parent::__construct($config);
        $this->filter = $filter;
        $this->order = $order;
    }
}