<?php
namespace sorokinmedia\api_helpers\CrudModels\filters;

use sorokinmedia\api_helpers\CrudModels\CrudFilter;

/**
 * Class CrudSelectFilter
 * @package sorokinmedia\api_helpers\CrudModels\filters
 */
class CrudSelectFilter extends CrudFilter
{
    /**
     * CrudSelectFilter constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->can = true;
        $this->type = self::TYPE_SELECT;
        parent::__construct($config);
    }
}