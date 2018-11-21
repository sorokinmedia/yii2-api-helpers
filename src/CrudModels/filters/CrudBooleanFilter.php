<?php
namespace sorokinmedia\api_helpers\CrudModels\filters;

use sorokinmedia\api_helpers\CrudModels\CrudFilter;

/**
 * Класс булева фильтра. Во фронтовой реализации чек-бокс
 *
 * Class CrudBooleanFilter
 * @package sorokinmedia\api_helpers\CrudModels\filters
 */
class CrudBooleanFilter extends CrudFilter
{
    /**
     * CrudBooleanFilter constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        $this->can = true;
        $this->type = self::TYPE_BOOL;
        parent::__construct($config);
    }
}