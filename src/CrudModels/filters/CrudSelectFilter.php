<?php

namespace sorokinmedia\api_helpers\CrudModels\filters;

use sorokinmedia\api_helpers\CrudModels\CrudFilter;

/**
 * Класс множественного фильтра. Во фронтовой реализации мультиселект из заданного массива данных.
 * Треубет указания в качестве параметр query URL запроса в апи, по которому можно получить массив данных для селекта
 *
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
