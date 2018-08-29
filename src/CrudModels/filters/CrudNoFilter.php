<?php
namespace sorokinmedia\api_helpers\CrudModels\filters;

use sorokinmedia\api_helpers\CrudModels\CrudFilter;

/**
 * Class CrudNoFilter
 * @package sorokinmedia\api_helpers\CrudModels\filters
 */
class CrudNoFilter extends CrudFilter
{
    /**
     * CrudNoFilter constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->can = false;
        $this->type = '';
        parent::__construct($config);
    }
}