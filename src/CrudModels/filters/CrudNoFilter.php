<?php
namespace sorokinmedia\api_helpers\CrudModels\filters;

use sorokinmedia\api_helpers\CrudModels\CrudFilter;

/**
 * Класс, который сообщает фронту, что фильтрация по этой колонке невозможна
 *
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