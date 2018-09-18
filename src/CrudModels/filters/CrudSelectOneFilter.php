<?php
namespace sorokinmedia\api_helpers\CrudModels\filters;

use sorokinmedia\api_helpers\CrudModels\CrudFilter;

/**
 * Class CrudSelectOneFilter
 * @package sorokinmedia\api_helpers\CrudModels\filters
 */
class CrudSelectOneFilter extends CrudFilter
{
    /**
     * CrudSelectFilter constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->can = true;
        $this->type = self::TYPE_SELECT_ONE;
        parent::__construct($config);
    }
}