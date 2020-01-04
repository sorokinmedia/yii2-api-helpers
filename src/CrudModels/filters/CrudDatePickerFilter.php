<?php

namespace sorokinmedia\api_helpers\CrudModels\filters;

use sorokinmedia\api_helpers\CrudModels\CrudFilter;

/**
 * Класс фильтра по дате. Во фронтовой реализации пока не использовался.
 *
 * Class CrudDatePickerFilter
 * @package sorokinmedia\api_helpers\CrudModels\filters
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
