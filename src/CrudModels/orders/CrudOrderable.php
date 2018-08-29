<?php
namespace sorokinmedia\api_helpers\CrudModel\orders;

use sorokinmedia\api_helpers\CrudModels\CrudOrder;

/**
 * Class Orderable
 * @package sorokinmedia\api_helpers\CrudModel\orders
 */
class Orderable extends CrudOrder
{
    /**
     * Orderable constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
    }
}