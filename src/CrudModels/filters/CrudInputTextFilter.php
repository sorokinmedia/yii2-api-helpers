<?php

namespace sorokinmedia\api_helpers\CrudModels\filters;

use sorokinmedia\api_helpers\CrudModels\CrudFilter;

/**
 * Класс текстового фильтра. Во фронтовой реализации текстовый инпут
 *
 * Class CrudInputTextFilter
 * @package sorokinmedia\api_helpers\CrudModels\filters
 */
class CrudInputTextFilter extends CrudFilter
{
    /**
     * CrudInputTextFilter constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->can = true;
        $this->type = self::TYPE_TEXT;
        parent::__construct($config);
    }
}
