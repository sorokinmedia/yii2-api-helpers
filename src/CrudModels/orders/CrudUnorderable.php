<?php
namespace sorokinmedia\api_helpers\CrudModels\orders;

use sorokinmedia\api_helpers\CrudModels\CrudOrder;

/**
 * Class Unorderable
 * @package sorokinmedia\api_helpers\CrudModels\orders
 */
class Unorderable extends CrudOrder
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