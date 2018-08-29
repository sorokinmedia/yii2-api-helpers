<?php
namespace api\common\crud\filters;

use sorokinmedia\api_helpers\CrudModels\CrudFilter;

/**
 * Class CrudNoFilter
 * @package api\common\crud\filters
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