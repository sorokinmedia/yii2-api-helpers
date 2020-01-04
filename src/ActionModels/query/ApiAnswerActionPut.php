<?php

namespace sorokinmedia\api_helpers\ActionModels\query;

use sorokinmedia\api_helpers\ActionModels\ApiAnswerAction;

/**
 * Класс, описывающий действие в виде PUT запроса
 * Необходимо задание обязательных параметров: id, name, url
 *
 * Class ApiAnswerActionPut
 * @package sorokinmedia\api_helpers\ActionModels\query
 */
class ApiAnswerActionPut extends ApiAnswerAction
{
    /**
     * ApiAnswerActionGet constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->type = self::TYPE_QUERY;
        $this->method = self::METHOD_PUT;
    }
}
