<?php
namespace sorokinmedia\api_helpers\ActionModels\link;

use sorokinmedia\api_helpers\ActionModels\ApiAnswerAction;

/**
 * Class ApiAnswerActionSameLink
 * @package sorokinmedia\api_helpers\ActionModels\link
 */
class ApiAnswerActionSameLink extends ApiAnswerAction
{
    /**
     * ApiAnswerActionSameLink constructor.
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->type = self::TYPE_LINK;
        $this->method = self::METHOD_SAME;
    }
}