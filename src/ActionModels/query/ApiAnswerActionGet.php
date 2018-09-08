<?php
namespace sorokinmedia\api_helpers\ActionModels\query;

use sorokinmedia\api_helpers\ActionModels\ApiAnswerAction;

/**
 * Class ApiAnswerActionGet
 * @package sorokinmedia\api_helpers\ActionModels\query
 */
class ApiAnswerActionGet extends ApiAnswerAction
{
    /**
     * ApiAnswerActionGet constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->type = self::TYPE_QUERY;
        $this->method = self::METHOD_GET;
    }
}