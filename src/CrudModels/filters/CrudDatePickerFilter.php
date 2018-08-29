<?php
namespace sorokinmedia\api_helpers\CrudModel\filters;

use sorokinmedia\api_helpers\CrudModels\CrudFilter;

/**
 * Class CrudDatePickerFilter
 * @package sorokinmedia\api_helpers\CrudModel\filters
 */
class CrudDatePickerFilter extends CrudFilter
{
    /**
     * CrudDatePickerFilter constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->can = true;
        $this->type = self::TYPE_DATE;
        parent::__construct($config);
    }
}