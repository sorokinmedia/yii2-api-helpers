<?php
namespace sorokinmedia\api_helpers\CrudModels\filters;

use sorokinmedia\api_helpers\CrudModels\CrudFilter;

/**
 * Class CrudInputNumberFilter
 * @package sorokinmedia\api_helpers\CrudModels\filters
 */
class CrudInputNumberFilter extends CrudFilter
{
    /**
     * CrudInputNumberFilter constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->can = true;
        $this->type = self::TYPE_NUMBER;
        parent::__construct($config);
    }
}