<?php
namespace sorokinmedia\api_helpers\CrudModels\orders;

use sorokinmedia\api_helpers\CrudModels\CrudOrder;

/**
 * Класс, который сообщает фронту, что сортировать по этой колонке нельзя
 *
 * Class Unorderable
 * @package sorokinmedia\api_helpers\CrudModels\orders
 */
class CrudUnorderable extends CrudOrder
{
    /**
     * Unorderable constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->can = false;
        $this->orders = [];
        parent::__construct($config);
    }
}